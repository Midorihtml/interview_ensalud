<?php
namespace Src\lib;

class Storefile{
    public static function upload(array $file) :string{

        if(!$file['name']) return '';

        $target_dir = '';
        $base_target_dir = $GLOBALS['appRoot'] . '/filestore/';
        $extarr = explode('.', $file['name']);
        $filename = $extarr[sizeof($extarr)-2];
        $ext = $extarr[sizeof($extarr)-1];

        $hash = md5(Date('Ymdgi') . $filename) . '.' . $ext;
        $success = 1;

        if(isset($file['tmp_name'])){
            $success = 1;
        }else{
            $success = 0;
        }

        if($ext == 'pdf') $target_dir = $base_target_dir . '/pdf/';
        if($ext == 'jpg') $target_dir = $base_target_dir . '/img/';

        $target_file = $target_dir . $hash;

        if($success == 0){
            return 'error';
        }else{
            if(move_uploaded_file($file['tmp_name'], $target_file)){
                return $hash;
            }else{
                return 'error';
            }
        }
    }
    
    public static function delete (string $filename){
        if($filename == 'error') return;
        if($filename == '') return;

        $file = $GLOBALS['appRoot'] . '/filestore/';
        
        $extarr = explode('.', $filename);
        $ext = $extarr[sizeof($extarr)-1];
        
        if($ext == 'pdf'){
            $file = $file . 'pdf/' . $filename;   
        }else{
            $file = $file . 'img/' . $filename;   
        }
        if(file_exists($file)){
            unlink($file);
        };
    }
}