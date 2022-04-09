<?php require_once APPROOT . "/views/inc/header.php"?>
<?php require_once APPROOT . "/views/inc/nav.php" ?>

<div class="container-fluid">
    <div class="container my-5">
        <div class="col-md-8 offset-md-2">
            <div class="card p-5">
                <h1 class="english text-info text-center mb-3">Create A Post</h1>
                    <form action="<?php echo URLROOT . 'post/create';?>" enctype = "multipart/form-data" method="post" >

                    <div class="form-group">
                            <label for="cat_id" class="english">Post Category</label>
                            <select  class="form-control english" name="cat_id" id="cat_id">
                                <?php foreach($data['cats'] as $cat):?>
                                    <option value="<?php echo $cat->id;?>">
                                        <?php echo $cat->name; ?>
                                    </option>
                                <?php endforeach;?>
                            </select>
                        </div>
                        

                        <div class="form-group">
                            <label for="title" class="english">Title</label>
                            <input type="text" name="title" id="title" class="form-control 
                            <?php echo !empty($data['title_err'])?'is-invalid':'';?>">
                            <span class="text-danger english"><?php echo !empty($data['title_err'])?$data['title_err']:'';?></span>
                        </div>

                        <div class="form-group">
                            <label for="desc" class ="english">Post Description</label>
                            <textarea name="desc" id="desc" class="form-control <?php echo !empty($data['desc_err'])?'is-invalid':'';?>" cols="10" rows="3"></textarea>
                            <span class="text-danger english"><?php echo !empty($data['desc_err'])?$data['desc_err']:'';?></span>
                        </div>

                        <div class="form-group">
                            <label for="file" class="english">Image</label>
                            <input type="file" id="file" name="file" class="form-control bg-primary text-white english <?php echo !empty($data['file_err'])?'is-invalid':'';?>">
                            <span class="text-danger english"><?php echo !empty($data['file_err'])?$data['file_err']:'';?></span>
                        </div>

                        
                        <div class="form-group">
                            <label for="content" class ="english">Post Content</label>
                            <textarea name="content" id="content" class="form-control <?php echo !empty($data['content_err'])?'is-invalid':'';?>" cols="10" rows="3"></textarea>
                            <span class="text-danger english"><?php echo !empty($data['content_err'])?$data['content_err']:'';?></span>
                        </div>



                        <div class="row p-4">
                            <div class="col-md-8 ">
                                
                            </div>
                            <div class="col-md-4">
                                <button class="btn btn-outline-secondary english">Cancel</button>
                                <button class="btn btn-primary english">Create</button>
                            </div>
                        </div>

                        
                    </form>
             

            </div>
        </div>
    </div>
</div>

<?php require_once APPROOT . "/views/inc/footer.php" ?>