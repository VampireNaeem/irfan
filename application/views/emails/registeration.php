<body style="font-family:Arial, Cambria, 'open-sans', 'Liberation Serif', Times, 'Times New Roman', serif">
<div class="container" style="width:620px; margin:0 auto;">
<div style="border-bottom:solid 1px #ddd; overflow:hidden; margin-bottom:50px; padding: 5px 0;">
  
</div>
    <div style="border-bottom:solid 1px #ddd; overflow:hidden; margin-bottom:50px; padding: 5px 0;">
        <div style="float:left;"><a href="<?php echo base_url("/");?>"><img src="<?php echo base_url('/assets/images/logo.png');?>"></a></div>
    </div>
<body style="width:600px;">
<h4>Dear <span style="text-transform: capitalize;"><?php echo $remitterName; ?></span>  , </h4>
<p style="font-size:15px; padding:5px 0;">
 Your account information has been submitted to our registration system. You will receive your email at your provided email <b><?php echo $email ?></b> shortly with instructions containing the next steps in activating your account. You can access your account once it is activated.
    <!-- <br>
    Following are your  registration credentials: -->
</p>
 <p style="font-size:15px; margin:0 0 6px 0;"> Name:  <?php echo $remitterName?></p>
<p style="font-size:15px; margin:0 0 6px 0;"> Password:  <?php echo $this->encryption->decrypt($password) ?></p>
<p style="font-size:15px; margin:0 0 6px 0;"> Email:  <?php echo $email ?></p>
<br> 
<p style=" font-size:15px; padding:5px 0;">For any further query, please contact at <a href="mailto:<?php echo $this->settings->company_email; ?>"><?php echo $this->settings->company_email; ?></a></p>
<div style="background:#575a5d; padding:10px; width:100%; text-align:left; color:#FFF; font-size:12px;">
    © All Rights Reserved | <?php echo date("Y"); ?>

</div>
</div>
</body>
</html>













 
