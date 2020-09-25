<?php
$succes_message = $this->session->flashdata('success_msg');
$error_message = $this->session->flashdata('error_msg');


if(!empty($error_msg)){
	$error_message = $error_msg;	
}
if(!empty($success_msg)){
	$succes_message = $success_msg;
}

if(!empty($error_message)){?>
	<div id="custom_alert" class="alert alert-danger alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
      <?php echo $error_message ?>
    </div>
<?php
}elseif(!empty($succes_message)){?>
	
	<div id="custom_alert" class="alert alert-success alert-dismissible" role="alert">
  		<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
  		<?php echo $succes_message ?>
	</div>
<?php
}?>