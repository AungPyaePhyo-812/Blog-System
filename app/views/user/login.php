
<?php require_once APPROOT . "/views/inc/header.php"; ?>
<?php require_once APPROOT . "/views/inc/nav.php";?>

<div class="container-fluid">
    <div class="container my-5">
        <div class="col-md-8 offset-md-2">
            <div class="card p-5">
                <!-- Registeration Form Start -->
                <?php flash('register_success');?>
                <?php flash('login_fail');?>
                    <h1 class="english text-info text-center mb-3">Login To Post</h1>
                    <form action="<?php echo URLROOT .'user/login'; ?>" method = "post">
                        

                        <div class="form-group">
                            <label for="email" class="english">Email</label>
                            <input type="email" name="email" id="email" class="form-control
                            <?php echo !empty($data['email_err'])?'is-invalid':'' ?>">
                            <span class="text-danger english">
                                <?php echo !empty($data['email_err'])?$data['email_err']:'';?>
                            </span>
                        </div>

                        <div class="form-group">
                            <label for="password" class="english">Password</label>
                            <input type="password" name="password" id="password" class="form-control <?php echo !empty($data['password_err'])?'is-invalid':'';?>">
                            <span class="text-danger english">
                                <?php
                                    echo !empty($data['password_err'])? $data['password_err']:'';
                                ?>
                            </span>
                        </div>

                        

                        <div class="row p-4">
                            <div class="col-md-8 ">
                                <a href="<?php echo URLROOT .'user/register' ?>" class="english ">Not have an account yet!, Please Register!</a>
                            </div>
                            <div class="col-md-4">
                                <button type="reset" class="btn btn-outline-secondary english">Cancel</button>
                                <button type="submit" class="btn btn-primary english">Login</button>
                            </div>
                        </div>

                        
                    </form>
                <!-- Registeration Form End -->
            </div>
        </div>
    </div>
</div>


<?php require_once APPROOT . "/views/inc/footer.php"?>