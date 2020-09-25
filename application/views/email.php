<body style="font-family:Arial, Cambria, 'open-sans', 'Liberation Serif', Times, 'Times New Roman', serif">
<div class="container" style="width:620px; margin:0 auto;">
    <div style="border-bottom:solid 1px #ddd; overflow:hidden; margin-bottom:50px; padding: 5px 0;">
        <div style="float:left;"><a href="<?php echo base_url("/");?>"><img src="<?php echo base_url('/assets/frontend/images/pesh-logo.png');?>"></a></div>
    </div>
    <body style="width:600px;">
    <p style="margin:6px 0 6px 0; font-size:26px;">Sir</p>
    <p style="margin:0 0 6px 0;"></p>
    <p style="margin:0 0 6px 0;"><b>Name : </b> <?php echo $name?></p>
    <p style="margin:0 0 6px 0;"><b> Email : </b><?php echo $email; ?></p>
    <p style="margin:0 0 6px 0;"><b> Message: </b><?php echo $message; ?></p>
    <div style="background:#000; padding:10px; width:100%; text-align:center; color:#FFF; font-size:12px;">
        Copyright &copy; <?php echo date("Y"); ?>  Peshawar Museum. All Rights Reserved. Privacy Policy
    </div>
</div>
</body>
</html>