<?php $this->load->view('includes/header.php'); ?>
<?php $this->load->view('includes/header_files.php'); ?>
<?php $this->load->view('includes/sidebar.php'); ?>
<div class="content-wrapper">

    <section class="content-header">
        <h1>
            Change Password
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('admin/dashboard'); ?>"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            <li class="active">Change Password</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <!-- Horizontal Form -->
                <div class="box box-info">
                    <div class="box-header with-border">
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <?php echo form_open_multipart(current_url(),array('name'=>'change_pass','id'=>'change_pass','class'=>'form-horizontal','method'=>'post'));?>
                    <?php if( $error = $this->session->flashdata('invalid_user')): ?>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="alert alert-dismissible alert-danger">
                                    <?php echo $error; ?>
                                </div>
                            </div>
                        </div>
                    <?php endif;
                    ?>
                    <?php include(APPPATH.'views/includes/_messages.php') ?>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="old_password" class="col-sm-2 control-label">Old Password</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" name="old_password" id="old_password" placeholder="Old Password" value="<?php echo set_value('old_password'); ?>" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="new_password" class="col-sm-2 control-label">New Password</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" name="new_password" id="new_password" placeholder="New Password" value="<?php echo set_value('new_password'); ?>" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="confirm_password" class="col-sm-2 control-label">Confirm Password</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Confirm Password" value="<?php echo set_value('confirm_password'); ?>" >
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <!-- /.box-body -->
                    <div class="clearfix"></div>
                    <div class="box-footer">
                        <div class="row ">
                            <div class="col-sm-1 pull-right">
                                <button class="btn btn-primary pull-right bg marging-right" id="btn_submit" type="submit" style="min-width: 70px">Submit</button>
                            </div>
                        </div>
                        <!-- /.box-footer -->
                    </div>
                </div>
                <!-- /.box -->
                <?php echo form_close(); ?>
            </div>
            <!--/.col (right) -->
        </div>
        <!-- /.row -->
    </section>

</div>

<?php $this->load->view('includes/footer.php'); ?>
<?php $this->load->view('includes/footer_files.php'); ?>
<script>
    jQuery.validator.addMethod("emailCustom", function (value, element, params) {
        var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(value);
    }, "Please enter a valid email address.");
    $.validator.addMethod('customphone', function (value, element) {
        return this.optional(element) || /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{3,9}$/.test(value);
    }, "Please enter a valid phone number");

    var FormValidation = function () {

        // basic validation
        var handleValidation1 = function() {

            // for more info visit the official plugin documentation:
            // http://docs.jquery.com/Plugins/Validation
            var form1 = $('#change_pass');
            var error1 = $('.alert-danger', form1);
            var success1 = $('.alert-success', form1);

            form1.validate({

                errorElement: 'span', //default input error message container
                errorClass: 'help-block help-block-error', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                //ignore: "",  // validate all fields including form hidden input
                ignore: [],
                messages: {
                    select_multi: {
                        maxlength: jQuery.validator.format("Max {0} items allowed for selection"),
                        minlength: jQuery.validator.format("At least {0} items must be selected")
                    }
                },

                rules: {
                    old_password:{
                        required:true
                    },
                    new_password:{
                        required:true
                    },
                    confirm_password:{
                        required:true,
                        equalTo: "#new_password"
                    }


                },
                invalidHandler: function (event, validator) { //display error alert on form submit
                    success1.hide();
                    error1.show();
                    //  App.scrollTo(error1, -200);
                },
                highlight: function (element) { // hightlight error inputs
                    $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
                },

                unhighlight: function (element) { // revert the change done by hightlight
                    $(element)
                        .closest('.form-group').removeClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    label
                        .closest('.form-group').removeClass('has-error'); // set success class to the control group
                },

                submitHandler: function (form) {
                    $("#btn_submit").prop('disabled', true);
                    form.submit();
                }
            });



            return {

                //main function to initiate the module
                init: function () {

                    handleValidation1();

                }

            };


        }();
    }();
    $(".alert").fadeTo(6000, 6000).slideUp(800, function(){
        $(".alert").alert('close');
    });
</script>
<!--<script>-->
<!--    $('#change_pass').validate(-->
<!--        {-->
<!--            rules:{-->
<!--                old_password:{-->
<!--                    required:true-->
<!--                },-->
<!--                new_password:{-->
<!--                    required:true-->
<!--                },-->
<!--                confirm_password:{-->
<!--                    required:true,-->
<!--                    equalTo: "#new_password"-->
<!--                }-->
<!--            }-->
<!--        });-->
<!--    $(".alert").fadeTo(6000, 6000).slideUp(800, function(){-->
<!--        $(".alert").alert('close');-->
<!--    });-->
