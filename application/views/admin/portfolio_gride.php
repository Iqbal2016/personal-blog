<div class="row">
    <!--  page header -->
    <div class="col-lg-12">
        <h1 class="page-header">Portfolio Manager</h1>
    </div>
    <!-- end  page header -->
</div>
<div class="row">
    <div class="col-lg-12">
        <!-- Advanced Tables -->
        <div class="panel panel-default">
            <div class="panel-heading">
                View Portfolio
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr> 
                                <th>Portfolio Title</th> 
                                <th>Portfolio Image</th>
                                <th>Publication Status</th>
                                <th>Portfolio Category</th>  
                                <th>Actions</th> 
                            </tr> 
                        </thead>
                        <tbody>
                            <?php
                            foreach ($all_portfolio as $v_portfolio) {
                                ?>
                                <tr> 
                                    <td><?php echo $v_portfolio->portfolio_title; ?></td> 
                                    <td><img src="<?php echo $v_portfolio->portfolio_images; ?>" alt="image" width="30" height="30" /></td>

                                    <td>
                                        <?php
                                        if ($v_portfolio->portfolio_status == 1) {
                                            echo 'Published';
                                        } else {
                                            echo 'Unpublished';
                                        }
                                        ?>
                                    </td>
                                    <td><?php echo $v_portfolio->portfolio_category; ?></td>  
                                    <td>
                                        <a href="<?php echo base_url(); ?>super_admin/update_portfolio/<?php echo $v_portfolio->portfolio_id ?>"><input type="image" src="<?php echo base_url() ?>images/icn_edit.png" title="Edit"></a>
                                        <a href="<?php echo base_url(); ?>super_admin/delete_portfolio/<?php echo $v_portfolio->portfolio_id ?>" onclick="return checkdelete();"><input type="image" src="<?php echo base_url() ?>images/icn_trash.png" title="Delete"></a>
                                        <?php
                                        if ($v_portfolio->portfolio_status == 1) {
                                            ?>
                                            <a href="<?php echo base_url(); ?>super_admin/unpublished_portfolio/<?php echo $v_portfolio->portfolio_id; ?>">Unpublished</a>

                                            <?php
                                        } else {
                                            ?>

                                            <a href="<?php echo base_url(); ?>super_admin/published_portfolio/<?php echo $v_portfolio->portfolio_id; ?>">Published</a>
                                            <?php
                                        }
                                        ?>
                                    </td> 
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

