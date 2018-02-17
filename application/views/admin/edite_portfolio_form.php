<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">New Portfolio</h1>
    </div>
</div>

<!--<label id="form-msg-label" class="my-error-class"></label>-->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel  panel-default">
                <div class="panel-heading">Portfolio Form</div>
            </div>


            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">

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
                        <form action="<?php echo base_url(); ?>super_admin/update_portfolio" method="post" enctype="multipart/form-data">

                            <div class="col-lg-6">

                                <div class="form-group">
                                    <label>Portfolio Title</label> 
                                     <input type="hidden" name="portfolio_id" value="<?php echo $portfolio_info->portfolio_id; ?>">
                                    <input id="portfolio_title" class="form-control" placeholder="portfolio title" name="portfolio_title" value="<?php echo $portfolio_info->portfolio_title; ?>" required="required">
                                </div>
                                <div class="form-group">
                                    <label>Portfolio Category</label>
                                        <select name="portfolio_category" class="form-control">
                                            <option>Select</option>                                       
                                            <option value="Cerative">Cerative</option>
                                            <option value="Cerative">Photography</option>
                                            <option value="Cerative">Web development</option>
                                            </select>       
                                    
                                </div>
                                <div class="form-group">
                                    <label>Publication Status</label>
                                    <div class="radio">
                                        <label> <input type="radio" name="portfolio_status"
                                                       id="portfolio_status" value="1" checked>Published
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label> <input type="radio" name="portfolio_status"
                                                       id="portfolio_status" value="0">Un Published
                                        </label>
                                    </div>
                                </div>

                            </div>
                            <div class="col-lg-6">

                                <div class="form-group">
                                    <label>Portfolio Description</label>
                                    <textarea class="form-control" rows="3"
                                              id="portfolio_description" name="portfolio_description" value="<?php echo $portfolio_info->portfolio_description; ?>" ></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Portfolio Image</label> <input type="file" id="portfolio_images"
                                                                          class="form-control" placeholder="portfolio_images" name="portfolio_images" required="required">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <button type="submit" class="btn btn-primary">Submit Button</button>
                                <button type="reset" class="btn btn-primary">Reset Button</button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
