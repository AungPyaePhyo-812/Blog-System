<?php
    class Home extends Controller{
        public function __construct(){
            $this->postModel = $this->model("PostModel");
            $this->catModel = $this->model("CategoryModel");
            $this->userModel = $this->model("UserModel");
        }



        
        //To Show in Home Page
        public function index($params=[]){
           
            $data =[
                'cats'=>'',
                'posts' =>''
            ];
            $data['cats'] = $this->catModel->getAllCategory();
            $data['posts'] = $this->postModel->getPostByCatId($params[0]);
            $this->view("home/index",$data);
        }

        //To Show Data in Home Page
        public function show($params = []){
            $post = $this->postModel->getPostById($params[0]);
            $this->view('home/show',['post'=>$post]);
            
        }
    }