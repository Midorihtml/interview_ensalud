<?php
namespace Src\controllers;
use Src\lib\Response;
use Src\lib\Storefile;
use Src\models\User;
use Src\models\File;

enum Type_file :string {
    case JPG = 'jpg';
    case PDF = 'pdf';
}

$user_id = $_POST['id'];

$_POST['avatar'] = '';
$_POST['cv'] = '';

function save_file($user_id, $position, $type){
    if(!isset($_FILES[$position])) return;
    
    $row = File::get($user_id, $type);
    
    if($row['status'] !== 200){
       return $_POST[$position] = Storefile::upload($_FILES[$position]);
    };

    Storefile::delete($row['file']);
    $filename = Storefile::upload($_FILES[$position]);
    $updated_row = File::update($user_id, $filename, $type);
    $_POST[$position] = $updated_row['file'];

}

save_file($user_id, 'avatar', (Type_file::JPG)->value);
save_file($user_id, 'cv', (Type_file::PDF)->value);

// create user;
$user = new User($_POST);

function save($position, $type){
    if(!$_POST[$position]) return;
    if($_POST[$position] !== 'error') return;
    if($type == 'pdf'){
        return $user->save_avatar();
    };
    return $user->save_cv();
};

$is_save_avatar = save('avatar', (Type_file::JPG)->value);
$is_save_cv = save('cv', (Type_file::PDF)->value);
$is_save_user = $user->save();

// return error;
if($is_save_user['status'] !== 200){
    echo json_encode(Response::error('Failure Please try again'));
    return;
}
// return success 200;
echo json_encode($is_save_user);
return;