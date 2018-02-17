<div class="row">
    <!--  page header -->
    <div class="col-lg-12">
        <h1 class="page-header">Admin Manager</h1>
    </div>
    <!-- end  page header -->
</div>
<div class="row">
    <div class="col-lg-12">
        <!-- Advanced Tables -->
        <div class="panel panel-default">
            <div class="panel-heading">
                View Admin
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr> 
                                <th>Admin Name</th> 
                                <th>E-mail</th> 
                                <th>city</th> 
                                <th>Country</th> 
                            </tr> 
                        </thead>
                        <tbody>
                             <?php
                            foreach ($all_admin as $v_admin) {
                                ?>
                                <tr> 
                                    
                                    <td><?php echo $v_admin->first_name; ?> <?php echo $v_admin->last_name; ?></td>
                                    <td><?php echo $v_admin->admin_email_address; ?></td>
                                    <td><?php echo $v_admin->city; ?></td>
                                    <td><?php echo $v_admin->country; ?></td>                                                                      
                                </tr> 
                            <?php } ?>

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
        <!--End Advanced Tables -->
    </div>
</div>

