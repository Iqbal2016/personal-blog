<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">New Site Server</h1>
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
                                            
                                             <form action="<?php echo base_url(); ?>super_admin/save_category" method="post">                                                                                                    

						<div class="col-lg-6">

							<div class="form-group">
								<label>Category Name</label>
                                                                <input type="hidden" name="category_id" value="<?php echo $category_info->category_id; ?>">
                                                                <input id="category_name" class="form-control" placeholder="Category Name" name="category_name" value="<?php echo $category_info->category_name; ?>" required="required">
							</div>
                                                    <div class="form-group">
                                                          <label>Publication Status</label>  <br>                               

                                                          <?php
                                                              if ($category_info->publication_status == 1) {
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
						<div class="col-lg-6">
                                                    
                                                        <div class="form-group">
                                                            <label>Category Description</label>
                                                            <textarea class="form-control" rows="3" id="category_description" name="category_description"><?php echo $category_info->category_description; ?></textarea>
                                                        </div>
							
							

						</div>
						<div class="col-lg-6">
                                                    <button type="submit" class="btn btn-primary">Submit Button</button>
						
						
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
    