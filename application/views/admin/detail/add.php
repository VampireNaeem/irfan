<?php $this->load->view('includes/header_files.php'); ?>
<?php $this->load->view('includes/header.php'); ?>
<?php $this->load->view('includes/sidebar.php'); ?>
<link rel="stylesheet" href="<?php echo base_url('assets/frontend/css/bootstrap3-wysihtml5.min.css') ?>">
<div class="content-wrapper">

    <section class="content-header">
        <h1>
            Add Item
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('admin/dashboard') ?>"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            <li><a href="<?php echo base_url('detail/index') ?>"><i class="fa fa-dashboard"></i>Details</a></li>
            <li class="active">Add Item</li>
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
                    <?php echo form_open_multipart(current_url(), array('name' => 'add_item', 'id' => 'add_item', 'class' => 'form-horizontal', 'method' => 'post')); ?>
                    <?php if ($error = $this->session->flashdata('invalid_user')): ?>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="alert alert-dismissible alert-danger">
                                    <?php echo $error; ?>
                                </div>
                            </div>
                        </div>
                    <?php endif;
                    ?><?php include(APPPATH . 'views/includes/_messages.php') ?>
                    <div class="col-md-12">
                        <div class="clearfix"></div>
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-6">

                                <label class="form-label">Accession Number</label>
                                <span class="help">e.g. "PM_12345"</span>
                                <div class="controls">
                                    <input type="text" id="Accession_Number" name="Accession_Number"
                                           class="form-control">
                                </div>

                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-4">

                                <label class="form-label">Dimensions</label>
                                <span class="help">e.g. "Width * Length"</span>
                                <div class="controls">
                                    <input type="text" id="Dimensions" name="Dimensions" class="form-control">
                                </div>

                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6">

                                <label class="form-label">Provenance</label>
                                <span class="help">e.g. "Excavation Location"</span>
                                <div class="controls">
                                    <input type="text" id="Provenance" name="Provenance" class="form-control">
                                </div>

                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-4">

                                <label class="form-label">Location</label>
                                <span class="help">e.g. "Main Hall"</span>
                                <div class="controls">
                                    <input type="text" id="Location" name="Location" class="form-control">
                                </div>

                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6">

                                <label class="form-label">Group</label>
                                <span class="help">e.g. "Material / Period wise"</span>
                                <div class="controls">
                                    <select class="form-control" id="Group_Classification" name="Group_Classification" value="<?php echo set_value('Group_Classification'); ?>">
                                        <option value="">-Select Program Type-</option>
                                        <option  <?php if($this->session->userdata('type') == 'Gandharan')  { echo 'selected="selected"';}?>  value="Gandharan"> Gandharan</option>
                                        <option  <?php if($this->session->userdata('type') == 'Coins')  { echo 'selected="selected"';}?>  value="Coins"> Coins</option>
                                        <option  <?php if($this->session->userdata('type') == 'Islamic')  { echo 'selected="selected"';}?>  value="Islamic"> Islamic</option>
                                        <option  <?php if($this->session->userdata('type') == 'Ethnological')  { echo 'selected="selected"';}?>  value="Ethnological"> Ethnological</option>
                                    </select>

                                </div>

                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-4">

                                <label class="form-label">Period</label>
                                <span class="help">e.g. "1st Century AD / BC"</span>
                                <div class="controls">
                                    <input type="text" id="Obj_Date" name="Obj_Date"
                                           class="form-control">
                                </div>

                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6">

                                <label class="form-label"> Receipt Date</label>
                                <span class="help">e.g. "0000-00-00"</span>
                                <div class="controls">
                                    <input type="text" id="Date_Receipt" name="Date_Receipt" class="form-control">
                                </div>

                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-4">

                                <label class="form-label">Condition</label>
                                <span class="help">e.g. "Artifact Status"</span>
                                <div class="controls">
                                    <input type="text" id="Condition" name="Condition" class="form-control">
                                </div>

                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6">

                                <label class="form-label">Description</label>
                                <span class="help">e.g. "Detail"</span>
                                <div class="controls">
                                    <input type="text" id="Description" name="Description" class="form-control">
                                </div>

                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-4">

                                <label class="form-label">Material</label>
                                <span class="help">e.g. "Material used in creation"</span>
                                <div class="controls">
                                    <input type="text" id="Material" name="Material" class="form-control">
                                </div>

                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6">

                                <label class="form-label">image</label>
                                <span class="help">e.g. "image"</span>
                                <div class="controls">
                                    <input type="file" id="exampleInputFile1" name="image" value="<?php echo set_value('image'); ?>">
                                </div>

                            </div>
                        </div>
                        <div class="row" style="display:none" id="myshowhide">
                            <div class="col-md-4 col-sm-4 col-xs-4">

                                <label class="form-label">Old Accession Number</label>
                                <span class="help">e.g. "PM_12345"</span>
                                <div class="controls">
                                    <input type="text" id="Old_Acc_No" name="Old_Acc_No" class="form-control">
                                </div>

                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-4">

                                <label class="form-label">Measurement/Unit</label>
                                <span class="help">e.g. "cm"</span>
                                <div class="controls">
                                    <input type="text" id="Meas_Unit" name="Meas_Unit" class="form-control">
                                </div>

                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-4">

                                <label class="form-label">Check Date</label>
                                <span class="help">e.g. "0000-00-00"</span>
                                <div class="controls">
                                    <input type="text" id="Check_Date" name="Check_Date" class="form-control">
                                </div>

                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-4">

                                <label class="form-label">Format Name</label>
                                <span class="help">e.g. "group name"</span>
                                <div class="controls">
                                    <input type="text" id="Format_Name" name="Format_Name" class="form-control">
                                </div>

                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-4">

                                <label class="form-label">Loan No</label>
                                <span class="help">e.g. "12345"</span>
                                <div class="controls">
                                    <input type="text" id="Loan_No" name="Loan_No" class="form-control">
                                </div>

                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-4">

                                <label class="form-label">Reg. No</label>
                                <span class="help">e.g. "12345"</span>
                                <div class="controls">
                                    <input type="text" id="Reg_No" name="Reg_No" class="form-control">
                                </div>

                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-4">

                                <label class="form-label">Book Reference Number</label>
                                <span class="help">e.g. "12345"</span>
                                <div class="controls">
                                    <input type="text" id="Book_Ref" name="Book_Ref" class="form-control">
                                </div>

                            </div>
                        </div>

                        <div class="clearfix"></div>
                    </div>
                    <!-- /.box-body -->
                    <div class="clearfix"></div>
                    <div class="box-footer">
                        <div class="row ">
                            <div class="col-sm-1 pull-right">
                                <a class="btn btn-primary pull-right bg marging-right" onclick="myshowhideFunction()"
                                   style="min-width: 70px;">Hide/show</a>
                            </div>
                            <div class="col-sm-1 pull-right">
                                <button class="btn btn-primary pull-right bg marging-right" id="btn_submit"
                                        type="submit" style="min-width: 70px">Add
                                </button>
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
<script src="<?php echo base_url('assets/frontend/js/bootstrap3-wysihtml5.all.min.js') ?>"></script>
<script>
    function myshowhideFunction() {
        var hs = document.getElementById("myshowhide");
        if (hs.style.display === "none") {
            hs.style.display = "block";
        } else {
            hs.style.display = "none";
        }
    }
</script>
<script>
    jQuery.validator.addMethod("emailCustom", function (value, element, params) {
        var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(value);
    }, "Please enter a valid email address.");

    var FormValidation = function () {

        // basic validation
        var handleValidation1 = function () {

            // for more info visit the official plugin documentation:
            // http://docs.jquery.com/Plugins/Validation
            var form1 = $('#add_item');
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

                    Accessions_Number: {
                        required: true

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
    $(".alert").fadeTo(6000, 6000).slideUp(800, function () {
        $(".alert").alert('close');
    });
</script>