<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Edite Blog</h1>
    </div>
</div>

<!--<label id="form-msg-label" class="my-error-class"></label>-->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel  panel-default">                       
                <div class="panel-heading">
                    Basic Form Elements
                </div>
            </div>
            <?php
            $message = $this->session->userdata('message');
            //echo '------'.$message;
            if ($message) { //echo '------1';
                ?>
                <h4 class="alert_success"><?php echo $message; ?></h4>
                <?php
                $this->session->unset_userdata('message');
            }
            ?>

            <div class="panel-body">
                <div class="row">

                    <div class="col-lg-12">
                        <form action="<?php echo base_url(); ?>super_admin/save_blog" method="post">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Blog Title</label>
                                    <input type="hidden" name="blog_id" value="<?php echo $blog_info->blog_id;?>">
                                    <input id="blog_title" class="form-control" name="blog_title" value="<?php echo $blog_info->blog_title;?>" required="required">
                                                                     
                                </div>
                                <div class="form-group">
                                    <label>Blog Short Description</label>
                                    <textarea class="form-control" rows="2" id="blog_short_description" name="blog_short_description"><?php echo $blog_info->blog_short_description;?></textarea>
                                </div>


                                <div class="form-group">
                                    <label for="siteServerDisabledSelect">Category Name</label> <select name="category_id" class="form-control">
                                                <?php
                                                foreach ($all_category as $v_category) {
                                                    ?>   
                                                <option value="<?php echo $v_category->category_id; ?>"><?php echo $v_category->category_name; ?></option>
                                            <?php }
                                            ?>
                                        </select>

                                </div>
                            </div>

                            <div class="col-lg-6">

                                <div class="form-group">
                                    <label>Author Name</label> <input id="author_name"
                                                                      class="form-control" placeholder="Author Name"  name="author_name" value="<?php echo $blog_info->author_name;?>" required="required">
                                </div>
                                <div class="form-group">
                                    <label>Author E-mail</label> <input id="author_email"
                                                                        class="form-control" placeholder="Author E-mail"  name="author_email" value="<?php echo $blog_info->author_email;?>" required="required">
                                </div>
                                <div class="form-group">
                                    <label>Publication Status</label>  <br>                               
                                    
                                    <?php
                                        if ($blog_info->publication_status == 1) {
                                        ?>
                                    <input checked="checked" type="radio" name="publication_status" value="1"> Published <br>
                                        <input type="radio" name="publication_status" value="0"> Un Published
                                        <?php }
                                            else {
                                        ?>
                                        <input type="radio" name="publication_status" value="1"> Published <br>
                                        <input checked="checked" type="radio" name="publication_status" value="0"> Un Published
                                        <?php } ?>
                                </div>

                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Blog Description</label>
                                    <textarea class="form-control" rows="8" id="blog_description" name="blog_description"><?php echo $blog_info->blog_description;?></textarea>
                                </div>

                            </div>
                            <div class="col-lg-6">
                                <button type="submit" class="btn btn-primary">Submit Button</button>
                            </div>
                            <div class="col-lg-6">
                                <button type="reset" class="btn btn-primary">Reset Button</button>

                            </div>
                        </form>
                    </div>
                    <!-- /.col-lg-6 (nested) -->
                    <!-- /.col-lg-6 (nested) -->
                </div>
                <!-- /.row (nested) -->
            </div>




        </div>
    </div>
</div>
