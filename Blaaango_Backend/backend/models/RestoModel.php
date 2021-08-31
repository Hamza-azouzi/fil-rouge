<?php

class RestoModel
{
  
    public $table = "resto";
    
    public function __construct()
    {
        $this->db = new DB();
    }

   


    public function read()
    {
        $this->db->query("SELECT * FROM resto");
        return $this->db->all();
    }


    
    public function insert($json,$image,$logo)
    {
        // $uniqueRef=strtoupper($this->uniqidReal());
        
        try {
            $this->db->query("INSERT INTO resto(image,logo,name,adresse,localisation,description) VALUES(:image,:logo,:name,:adresse,:localisation,:description)");
            $this->db->bind(':image', $image);
            $this->db->bind(':logo', $logo);

            $this->db->bind(':name', $json->name);
            $this->db->bind(':adresse', $json->adresse);
            $this->db->bind(':localisation', $json->localisation);
            $this->db->bind(':description', $json->description);
            $this->db->single();

        } catch (\PDOExeption $err) {
            return $err->getMessage();
            die();
        }
        // return $this->getUserByEmail($data->email);
    }



    public function readResto($data)
    {
        $this->db->query("SELECT * FROM `plan-resto`pr,plan p,resto r WHERE pr.id_plan=$data->id_plan AND pr.id_resto=r.id AND pr.id_plan=p.id");
        return $this->db->all();
    }


}
