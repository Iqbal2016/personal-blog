<?php
    $blogger_id = $this->session->userdata('blogger_id');
?>
<section id="blog" class="container">

        <div class="blog">
            <div class="row">
                 <div class="col-md-9">
                 <div class="blog-item">
                 
                 	
                        <div class="row">
                            
                            <div class="col-sm-12 blog-content">
                            	<h2><a href="blog-item.html"><?php echo $blog_details->blog_title; ?></a></h2>
                                <a href=""><img class="img-responsive img-blog" src="<?php echo $blog_details->blog_images; ?>" width="100%" alt="" /></a>                               
                                <h3><?php echo $blog_details->blog_description; ?></h3>
                                
                                 <p>
                                 <!------------------------------start commence------------------------------->
                                  <div class="kode-blog-info"> 
                                     <?php
                                    foreach ($comments_by_blog_id as $comments) {
                                        ?>
                                      <strong><?php echo $comments->blogger_name ?> :</strong> <?php echo $comments->comments ?><br>
                                    <?php } ?>
                                  </div>
                                 <div class="kode-blog-info">
                                    <?php if ($blogger_id) { ?>
                                        <form action="<?php echo base_url(); ?>viewer_manager/post_comments" method="post">
                                            <div class="form-group">
                                                <label>Comments:</label>
                                                <textarea class="form-control" rows="2" id="comments"  name="comments"  placeholder="Your comments" style="border: 1px solid #000;"></textarea>
                                            </div>
                                            <input name="blog_id" type="hidden" value="<?php echo $blog_details->blog_id; ?>" />
                                            <input name="blogger_id" type="hidden" value="<?php echo $blogger_id; ?>" /> 
                                            <input type="submit" class="btn btn-primary" value="Post your comment" />

                                        </form>
                                    <?php } else { ?><br><br>
                                        Please <b>Login</b> to post your comment.
                                    <?php } ?>
                                 </div>
                                    <!---------------------------------end commence------------------------------------------->
                                   </p>
                                
                            </div>
                        </div>    
                    </div><!--/.blog-item-->
                </div><!--/.col-md-8-->

                <aside class="col-md-3">
                    <div class="widget search">
                        <form role="form">
                                <input type="text" class="form-control search_box" autocomplete="off" placeholder="Search Here">
                        </form>
                    </div><!--/.search-->
                    <div class="widget categories">
                        <h3>Categories</h3>
                        <div class="row">
                            <div class="col-sm-6">
                                <ul class="blog_category">
                                	<?php
		                            foreach ($all_category as $v_category) {
		                                ?>
		                                <li><a href="<?php echo base_url(); ?>welcome/category_blog/<?php echo $v_category->category_id; ?>"><?php echo $v_category->category_name; ?></a></li>
		                                <?php
		                            }
		                            ?>
                                  </ul>
                                
                            </div>
                        </div>                     
                    </div><!--/.categories-->
                    <div class="login" style="border: 1px solid #0ff; border-radius: 15px; padding: 5px; ">
                        
                        
                        <?php if ($blogger_id != NULL) { ?>
                        <h2><center> <a href="<?php echo base_url(); ?>viewer_manager/log_out.html"><i class="fa fa-user"></i> Logout</a></center></h2>
				 <?php } else { ?>
				<h2><center>Login</center></h2>
			<?php } ?>
                        <form class="contact-form" method="post"  action="<?php echo base_url(); ?>viewer_login/check_login">
                          
                                
                                <div class="form-group">
                                    <label>Email *</label>
                                    <input type="email" name="blogger_email_address" class="form-control" required="required">
                                </div>
                                <div class="form-group">
                                    <label>Password *</label>
                                    <input type="password" name="blogger_password" class="form-control" required="required">
                                </div>
                                <div class="form-group">
                                    <button type="submit" name="submit" class="btn btn-primary btn-lg">Submit</button>
                                </div>
                            
                        </form> 
                        <h3><center>Click hear to <a href="<?php echo base_url(); ?>welcome/register.html">Register</a></center></h3>
                    </div>	
    		
                </aside>  
            </div><!--/.row-->
        </div>
    </section><!--/#blog-->
