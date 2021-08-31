<?php
header('Access-Control-Allow-Origin: http://127.0.0.1:3000');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

// require_once '../vendor/autoload.php';

class RestoController extends Controller
{

    public $data = [];

    public function __construct()
    {
        $this->RestoModel = $this->model('RestoModel');
    }
 
    public function read()
    {
        $user = $this->RestoModel->read();
        if($user)
        {
            echo json_encode($user);
        }
    }



    public function insert()
    {

        
        $request = (object) [
            "image" => $_FILES['image'],
            "logo" => $_FILES['logo'],
            "json" => $_POST['json']
        ]; 
        
        try {
            if (json_decode($request->json)->role == "admin") {
                    $name_image = $this->uplaodImages($request->image);
                    $name_logo = $this->uplaodImages($request->logo); 
                    $Resto = $this->RestoModel->insert(json_decode($request->json),$name_image,$name_logo);
                    if ($Resto) {
                        print_r(json_encode(array(
                            "error"=>"false",
                            "message" => "Resto created with success",
                        )));
                    }
                } else {
                    print_r(json_encode(array(
                        'error' => "You Don't Have permission to make this action",
                    )));
                    die();
                }
            } catch (\Throwable$th) {
                print_r(json_encode(array(
                    'error' => "Authentication error",
                    
                )));
            }

    }


    public function edit()
    {
        
    }

    public function delete($id){
        $this->RestoModel->delete($id);
    }



    public function readResto()
    {
        $food = $this->RestoModel->readResto($this->data);
        if($food)
        {
            echo json_encode($food);
        }
    }
    
}
