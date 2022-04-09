
    <?php require_once APPROOT . "/views/inc/header.php"?>
    <?php require_once APPROOT . "/views/inc/nav.php" ?>
      <div class="container mt-5">
          <div class="row no-gutters">
          <div class="col-md-3">
    <div class="card rounded-0">
        <div class="card-header">
            <h2 class="text-primary english">Category</h2>
        </div>
        <div class="card-block">
            <ul class="list-group">
                <?php foreach($data['cats'] as $cat) :?>
                <li class="list-group-item rounded-0 d-flex justify-content-between">
                <span><a href="#" class="english text-dark text-decoration-none"><?php echo $cat->name ?></a>
                </span>
                    
                    <span class="">
                        
                        <a href="<?php echo URLROOT . 'category/edit/' .$cat->id ?>" class="english text-warning text-decoration-none">Edit</a>

                        <a href="<?php echo URLROOT .'category/delete/'.$cat->id?>" class="english text-danger text-decoration-none">Delete</a>
                    </span>


                </li>
                <?php endforeach; ?>
                 
            </ul>
        </div>
    </div>
</div>
              <div class="col-md-5 offset-md-2 my-5">
                   <!-- Registeration Form Start -->
                <!-- <?php flash('register_success');?>
                <?php flash('login_fail');?> -->
                    <h1 class="english text-info text-center mb-3">Create Category</h1>
                    <form action="<?php echo URLROOT .'category/create'; ?>" method = "post" >
                        

                        <div class="form-group">
                            <label for="name" class="english">Category Name</label>
                            <input type="text" name="name" id="name" class="form-control mt-3
                            <?php echo !empty($data['name_err'])?'is-invalid':'' ?>">
                            <span class="text-danger english">
                                <?php echo !empty($data['name_err'])?$data['name_err']:'';?>
                            </span>
                        </div>


                        

                        <div class="mt-2" >
                            <button type="submit" class="btn btn-primary english float-end ms-2">Create</button>
                            <button type="reset" class="btn btn-outline-secondary english float-end">Cancel</button>
                               
                          
                        </div>

                        
                    </form>
                <!-- Registeration Form End -->
              </div>
          </div>
      </div>
    
    <?php require_once APPROOT . "/views/inc/footer.php" ?>