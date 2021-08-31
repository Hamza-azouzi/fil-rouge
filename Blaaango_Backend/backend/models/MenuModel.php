<?php

class MenuModel
{

    public $table = "menu";

    public function __construct()
    {
        $this->db = new DB();
    }




    public function read()
    {
        $this->db->query("SELECT * FROM $this->table");
        return $this->db->all();
    }


    public function readmenuresto($id)
    {
        $this->db->query("SELECT * FROM $this->table WHERE id_resto=:id");

        $this->db->bind(':id', $id);

        return $this->db->all();
    }



    public function insert($json, $image)
    {
        // $uniqueRef=strtoupper($this->uniqidReal());

        try {


            $this->db->query("INSERT INTO menu(image,price,name,description,id_resto) VALUES(:image,:price,:name,:description,:id_resto)");

            $this->db->bind(':image', $image);
            $this->db->bind(':price', $json->price);
            $this->db->bind(':name', $json->name);
            $this->db->bind(':description', $json->description);

            $this->db->bind(':id_resto', $json->id_resto);

            $this->db->single();
        } catch (PDOExeption $err) {
            return $err->getMessage();
            die();
        }
        // return $this->getUserByEmail($data->email);
    }
}
