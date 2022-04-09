<?php
    class User extends Controller{
        public function __construct(){
            $this->postModel = $this->model("PostModel");
            $this->catModel = $this->model("CategoryModel");
            $this->userModel = $this->model("UserModel");
        }
        
        // $this->view("user/register",$data);
        public function register(){
            if($_SERVER['REQUEST_METHOD']=="POST"){
                $POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
                $data = [
                        "name"=>$POST['name'],
                        "email"=>$POST['email'],
                        "password"=>$POST['password'],
                        "confirm_password"=>$POST['confirm_password'],
            
                        "name_err"=>'',
                        "email_err"=>'',
                        "password_err"=>'',
                        "confirm_password_err"=>'',
                    ];

                    if(empty($data['name'])){
                        $data['name_err'] = "Username must supply";
                    }
                    if(empty($data['email'])){
                        $data['email_err'] = "Email must supply";
                    }else{
                        if($this->userModel->getUserByEmail($data['email'])){
                            $data['email_err'] = "Email already taken";
                        }
                    }
                    if(empty($data['password'])){
                        $data['password_err'] = "Password must supply";
                    }
                    if(empty($data['confirm_password'])){
                        $data['confirm_password_err'] = "Confirm Password must supply";
                    }else{
                        if($data['password'] != $data['confirm_password']){
                            $data['confirm_password_err'] = "Password does not match";
                        }
                    }
                    if(empty($data['name_err']) && empty($data['email_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])){
                        if($this->userModel->register($data['name'], $data['email'],$data['password'])){
                            flash('register_success', "Register Success, Please Login!");
                            $this->view('user/login');
                        }else{
                          $this->view('user/register');
                        }
                    }else{
                        $this->view("user/register",$data);
                    }

            }else{
                $this->view("user/register");
            }
        }

        public function login(){
            if($_SERVER['REQUEST_METHOD']=="POST"){
                $POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
                $data = [
                        "email"=>$POST['email'],
                        "password"=>$POST['password'],
            
                        "email_err"=>'',
                        "password_err"=>'',
                    ];

                  
                    if(empty($data['email'])){
                        $data['email_err'] = "Email must supply";
                    }
                    if(empty($data['password'])){
                        $data['password_err'] = "Password must supply";
                    }
                    
                    if(empty($data['email_err']) && empty($data['password_err'])){
                       $rowUser = $this->userModel->getUserByEmail($data['email']);
                       if($rowUser){
                            $hash_pass = $rowUser->password;
                            if(password_verify($data['password'],$hash_pass)){
                                setUserSession($rowUser);
                                redirect(URLROOT .'admin/home');
                            }
                            else{
                                flash("login_fail","Crenditial Error");
                                $this->view('user/login');
                           }
                       }
                       else{
                           $data['email_err'] = "Email Error";
                       }
                    }else{
                        $this->view("user/login",$data);
                    }

            }else{
                $this->view("user/login");
            }
        }

        public function logout($params = []){
            unsetUserSession();
          
            
            $this->view('user/login');
        }
    }