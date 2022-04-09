<?php
    class Post extends Controller{
        public function __construct(){
            $this->postModel = $this->model("PostModel");
            $this->catModel = $this->model("CategoryModel");
        }

        public function home($params=[]){
           
            $data =[
                'cats'=>'',
                'posts' =>''
            ];
            $data['cats'] = $this->catModel->getAllCategory();
            $data['posts'] = $this->postModel->getPostByCatId($params[0]);
            $this->view("admin/post/home",$data);
        }

        //When Create button Do this job
        public function create(){
           $data =[
            'title'=>'',
            'desc'=>'',
            'file'=>'',
            'content'=>'',
            'title_err'=>'',
            'desc_err'=>'',
            'file_err'=>'',
            'content_err'=>'',
            'cats'=>'',
           ];

           $data['cats'] = $this->catModel->getAllCategory();
           if($_SERVER['REQUEST_METHOD'] == "POST"){


               $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);


               $root = dirname(dirname(dirname(__FILE__)));
               $files = $_FILES['file'];

               $data['title'] = $_POST['title'];
               $data['desc'] = $_POST['desc'];
               $data['content'] = $_POST['content'];

               //Without title data, Can't Create any post
               if(empty($data['title'])){
                   $data['title_err'] = "Title must supply";
               }
               //Without description data, Can't Create any post
               if(empty($data['desc'])){
                $data['desc_err'] = "Title must supply";
                }
                //Without content data, Can't Create any post
                if(empty($data['content'])){
                    $data['content_err'] = "Title must supply";
                }

                //If have not above error, do this job
                if(empty($data['title_err']) && empty($data['desc_err']) &&empty($data['content_err'])){
                    //first file move to uploads folder
                    if(!empty($files['name'])){
                        move_uploaded_file($files['tmp_name'], $root . '/public/assets/uploads/' .$files['name']);
                        //Insert Date to Database and redirect post/home
                        if($this->postModel->insertPost($_POST['cat_id'], $data['title'], $data['desc'], $files['name'], $data['content'])){
                            flash("pis","Post Insert Successfully");
                            redirect(URLROOT . "post/home/1");
                        }else{
                            $this->view("admin/post/create",$data);
                        }
                    }else{
                        $this->view("admin/post/create",$data);
                    }
                } else{
                    $this->view("admin/post/create",$data);
                }
           }else{
               $this->view("admin/post/create",$data);
           }
        }

        //For Details Button
        public function show($params = []){
            $post = $this->postModel->getPostById($params[0]);
            $this->view('admin/post/show',['post'=>$post]);
            
        }

        public function edit($params = []){
           if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $data =[
                'title'=>'',
                'desc'=>'',
                'file'=>'',
                'content'=>'',
                'title_err'=>'',
                'desc_err'=>'',
                'file_err'=>'',
                'content_err'=>'',
                'cats'=>'',
               ];

               $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

               $root = dirname(dirname(dirname(__FILE__)));
               $files = $_FILES['file'];
               $filename = $_FILES['file']['name'];


               $data['title'] = $_POST['title'];
               $data['desc'] = $_POST['desc'];
               $data['content'] = $_POST['content'];

               if(empty($data['title'])){
                   $data['title_err'] = "Title must supply";
               }

               if(empty($data['desc'])){
                $data['desc_err'] = "Title must supply";
                }

                if(empty($data['content'])){
                    $data['content_err'] = "Title must supply";
                }

                if(empty($data['title_err']) && empty($data['desc_err']) &&empty($data['content_err'])){
                    if(!empty($files['name'])){
                        move_uploaded_file($files['tmp_name'], $root . '/public/assets/uploads/' .$files['name']);
                        
                    }else{
                        //Get old file when editing already have file
                        $filename = $_POST['old_file'];
                    }
                    $curId = getCurrentId();
                    deleteCurrentId();
                    if($this->postModel->updateData($curId,$_POST['cat_id'],$data['title'],$data['desc'],$filename,$data['content'])){
                        flash("pes","Post Edit Success");
                        redirect(URLROOT .'post/show/'. $curId);
                    }else{
                        flash("pef","Post Edit Fail");
                        redirect(URLROOT .'post/edit/'. $curId);
                    }
                } else{
                    $this->view("admin/post/create",$data);
                }

            }else{
            setCurrentId($params[0]);
            $data['cats'] = $this->catModel->getAllCategory();
            $data['post'] = $this->postModel->getPostById($params[0]);
            $this->view('admin/post/edit',$data);
           }
        }


        // To delete post
        public function delete($params = []){
            $data =[
                'cats'=>'',
                'posts' =>''
            ];
            if($this->postModel->deletePost($params[0])){
                flash("del_suc","Post Delete Success");
                redirect(URLROOT .'post/home/1');
            }else{
                flash("del_suc","Post Delete fail");
                $data['cats'] = $this->catModel->getAllCategory();
                $data['posts'] = $this->postModel->getPostByCatId($params[0]);
                $this->view("admin/post/home",$data);
            }
            

        }
      
    }