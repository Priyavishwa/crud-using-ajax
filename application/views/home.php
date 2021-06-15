<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud in AJAX</title>
</head>
<body>
   <?php 
    if ($this->session->flashdata('error')){
        echo $this->session->flashdata('error'); 
    }
    ?>

    <?php echo form_input('name','',array('class'=>'name','placeholder'=>'Enter your Name'));?>
    <?php echo form_input('email','',array('class'=>'email','placeholder'=>'Enter your Email'));?>
    <?php echo form_input('password','',array('class'=>'password','placeholder'=>'Enter your Password'));?>
    <?php echo form_submit('Submit','Submit','class="mysubmit"');?>
    
    <div class="feedback">
    </div>
    <br>
    <div class="dyncondiv">
    </div>
    <br>
    <div>
        <table border="1" class="mytable">
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Date</th>
            <th>Edit</th>
            <?php if($allRecords): ?>
                <?php 
                    // result() will bring result in object format
                    foreach($allRecords->result() as $std): ?>
                    <tr>
                    <td><?php echo $std->sId; ?> </td>
                    <td><?php echo $std->sName; ?> </td>
                    <td><?php echo $std->sEmail; ?> </td>
                    <td><?php echo $std->sDate; ?> </td>

                    <!-- We are not sending anchor to anywhere -->
                    <td><a href="javascript:void(0)" 
                    data-text="<?php
                    //we are using encryption library
                    echo $this->encryption->encrypt($std->sId) 
                    ?>" 
                    data-id="<?php echo $std->sId ?>" class="edit">Edit
                    </a>
                    </td>

                    </tr>

                    <?php endforeach; ?> 

            <?php else: ?>
                data not exist
            <?php endif; ?>

        </table>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js" 
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" 
    crossorigin="anonymous">
    </script>
        
    <script>
        var surl = "<?php echo site_url();?>";
    </script>

    <script src="<?php echo base_url('assets/js/custom.js');?>">
        
    </script>    


</body>
</html>


