

    <section id="contact-info">
        <div class="center">                
            <h2>How to Reach Us?</h2>
           </div>
        <div class="gmap-area">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 text-center">
                        <div class="gmap">
                            <iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=JoomShaper,+Dhaka,+Dhaka+Division,+Bangladesh&amp;aq=0&amp;oq=joomshaper&amp;sll=37.0625,-95.677068&amp;sspn=42.766543,80.332031&amp;ie=UTF8&amp;hq=JoomShaper,&amp;hnear=Dhaka,+Dhaka+Division,+Bangladesh&amp;ll=23.73854,90.385504&amp;spn=0.001515,0.002452&amp;t=m&amp;z=14&amp;iwloc=A&amp;cid=1073661719450182870&amp;output=embed"></iframe>
                        </div>
                    </div>

                    <div class="col-sm-6 map-content">
                        <ul class="row">
                           
                                <address>
                                    <h3>Present Address</h3>
                                    <h5>Md Iqbal Hossain</h5>
                                    <p>House # 384/3, Road: TV Tower road, East Rampura,  <br>
                                    Dhaka-1219,Bangladesh</p>
                                    <p>Phone : 01813084716 <br>
                                        Email : iqbal.cse2015@yahoo.com<br>
                                        Skype ID : iqbalhossain95
                                    </p>
                                </address>
                              <address>
                                  <h3>Permanent Address</h3>
                                    <h5>Md Iqbal Hossain</h5>
                                    <p>Village : Char Alimabad<br>
                                        P.O : Mollar Hat<br>
                                        P.S : Kalkini<br>
                                        District : Madaripur<br>
                                        Country : Bangladesh.
                                    </p>
                                </address>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>  <!--/gmap_area -->

    <section id="contact-page">
        <div class="container"  style="border: 1px solid #0ff; border-radius: 30px; padding-top: 10px; padding-bottom: 15px;">
            <div class="center">        
                <center> <h2>Drop Your Message</h2></center>
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
                <div class="status alert alert-success" style="display: none"></div>
                <form id="main-contact-form" class="contact-form" name="contact-form" method="post" action="<?php echo base_url(); ?>contract_admin/save_contract">
                    <div class="col-sm-5 col-sm-offset-1">
                        <div class="form-group">
                            <label>Name *</label>
                            <input type="text" name="name" class="form-control" required="required">
                        </div>
                        <div class="form-group">
                            <label>Email *</label>
                            <input type="email" name="email" class="form-control" required="required">
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="number" name="number" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Company Name</label>
                            <input type="text" name="company" class="form-control">
                        </div>                        
                    </div>
                    <div class="col-sm-5">
                        <div class="form-group">
                            <label>Subject *</label>
                            <input type="text" name="subject" class="form-control" required="required">
                        </div>
                        <div class="form-group">
                            <label>Message *</label>
                            <textarea name="message" id="message" required="required" class="form-control" rows="6"></textarea>
                        </div>                        
                        <div class="form-group">
                            <button type="submit" name="submit" class="btn btn-primary btn-lg" required="required">Submit Message</button>
                        </div>
                    </div>
                </form> 
            </div><!--/.row-->
        </div><!--/.container-->
    </section><!--/#contact-page-->