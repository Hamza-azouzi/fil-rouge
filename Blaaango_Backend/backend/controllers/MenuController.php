<?php
header('Access-Control-Allow-Origin: http://127.0.0.1:3000');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

// require_once '../vendor/autoload.php';

class MenuController extends Controller
{

    public $data = [];

    public function __construct()
    {
        $this->MenuModel = $this->model('MenuModel');
    }








    public function read()
    {
        $menu = $this->MenuModel->read();

        if ($menu) {
            echo json_encode($menu);
        }
    }


    public function readmenuresto($id)
    {
        $menu = $this->MenuModel->readmenuresto($id);
        
        if ($menu) {
            echo json_encode($menu);
        }
    }



    public function insert()
    {


        $request = (object) [
            "image" => $_FILES['image'],
            "json" => $_POST['json'],
        ];

        try {
            if (json_decode($request->json)->role == "admin") {
                $name_image = $this->uplaodImages($request->image);
                $Menu = $this->MenuModel->insert(json_decode($request->json), $name_image);
                if ($Menu) {
                    print_r(json_encode(array(
                        "message" => "Menu created with success",
                    )));
                }
            } else {
                print_r(json_encode(array(
                    'error' => "You Don't Have permission to make this action",
                )));
                die();
            }
        } catch (\Throwable $th) {
            print_r(json_encode(array(
                'error' => "Authentication error",

            )));
        }
    }


    public function edit()
    {
    }

    public function delete($id)
    {
        $this->MenuModel->delete($id);
    }
}
