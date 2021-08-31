<?php
header('Access-Control-Allow-Origin: http://127.0.0.1:3000');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

// require_once '../vendor/autoload.php';

class PlanController extends Controller
{

    public $data = [];

    public function __construct()
    {
        $this->PlanModel = $this->model('PlanModel');
    }








    public function read()
    {
        $user = $this->PlanModel->read();


        if ($user) {
            echo json_encode($user);
        }
    }



    public function insert()
    {


        $request = (object) [
            "image" => $_FILES['image'],
            "json" => $_POST['json']
        ];

        $json = json_decode($request->json);




        if (json_decode($request->json)->role == "admin") {
            $name_image = '';
            if (isset($name_image)) {
                $name_image = $this->uplaodImages($request->image);
            }
            $Plan = $this->PlanModel->insert(json_decode($request->json), $name_image);

            $idplan = $this->PlanModel->getidplan2();



            print_r($idplan->id);

            for ($i = 0; $i < COUNT($json->bindRestoToPlan); $i++) {

                $this->PlanModel->bindPlanWithResto($json->bindRestoToPlan[$i], $idplan->id);
            }
            print_r(json_encode(array(
                "message" => "Plan created with success",
            )));
        } else {
            print_r(json_encode(array(
                'error' => "You Don't Have permission to make this action",
            )));
            die();
        }

        // } catch (\Throwable$th) {
        //     print_r(json_encode(array(
        //         'error' => "Authentication error",

        //     )));
        // }

    }







    public function edit()
    {
    }

    public function delete($id)
    {
        $this->userModel->delete($id);
    }
}
