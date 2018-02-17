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
                        // echo '------'.$message;
                        if ($message) { // echo '------1';
                            ?>
                            <h4
                                class="alert_success"><?php echo $message; ?></h4>


                            <?php
                            $this->session->unset_userdata('message');
                        }
                        ?>

                        <form action="<?php echo base_url(); ?>super_admin/save_portfolio" method="post" enctype="multipart/form-data">

                            <div class="col-lg-6">

                                <div class="form-group">
                                    <label>Portfolio Title</label> <input id="portfolio_title"
                                                                          class="form-control" placeholder="Portfolio Title"
                                                                          name="portfolio_title" required="required">
                                </div>
                                 <div class="form-group">
                                            <label>Selects</label>
                                            <select name="portfolio_category" class="form-control">
                                            <option>Select</option>                                       
                                            <option>Cerative</option>
                                            <option>Photography</option>
                                            <option>Web development</option>
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
                                    <textarea class="form-control" rows="2"
                                              id="portfolio_description" name="portfolio_description"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Portfolio Image (size : 200*120)</label> <input type="file" id="portfolio_images"
                                                                          class="form-control" placeholder="portfolio_images" name="portfolio_images" required="required">
                                </div>
                                <div class="form-group">
                                    <label>Portfolio Image (size : Big)</label> <input type="file" id="portfolio_images"
                                                                          class="form-control" placeholder="portfolio_images" name="portfolio_images" required="required">
                                </div>
                            </div>
                            <div class="col-lg-12">
                            <div class="col-lg-6">
                                <button type="submit" class="btn btn-primary">Submit Button</button>
                               

                            </div>
                             <div class="col-lg-6">
                                
                                <button type="reset" class="btn btn-primary">Reset Button</button>

                            </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
