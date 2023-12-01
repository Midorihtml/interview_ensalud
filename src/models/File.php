<?php

namespace Src\models;
use Src\lib\Database;
use Src\lib\Response;
use PDO;
use PDOException;

class File{
    private PDO $db;

    private string $fecha;
    private int $user_id;
    private string $file;
    private string $type;

    public function __construct(int $id, string $file, string $type){
        $this->db = (new Database())->connect();

        $this->fecha = date('Y-m-d H:i:s');
        $this->user_id = $id;
        $this->file = $file;
        $this->type = $type;
    }

    public function save():array{
        try {
            $sub_directory = $this->type == 'pdf' ? 'pdf/' : 'img/';

            if(file_exists($GLOBALS['appRoot'] . '/filestore/' . $sub_directory . $this->file )){
                $query = $this->db->prepare('
                    SELECT id,
                    file from files
                    WHERE file = :file
                ');

                $query->execute([
                    'file' => $this->file
                ]);
                
                $is_file = $query->fetch();
                if($is_file){
                    $response = new Response();
                    return $response->success([
                        'id'=> $is_file['id'],
                        'file' => $this->file,
                    ]);
                }
            };
            //code...
            $query = $this->db->prepare('
                INSERT INTO files (
                    fecha,
                    user_id,
                    file,
                    type
                ) values (
                    :fecha,
                    :user_id,
                    :file,
                    :type
                )
            ');
    
            $query->execute([
                'fecha' => $this->fecha,
                'user_id' => $this->user_id,
                'file' => $this->file,
                'type' => $this->type,
            ]);

            $response = new Response();
            return $response->success([
                'id'=> $this->db->lastInsertId(),
                'file' => $this->file,
            ]);

        } catch (PDOException $error) {
            $response = new Response();
            return $response->error('failure!');
            throw $error;
        }
    } 

    public static function update(int $user_id, string $filename, string $type) :array{
       try {
        $db = (new Database())->connect();
        $query = $db->prepare('
            UPDATE files 
            SET file = :file,
            fecha = :fecha
            WHERE user_id = :user_id 
            AND type = :type
        ');

        $query->execute([
            'file' => $filename,
            'fecha' => date('Y-m-d H:i:s'),
            'user_id' => $user_id,
            'type' => $type
        ]);

        $file = File::get($user_id, $type);

        $response = new Response();
        
        return $response->success([
            'id'=> $file['id'],
            'file' => $file['file'],
        ]);
       } catch (PDOException $error) {
        $response = new Response();
        return $response->error('failure!');
        throw $error;
    }
       
    }

    public static function get( int $user_id, string $type) :array{
        try {
            $db = (new Database())->connect();

            $query = $db->prepare('
            SELECT id,
            file from files
            WHERE user_id = :user_id
            AND type = :type
        ');

        $query->execute([
            'user_id' => $user_id,
            'type' => $type
        ]);
        
        $is_file = $query->fetch();
        if($is_file){
            $response = new Response();
            return $response->success([
                'id'=> $is_file['id'],
                'file' => $is_file['file'],
            ]);
        }

        $response = new Response();
        return $response->error('not found!');

        } catch (PDOException $error) {
            $response = new Response();
            return $response->error('failure!');
            throw $error;
        }
    }
}