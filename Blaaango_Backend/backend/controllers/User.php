<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');


class User extends Controller
{

    public $data = [];

    public function __construct()
    {
        $this->userModel = $this->model('UserModel');
    }

    


    public function login()
    {
        $user = $this->userModel->getUserByEmail($this->data->email);
        
        if ($user) {
            if (password_verify($this->data->password, $user->password)) {
                unset($user->password);
                print_r(json_encode(array(
                    'error' => 'false',
                    'User' => $user,
                )));
            } else {
                $res = json_encode(array(
                    'error' => 'true',
                    'message' => 'password incorrect'
                ));
                print_r($res);
            }
        } else {
            $res = json_encode(array(
                'error' => 'true',
                'message' => 'email incorrect'
            ));
            print_r($res);
        }
    }






    public function register()
    {
        try {
            $options = [
                'cost' => 12,
            ];

            $this->data->password = password_hash($this->data->password, PASSWORD_BCRYPT, $options);


            $user = $this->userModel->register($this->data);

            unset($user->password);
            print_r(json_encode(array(
                'User' => $user,
            )));
        } catch (\PDOExeption $err) {
            http_response_code(500);
            print_r(json_encode(array('error' => $err->getMessage())));
            die();
        }
    }


   
}
