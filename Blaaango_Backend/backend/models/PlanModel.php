<?php

class PlanModel
{
  
    public $table = "plan";
    
    public function __construct()
    {
        $this->db = new DB();
    }

   


    public function read()
    {
        $this->db->query("SELECT * FROM $this->table");
        return $this->db->all();
    }


    public function insert($json,$image)
    {
 
        try {

            $this->db->query("INSERT INTO plan(image,time,name,Interests,location,mapslink) VALUES(:image,:time,:name,:Interests,:location,:mapslink)");


            $this->db->bind(':image', $image);
            $this->db->bind(':time', $json->time);

            $this->db->bind(':name', $json->name);
            $this->db->bind(':Interests', $json->Interests);
            $this->db->bind(':location', $json->location);
            $this->db->bind(':mapslink', $json->mapslink);
            $this->db->single();


        } catch (\PDOExeption $err) {
            return $err->getMessage();
            die();
        }
    }



    // public function getidplan()
    // {


    //     // for get plan id
    //     $this->db->query("SELECT * FROM `resto` ORDER BY id DESC LIMIT 1");
        
    //     return $this->db->single();

    // }



    public function getidplan2()
    {


        // for get plan id
        $this->db->query("SELECT * FROM `plan` ORDER BY id DESC LIMIT 1");
        
        return $this->db->single();

    }



    public function bindPlanWithResto($data,$plan)
    {
       $data = (int)$data;
       $plan = (int)$plan;
        
        $this->db->query("INSERT INTO `plan-resto`(`id_resto`, `id_plan`) VALUES ('$data','$plan')");

        return $this->db->execute();
    }



}

   

