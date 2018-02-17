<link href="http://cdn.datatables.net/1.10.9/css/jquery.dataTables.min.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="http://cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function(){
        $('.hide').hide();
           $('.myTable').DataTable();
        });
    function deleteDomain(id)
    {
        if (confirm("Are you sure!") == true) {
        var id = id;
        $('#hide'+id).show();
        $.ajax({
            url:"<?php echo site_url('Test/deleteDomain');?>/"+id,
            success:function(data)
            {
           
            $('#domain'+id).hide();
               
            }
               
            });
        }
    }
    function editDomain(id)
    {
        var id = id;
        $('#hide'+id).show();
        $.ajax({
            url:"<?php echo site_url('Test/editDomain');?>/"+id,
            success:function(data)
            {          
            $('#domain'+id).html(data);
            $('.hide').hide(); 
            }      
            });
    }
    function updateDomain(id)
    {
        var id = id;
        alert(id);
         var data = $("#myForm"+id).serialize();
        //alert(data);
        $.ajax({
                    type:"POST",
                    url:"<?php echo site_url('Test/updateDomain');?>/"+id,
                    data:data,
                    success:function(data)
                    {
                        console.log(data);
                        if(data == "false"){
                        alert("domain name already in use");
                        }else{
                        //alert(data);
                        $('.updatedData'+id).html(data);
                            }
                    }
                });
    }
    function cancel()
    {
        alert("hello");
        Location.reload();
    }
</script>              
            <table border="0" width="100%" cellpadding="0" cellspacing="0"  class="myTable">
            <thead>
                <tr>               
                    <th >Full Name  </th>
                    <th >Contact No.</th>
                    <th >Email</th>
                    <th >Amount</th>                   
                    <th >Options</th>
                </tr>
</thead>
<tbody>
            <?php
                //echo "<pre>";
                //print_r($result);
            foreach($result as $row)
            {
            ?> 
                    <tr id="domain<?php echo $row->id;?>">
                    <td><?php echo $row->user_name;?></td>
                    <td><?php echo $row->contact_no;?></td>
                    <td><?php echo $row->email;?></td>
                    <td><?php echo $row->price;?></td>
                    <td class="options-width">
                   
                    <a href="javascript:void(0)" title="Edit" onclick="editDomain(<?php echo $row->id;?>)" class="icon-1 info-tooltip">Edit</a>
                    <a href="javascript:void(0)" onclick="deleteDomain(<?php echo $row->id;?>)"  title="Delete" class="icon-2 info-tooltip">Delete</a>
                <a href="javascript:void(0)" class="hide" id="hide<?php echo $row->id;?>">Please wait...</a>
                   
                    </td>
               
                </tr>
               
            <?php
            }
            ?>
        </tbody>
    </table>