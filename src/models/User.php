<?php

namespace Src\models;

use Src\lib\Database;
use Src\lib\Response;
use Src\models\File;
use PDO;
use PDOException;
use kint;

class User{

    private PDO $db;

	private int $id;
	private string $name;
	private string $username;
	private string $email;
	private string $address_street;
	private string $address_suite;
	private string $address_city;
	private string $address_zipcode;
	private string $address_geo_lat;
	private string $address_geo_lng;
	private string $phone;
	private string $website;
	private string $company_name;
	private string $company_catchPhrase;
	private string $company_bs;

    private string $avatar;
    private string $cv;

    public function __construct(array $data){
        $this->db = (new Database())->connect();
        
        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->username = $data['username'];
        $this->email = $data['email'];
        $this->address_street = $data['address_street'];
        $this->address_suite = $data['address_suite'];
        $this->address_city = $data['address_city'];
        $this->address_zipcode = $data['address_zipcode'];
        $this->address_geo_lat = $data['address_geo_lat'];
        $this->address_geo_lng = $data['address_geo_lng'];
        $this->phone = $data['phone'];
        $this->website = $data['website'];
        $this->company_name = $data['company_name'];
        $this->company_catchPhrase = $data['company_catchPhrase'];
        $this->company_bs = $data['company_bs'];

        $this->avatar = $data['avatar'];
        $this->cv = $data['cv'];
    }

    private function query($query){
        return $this->db->query($query);
    }

    private function prepare($query){
        return $this->db->prepare($query);
    }

    public function save(){
        try {
            $is_user = $this->prepare('
                SELECT * FROM users
                WHERE id = :user_id
            ');

            $is_user->execute([
                ':user_id' => $this->id
            ]);

            $is_user = $is_user->fetch();

            if($is_user){
                $response = new Response();
                return $response->success([
                    'id'=> $this->id,
                    'avatar_url' => $this->avatar,
                    'cv_url' => $this->cv,
                ]);
            };

            $query = $this->prepare(
                'INSERT INTO users (
                    id, 
                    name, 
                    username, 
                    email, 
                    address_street, 
                    address_suite,
                    address_city,
                    address_zipcode,
                    address_geo_lat,
                    address_geo_lng,
                    phone,
                    website,
                    company_name,
                    company_catchPhrase,
                    company_bs
                ) VALUES (
                    :id, 
                    :name, 
                    :username, 
                    :email, 
                    :address_street, 
                    :address_suite,
                    :address_city,
                    :address_zipcode,
                    :address_geo_lat,
                    :address_geo_lng,
                    :phone,
                    :website,
                    :company_name,
                    :company_catchPhrase,
                    :company_bs
                )'
            );
            
            $query->execute([
                'id' =>$this->id, 
                'name' =>$this->name, 
                'username' =>$this->username, 
                'email' =>$this->email, 
                'address_street' =>$this->address_street, 
                'address_suite' =>$this->address_suite,
                'address_city' =>$this->address_city,
                'address_zipcode' =>$this->address_zipcode,
                'address_geo_lat' =>$this->address_geo_lat,
                'address_geo_lng' =>$this->address_geo_lng,
                'phone' =>$this->phone,
                'website' =>$this->website,
                'company_name' =>$this->company_name,
                'company_catchPhrase' =>$this->company_catchPhrase,
                'company_bs' =>$this->company_bs,
            ]);

            $response = new Response();
            return $response->success([
                'id'=> $this->id,
                'avatar_url' => $this->avatar,
                'cv_url' => $this->cv,
            ]);

        } catch (PDOException $error) {
            $response = new Response();
            return $response->error('Failure!');
            throw $error;
        }

    }

    public function save_avatar(){
        $user_id = $this->id;
        $file = $this->avatar;
        $file = new File($user_id, $file, 'jpg');
        $file->save();
        return $file;
    }

    public function save_cv(){
        $user_id = $this->id;
        $file = $this->cv;
        $file = new File($user_id, $file, 'pdf');
        $file->save();
        return $file;
    }

    public static function kint(){
        $msg = '¡Hola! Valor mostrado con Kint';
        return d($msg);
    } 
}
