<section id="contact-page">
        <div class="container"  style="border: 1px solid #0ff; border-radius: 30px; padding-top: 10px; padding-bottom: 15px; margin-top: 40px;">
            <div class="center">        
                <center> <h2>Register</h2></center>
                        <center> <p class="lead">
                    
                       <!--------------------------start MASSAGE----------------------------------->
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
			<!----------------------------end massage------------------------------------------------>
			
                    </p></center>
            </div> <br>
            <div class="row contact-wrap"> 
                <form class="contact-form" method="post" action="<?php echo base_url(); ?>viewer_register/save_user">
                    <div class="col-sm-5 col-sm-offset-1">
                        <div class="form-group">
                            <label>Name *</label>
                            <input type="text" name="blogger_name" class="form-control" required="required">
                        </div>
                        <div class="form-group">
                            <label>Email *</label>
                            <input type="email" name="blogger_email_address" class="form-control" required="required">
                        </div>
                         <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="blogger_password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="number" name="phone" class="form-control">
                        </div>
                                              
                    </div>
                    <div class="col-sm-5">
                       
                        <div class="form-group">
                            <label>Address *</label>
                            <textarea name="address" id="address" required="required" class="form-control" rows="2"></textarea>
                        </div>
                        <div class="form-group">
                            <label>City</label>
                            <input type="text" name="city" class="form-control">
                        </div>
                        <div class="form-group">
                          <label>Country</label>
                            <select class="form-control"  id="country"  name="country" required="required">
                                <option value="">Select Country......</option>
                                    <script type="text/javascript">
				        printCountryOptions();
				    </script>
                            </select>
                                            
                        </div>
                        <div class="form-group">
                            <button type="submit" name="submit" class="btn btn-primary btn-lg" required="required">Submit Message</button>
                        </div>
                    </div>
                </form> 
            </div><!--/.row-->
        </div><!--/.container-->
    </section><!--/#contact-page-->