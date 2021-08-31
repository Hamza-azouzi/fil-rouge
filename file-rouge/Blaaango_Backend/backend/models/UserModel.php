<?php

class UserModel
{
  

    public function __construct()
    {
        $this->db = new DB();
    }

    public function getUsers()
    {
        $this->db->query("SELECT * FROM user");
        return $this->db->all();
    }

    public function getUsersCardProfile()
    {
        $this->db->query("SELECT fullname,image FROM user");
        return $this->db->all();
    }

 
    public function getMyInfo($id)
    {
        $this->db->query("SELECT * FROM user WHERE id = :id");
        $this->db->bind(':id', $id);
        return $this->db->single();
    }


    public function getUserByEmail($email)
    {
        $this->db->query("SELECT * FROM user WHERE email = :email");
        $this->db->bind(':email', $email);
        return $this->db->single();
    }

    public function getUserByRole($role)
    {
        echo $role;
        $this->db->query("SELECT * FROM user WHERE role = :role");
        $this->db->bind(':role', $role);
        return $this->db->all();
    }


    public function uniqidReal($lenght = 8) {
        if (function_exists("random_bytes")) {
            $bytes = random_bytes(ceil($lenght / 2));
        } elseif (function_exists("openssl_random_pseudo_bytes")) {
            $bytes = openssl_random_pseudo_bytes(ceil($lenght / 2));
        } else {
            throw new Exception("no cryptographically secure random function available");
        }
        return substr(bin2hex($bytes), 0, $lenght);
    }





    public function register($data)
    {
        $uniqueRef=strtoupper($this->uniqidReal());
        
        try {
            $this->db->query("INSERT INTO
                user
            SET
                fullname = :fullname,                
                email = :email,
                password = :password
            ");
            $this->db->bind(':fullname', $data->fullname);
            $this->db->bind(':email', $data->email);
            $this->db->bind(':password', $data->password);
            $this->db->single();
        } catch (\PDOExeption $err) {
            return $err->getMessage();
            die();
        }
        return $this->getUserByEmail($data->email);
    }





    public function edit($data, $id , $nameImage)
    {
        
        
        try {
            $this->db->query("UPDATE
                user
            SET
                fullname = :fullname,
                email = :email,
                password = :password
              
              

                WHERE id = :id
            ");
            $this->db->bind(':fullname', $data->fullname);
            $this->db->bind(':email', $data->email);
            $this->db->bind(':password', $data->password);
         
            $this->db->bind(':id', $id);
            $this->db->single();
        } catch (\PDOExeption $err) {
            return $err->getMessage();
            die();
        }
        return $this->getMyInfo($id);
    }


    
   
}
