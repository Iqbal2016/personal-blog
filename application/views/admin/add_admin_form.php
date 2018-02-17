<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">New Admin</h1>
    </div>
</div>

<!--<label id="form-msg-label" class="my-error-class"></label>-->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel  panel-default">                       
                <div class="panel-heading">
                    Basic Admin Elements
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
                        <form action="<?php echo base_url(); ?>super_admin/save_admin" method="post" enctype="multipart/form-data">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>First Name</label> <input id="first_name"
                                                                     class="form-control" placeholder="First Name" name="first_name" required="required">
                                </div>
                                <div class="form-group">
                                    <label>Last Name</label> <input id="last_name"
                                                                     class="form-control" placeholder="Last Name" name="last_name" required="required">
                                </div>
                                <div class="form-group">
                                    <label>Email Address</label> <input type="email" id="admin_email_address"
                                                                     class="form-control" placeholder="Email Address" name="admin_email_address" required="required">
                                </div>
                                 <div class="form-group">
                                     <label>Password</label> <input type="password" id="admin_password"
                                                                     class="form-control" placeholder="Password" name="admin_password" required="required">
                                </div>
                                <div class="form-group">
                                     <label>Phone</label> <input type="text" id="phone"
                                                                     class="form-control" placeholder="phone" name="phone" required="required">
                                </div>


                                
                            </div>

                            <div class="col-lg-6">

                                

                                <div class="form-group">
                                    <label>Image</label> <input type="file" id="admin_images"
                                                                     class="form-control" placeholder="image" name="admin_images" required="required">
                                </div>
                                 <div class="form-group">
                                    <label>Address</label>
                                    <textarea class="form-control" rows="5" id="blog_description" name="Address"></textarea>
                                </div>
                                 <div class="form-group">
                                     <label>City</label> <input type="text" id="city"
                                                                     class="form-control" placeholder="city" name="city" required="required">
                                </div>
                             <!---    <div class="form-group">
                                     <label>Country</label> <input type="text" id="country"
                                                                     class="form-control" placeholder="country" name="country" required="required">
                                </div>--->
				<div class="form-group">
                                    <label for="Select"> Select Country</label>
                                        <select id="country" name="country" value=" " class="form-control">
                                             <option> Select Country</option>
                                              <script type="text/javascript">
                                                printCountryOptions();
                                            </script>
					</select>
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
