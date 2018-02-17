<link href="http://cdn.datatables.net/1.10.9/css/jquery.dataTables.min.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="http://cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js"></script>

<div class="row">
    <!--  page header -->
    <div class="col-lg-12">
        <h1 class="page-header">Blog Manager</h1>
    </div>
    <!-- end  page header -->
</div>
<div class="row">
    <div class="col-lg-12">
        <!-- Advanced Tables -->
        <div class="panel panel-default">
            <div class="panel-heading">
                View Blog
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr> 
                                <th>Blog ID</th> 
                                <th>Blog Title</th> 
                                <th>Publication Status</th> 
                                <th>Actions</th> 
                            </tr> 
                        </thead>
                        <tbody>
                            <?php
                            foreach ($all_blog as $v_blog) {
                                ?>
                                <tr> 
                                    <td><?php echo $v_blog->blog_id; ?></td> 
                                    <td><?php echo $v_blog->blog_title; ?></td> 
                                    <td>
                                        <?php
                                        if ($v_blog->publication_status == 1) {
                                            echo 'Published';
                                        } else {
                                            echo 'Unpublished';
                                        }
                                        ?>
                                    </td> 
                                    <td>
                                        <a href="<?php echo base_url(); ?>super_admin/edit_blog/<?php echo $v_blog->blog_id ?>"><input type="image" src="<?php echo base_url() ?>images/icn_edit.png" title="Edit"></a>
                                        <a href="<?php echo base_url(); ?>super_admin/delete_blog/<?php echo $v_blog->blog_id ?>" onclick="return checkdelete();"><input type="image" src="<?php echo base_url() ?>images/icn_trash.png" title="Delete"></a>
                                        <?php
                                        if ($v_blog->publication_status == 1) {
                                            ?>
                                            <a href="<?php echo base_url(); ?>super_admin/unpublished_blog/<?php echo $v_blog->blog_id; ?>">Unpublished</a>

                                            <?php
                                        } else {
                                            ?>

                                            <a href="<?php echo base_url(); ?>super_admin/published_blog/<?php echo $v_blog->blog_id; ?>">Published</a>
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
<script>
    $(document).ready(function() {
        $('#dataTables-example').dataTable();
    });
</script>
