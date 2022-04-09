<?php require_once APPROOT . "/views/inc/header.php"?>
<?php require_once APPROOT . "/views/inc/nav.php" ?>

<div class="container-fluid">
    <div class="container my-3">
    <?php flash('pes'); ?>
        <div class="row mb-2">
            <div class="col-md-6">
            <a href="<?php echo URLROOT ."post/home/".$data['post']->cat_id;?>" 
            class="btn btn-primary">Back</a>
            </div>
            <div class="col-md-6 justify-content-end d-flex">
            <a href="<?php echo URLROOT ."post/edit/".$data['post']->id;?>" 
            class="btn btn-primary">Edit</a>
            </div>
        </div>
        <div class="col-md-8 offset-md-2">
            <div class="card p-5">
                <div class="card-header">
                    <h6 class="english">
                        <?php echo $data['post']->title;?>
                    </h6>
                </div>
                <div class="card-body">
                    <img src="<?php echo URLROOT .'assets/uploads/' .$data['post']->image;?>" alt="">
                    <p class="english mt-3">
                        <?php echo $data['post']->content; ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once APPROOT . "/views/inc/footer.php" ?>