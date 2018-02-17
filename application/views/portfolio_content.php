
    <section id="portfolio">
        <div class="container">
            <div class="center">
               <h2>Portfolio</h2>
               <p class="lead">
                   The following are some projects I have had over the years in roughly reverse chronological order. The list is by no means exhaustive, and dates back about 1 year. So fair warning, this way be DRAGONS! Some of the sites have disappeared, transformed, or by today's standards may look like cute and/or embarassing fossils.
                   
               </p>
            </div>
            
            <div class="row">
                <div class="portfolio-items">
                	
			                    <div class="portfolio-item apps">
			                    	<?php
			                            foreach ($all_portfolio as $v_portfolio) {
			                          ?>
			                          
			                        <div class="recent-work-wrap col-xs-12 col-sm-4" style="margin-bottom: 20px;">
			                            <img class="img-responsive" src="<?php echo $v_portfolio->portfolio_images; ?>" alt="image">
			                            <div class="overlay">
			                                <div class="recent-work-inner">
			                                    <h3><a href="#"><?php echo $v_portfolio->portfolio_title; ?></a></h3>
			                                    <p><?php echo $v_portfolio->portfolio_description; ?></p>
			                                    <a class="preview" href="<?php echo $v_portfolio->portfolio_images; ?>" rel="prettyPhoto"><i class="fa fa-eye"></i> View</a>
			                                </div> 
			                            </div>
			                        </div>
			                      <?php } ?>   
			                    </div>
                    
                </div>
            </div>
        </div>
    </section><!--/#portfolio-item-->
  