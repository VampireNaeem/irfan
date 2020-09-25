<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $this->settings->company_name; ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.0/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('assets/images/favicon.ico') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/AdminLTE.min.css'); ?>">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/square/blue.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/datepicker3.css'); ?>">
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div style="text-align:center">
            <span class="logo-lg">
                <img style="margin-bottom:20px;" src="<?php echo base_url("/assets/images/logo.png"); ?>" border="0" width="30%" alt="logo" class="logo-default" />
            </span>
        </div>
        <div class="login-box-body">
            <h3 class="login-box-msg">Register Here</h3>
            <?php echo form_open(current_url(), array('name' => 'login', 'id' => 'login')) ?>
            <?php include(APPPATH . 'views/includes/_messages.php') ?>
            <div class="form-group has-feedback">
                <input type="text" name="remitterId" id="remitterId" class="form-control" placeholder="Remitter ID">
            </div>
            <div class="form-group has-feedback">
                <input type="text" name="remitterDateIssue" id="remitterDateIssue" class="form-control" placeholder="Remitter’s I.D Number date of issue">
            </div>
            <div class="form-group has-feedback">
                <input type="text" name="remitterDateExpiry" id="remitterDateExpiry" class="form-control" placeholder="Remitter’s I.D Number date of expiry">
            </div>
            <div class="form-group has-feedback">
                <input type="text" name="remitterNationality" id="remitterNationality" class="form-control" placeholder="Remitter’s Nationality">
            </div>
            <div class="form-group has-feedback date">
                <input type="text" name="remitterDob" id="remitterDob" class="form-control datepicker" placeholder="Remitter’s D.O.B">
            </div>
            <div class="form-group has-feedback">
                <input type="text" name="remitterName" id="remitterName" class="form-control" placeholder="Remitter Name">
            </div>
            <div class="form-group has-feedback">
                <input type="text" name="remitterAddress" id="remitterAddress" class="form-control" placeholder="Remitter Address">
            </div>
            <div class="form-group has-feedback">
                <input type="text" name="remitterCity" id="remitterCity" class="form-control" placeholder="Remitter City">
            </div>
            <div class="form-group has-feedback">
                <input type="text" name="remitterCountry" id="remitterCountry" class="form-control" placeholder="Remitter Country">
            </div>
            <div class="form-group has-feedback">
                <input type="text" name="remitterPhone" id="remitterPhone" class="form-control" placeholder="Remitter Phone/ Cell No">
            </div>
            <div class="form-group has-feedback">
                <input type="text" name="transactionCurrencyCode" id="transactionCurrencyCode" class="form-control" placeholder="Transaction Currency Code">
            </div>
            <div class="form-group has-feedback">
                <input type="text" name="transactionAmount" id="transactionAmount" class="form-control" placeholder="Transaction Amount">
            </div>
            <div class="form-group has-feedback">
                <input type="text" name="transactionAmountPkr" id="transactionAmountPkr" class="form-control" placeholder="Transaction Amount PKR">
            </div>
            <div class="form-group has-feedback">
                <select class="form-control" id="deliveryMode" name="deliveryMode" value="<?php echo set_value('deliveryMode'); ?>">
                    <option value="">-Select Delivery Mode-</option>
                    <?php foreach ($deliverymode as $del) { ?>
                        <option value="<?php echo $del->mode_id ?>"> <?php echo $del->mode_name ?> </option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group has-feedback date">
                <input type="text"  name="transactionDate" id="transactionDate" class="form-control datepicker" placeholder="Transaction Date">
            </div>
            <div class="form-group has-feedback date">
                <input type="text"  name="valueDate" id="valueDate" class="form-control datepicker" placeholder="Value Date">
            </div>
            <div class="form-group has-feedback">
                <input type="text" name="beneficiaryName" id="beneficiaryName" class="form-control" placeholder="Beneficiary Name">
            </div>
            <div class="form-group has-feedback">
                <select class="form-control" id="deliveryMode" name="deliveryMode" value="<?php echo set_value('deliveryMode'); ?>">
                    <option value="">-Beneficiary ID Type-</option>
                    <?php foreach ($beneficiaryType as $bene) { ?>
                        <option value="<?php echo $bene->benType_id ?>"> <?php echo $bene->benType_name ?> </option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group has-feedback">
                <input type="text" name="beneficiaryBank" id="beneficiaryBank" class="form-control" placeholder="Beneficiary Bank">
            </div>
            <div class="form-group has-feedback">
                <input type="text" name="beneficiaryBranchName" id="beneficiaryBranchName" class="form-control" placeholder="Beneficiary Branch Name">
            </div>
            <div class="form-group has-feedback">
                <input type="text" name="beneficiaryAccountNumber" id="beneficiaryAccountNumber" class="form-control" placeholder="Beneficiary Account Number">
            </div>
            <div class="form-group has-feedback">
                <input type="text" name="beneficiaryAddress" id="beneficiaryAddress" class="form-control" placeholder="Beneficiary Address">
            </div>
            <div class="form-group has-feedback">
                <input type="text" name="beneficiaryCity" id="beneficiaryCity" class="form-control" placeholder="Beneficiary City">
            </div>
            <div class="form-group has-feedback">
                <input type="text" name="beneficiaryCountry" id="beneficiaryCountry" class="form-control" placeholder="Beneficiary Country">
            </div>
            <div class="form-group has-feedback">
                <input type="text" name="beneficiaryPhone" id="beneficiaryPhone" class="form-control" placeholder="Beneficiary Phone/ Cell No">
            </div>
            <div class="form-group has-feedback">
                <input type="text" name="purposeTransaction" id="purposeTransaction" class="form-control" placeholder="Purpose of Transaction">
            </div>
            <div class="form-group has-feedback">
                <input type="text" name="sourceOfIncome" id="sourceOfIncome" class="form-control" placeholder="Source Of Income">
            </div>
            <div class="form-group has-feedback">
                <input type="text" name="transactionOriginatorName" id="transactionOriginatorName" class="form-control" placeholder="Transaction Originator Name">
            </div>
            <div class="form-group has-feedback">
                <input type="text" name="iban" id="iban" class="form-control" placeholder="IBAN">
            </div>
            <div class="row">
                <div class="clearfix"></div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" id="btn_submit" class="btn btn-primary btn-block btn-flat">Submit</button>
                </div>
                <!-- /.col -->
            </div>
            <?php echo form_close(); ?>
        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->
    <!-- jQuery 3 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Bootstrap 3.3.7 -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/additional-methods.min.js"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url('assets/js/bootstrap-datepicker.js'); ?>"></script>

    <script>
        // $(function () {
        //     $('input').iCheck({
        //         checkboxClass: 'icheckbox_square-blue',
        //         radioClass: 'iradio_square-blue',
        //         increaseArea: '20%' /* optional */
        //     });
        // });
    </script>

    <script>
        //Date picker
        $('.datepicker').datepicker({
            autoclose: true
        });

        jQuery.validator.addMethod("emailCustom", function(value, element, params) {
            var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(value);
        }, "Please enter a valid email address.");

        var FormValidation = function() {

            // basic validation
            var handleValidation1 = function() {

                // for more info visit the official plugin documentation:
                // http://docs.jquery.com/Plugins/Validation
                var form1 = $('#login');
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
                        remitterId: {
                            required: true,
                            maxlength: 60
                        },
                        remitterName: {
                            required: true,
                            maxlength: 120
                        },
                        remitterAddress: {
                            required: true,
                            maxlength: 120
                        },
                        remitterCity: {
                            required: true,
                            maxlength: 60
                        },
                        remitterCountry: {
                            required: true,
                            maxlength: 60
                        },
                        remitterPhone: {
                            required: true,
                            maxlength: 15
                        },
                        transactionCurrencyCode: {
                            required: true,
                            maxlength: 3
                        },
                        transactionAmount: {
                            required: true,
                            maxlength: 15
                        },
                        transactionAmountPkr: {
                            required: true,
                            maxlength: 15
                        },
                        deliveryMode: {
                            required: true
                        },
                        transactionDate: {
                            required: true
                        },
                        valueDate: {
                            required: true
                        },
                        beneficiaryName: {
                            required: true,
                            maxlength: 120
                        },
                        beneficiaryAddress: {
                            required: true,
                            maxlength: 120
                        },
                        beneficiaryCity: {
                            required: true,
                            maxlength: 60
                        },
                        beneficiaryCountry: {
                            required: true,
                            maxlength: 60
                        },
                        purposeTransaction: {
                            required: true,
                            maxlength: 60
                        },
                        sourceOfIncome: {
                            required: true,
                            maxlength: 60
                        },
                        transactionOriginatorName: {
                            required: true,
                            maxlength: 60
                        }
                    },
                    invalidHandler: function(event, validator) { //display error alert on form submit
                        success1.hide();
                        error1.show();
                        //  App.scrollTo(error1, -200);
                    },
                    highlight: function(element) { // hightlight error inputs
                        $(element)
                            .closest('.form-group').addClass('has-error'); // set error class to the control group
                    },

                    unhighlight: function(element) { // revert the change done by hightlight
                        $(element)
                            .closest('.form-group').removeClass('has-error'); // set error class to the control group
                    },

                    success: function(label) {
                        label
                            .closest('.form-group').removeClass('has-error'); // set success class to the control group
                    },

                    submitHandler: function(form) {
                        $("#btn_submit").prop('disabled', true);
                        form.submit();
                    }
                });



                return {

                    //main function to initiate the module
                    init: function() {

                        handleValidation1();

                    }

                };


            }();
        }();
        $(".alert").fadeTo(6000, 6000).slideUp(800, function() {
            $(".alert").alert('close');
        });
    </script>
</body>

</html>