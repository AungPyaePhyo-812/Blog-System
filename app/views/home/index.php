<?php require_once APPROOT . "/views/inc/header.php"?>
<?php require_once APPROOT . "/views/inc/nav.php" ?>

<?php flash('login_success'); ?>


           
   <div class="container-fluid">
       <div class="container my-2">
           <?php flash('del_suc')?>
           
           <div class="row">
               <div class="col-md-4">
               <h2 class="text-primary english mb-3">Category</h2>
                    <ul class="list-group">
                        <?php foreach($data['cats'] as $cat) :?>
                            <li class="list-group-item">
                            <a href="<?php echo URLROOT .'home/index/'.$cat->id?>" class="english text-decoration-none"><?php echo $cat->name?></a>
                            </li>
                        <?php endforeach;?>
                    </ul>
               </div>
               <div class="col-md-8 mt-5">
                   <!-- Post Card Start -->
                   
                  <div class="row">
                  <?php foreach($data['posts'] as $post) :?>
                  <div class="col-md-6">
                        <div class="card">
                                <div class="card-header bg-dark text-white rounded-0">
                                    <h6 class="english">
                                        <?php echo  $post->title; ?>
                                    </h6>
                                </div>
                                <div class="card-block p-2">
                                    <p> <?php echo $post->description; ?></p>
                                    
                                        <div class="justify-content-end d-flex no-gutters">
                                            <a href="<?php echo URLROOT .'home/show/'.$post->id?>" class="english btn btn-success text-white btn-sm me-2">Details</a>
                                        </div>
                                </div>
                            </div>   
                    </div>
                    <?php endforeach;?>
                  </div>
                              
                   
                   <!-- Post Card End -->

               </div>
           </div>
       </div>
   </div>

<?php require_once APPROOT . "/views/inc/footer.php"?>
