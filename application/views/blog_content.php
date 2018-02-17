<?php
    $blogger_id = $this->session->userdata('blogger_id');
    $blogger_name = $this->session->userdata('blogger_name');
?>
<section id="blog" class="container">
       
        <div class="blog">
            <div class="row">
                 <div class="col-md-9">
                 
                		 <?php
						foreach ($all_blog as $v_blog)
						{
						    ?>
                 
                    <div class="blog-item">
                        <div class="row">
                            
                            <div class="col-xs-12 col-sm-12 blog-content">
                            	<h2><a href="blog-item.html"><?php echo $v_blog->blog_title; ?></a></h2>
<!--                                <img src="<?php echo $v_blog->blog_images; ?>" alt="image"/>                            -->
                                <h3><?php echo $v_blog->blog_short_description; ?></h3>
                                <a class="btn btn-primary readmore" href="<?php echo base_url();?>welcome/blog_details/<?php echo $v_blog->blog_id;?>">Read More <i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>    
                    </div><!--/.blog-item-->
                    
                    <?php } ?>
                    
                    	
                        
                  
                        
                    <ul class="pagination pagination-lg">
                        <li><a href="#"><i class="fa fa-long-arrow-left"></i>Previous Page</a></li>
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">Next Page<i class="fa fa-long-arrow-right"></i></a></li>
                    </ul><!--/.pagination-->
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
                            <div class="col-sm-12">
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
