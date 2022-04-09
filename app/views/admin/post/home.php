<?php require_once APPROOT . "/views/inc/header.php"?>
<?php require_once APPROOT . "/views/inc/nav.php" ?>
  
   <div class="container-fluid">
       <div class="container my-5">
           <?php flash('del_suc')?>
           <a href="<?php echo URLROOT . 'post/create' ?>" class="btn btn-primary mb-3 english">Create</a>
           <div class="row">
               <div class="col-md-4">
                    <ul class="list-group">
                        <?php foreach($data['cats'] as $cat) :?>
                            <li class="list-group-item">
                            <a href="<?php echo URLROOT .'post/home/'.$cat->id?>" class="english text-decoration-none"><?php echo $cat->name?></a>
                            </li>
                        <?php endforeach;?>
                    </ul>
               </div>
               <div class="col-md-8">
                   <!-- Post Card Start -->
                   <?php foreach($data['posts'] as $post) :?>
                           
                        <div class="card mb-3">
                            <div class="card-header bg-dark text-white rounded-0">
                                <h6 class="english">
                                    <?php echo  $post->title; ?>
                                </h6>
                            </div>
                            <div class="card-block p-2">
                                <p> <?php echo $post->description; ?></p>
                                
                                    <div class="justify-content-end d-flex no-gutters">
                                        <a href="<?php echo URLROOT .'post/show/'.$post->id?>" class="english btn btn-success text-white btn-sm me-2">Details</a>
                                        <a  href="<?php echo URLROOT .'post/edit/' .$post->id?>" class="english btn btn-warning text-white btn-sm me-2">Edit</a>
                                        <a href="<?php echo URLROOT .'post/delete/' .$post->id?>" class="english btn btn-danger text-white btn-sm"
                                        >Delete</a>
                                    </div>
                               
                            </div>
                        </div>
                    <?php endforeach;?>
                   <!-- Post Card End -->

               </div>
           </div>
       </div>
   </div>
<?php require_once APPROOT . "/views/inc/footer.php" ?>