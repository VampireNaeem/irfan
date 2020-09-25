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
                    <?php echo form_open_multipart(current_url(), array('name' => 'edit_detail', 'id' => 'edit_detail', 'class' => 'form-horizontal', 'method' => 'post')); ?>
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
                                        value="<?php echo $result->Accession_Number?>"   class="form-control">
                                </div>

                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-4">

                                <label class="form-label">Dimensions</label>
                                <span class="help">e.g. "Width * Length"</span>
                                <div class="controls">
                                    <input type="text" id="Dimensions" value="<?php echo $result->Dimensions?>" name="Dimensions" class="form-control">
                                </div>

                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6">

                                <label class="form-label">Provenance</label>
                                <span class="help">e.g. "Excavation Location"</span>
                                <div class="controls">
                                    <input type="text" id="Provenance" value="<?php echo $result->Provenance?>" name="Provenance" class="form-control">
                                </div>

                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-4">

                                <label class="form-label">Location</label>
                                <span class="help">e.g. "Main Hall"</span>
                                <div class="controls">
                                    <input type="text" id="Location" value="<?php echo $result->Location?>" name="Location" class="form-control">
                                </div>

                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6">

                                <label class="form-label">Group</label>
                                <span class="help">e.g. "Material / Peroid wise"</span>
                                <div class="controls">
                                    <select class="form-control" id="Group_Classification" name="Group_Classification" value="<?php echo set_value('Group_Classification'); ?>">
                                        <option value="">-Select Program Type-</option>
                                        <option  <?php if($result->Group_Classification == "Gandharan")  { echo 'selected="selected"';}?>  value="Gandharan"> Gandharan</option>
                                        <option  <?php if($result->Group_Classification == "Coins")  { echo 'selected="selected"';}?>  value="Coins"> Coins</option>
                                        <option  <?php if($result->Group_Classification == "Islamic")  { echo 'selected="selected"';}?>  value="Islamic"> Islamic</option>
                                        <option  <?php if($result->Group_Classification == "Ethnological")  { echo 'selected="selected"';}?>  value="Ethnological"> Ethnological</option>
                                    </select>
                                </div>

                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-4">

                                <label class="form-label">Period</label>
                                <span class="help">e.g. "1st Century AD / BC"</span>
                                <input type="text" id="Obj_Date" value="<?php echo $result->Obj_Date?>" name="Obj_Date"
                                       class="form-control">

                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6">

                                <label class="form-label"> Receipt Date</label>
                                <span class="help">e.g. "0000-00-00"</span>
                                <div class="controls">
                                    <input type="text" id="Date_Receipt" value="<?php echo $result->Date_Receipt?>" name="Date_Receipt" class="form-control">
                                </div>

                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-4">

                                <label class="form-label">Condition</label>
                                <span class="help">e.g. "Artifact Status"</span>
                                <div class="controls">
                                    <input type="text" id="Condition" value="<?php echo $result->Condition?>" name="Condition" class="form-control">
                                </div>

                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6">

                                <label class="form-label">Description</label>
                                <span class="help">e.g. "Detail"</span>
                                <div class="controls">
                                    <input type="text" id="Description" value="<?php echo $result->Description?>" name="Description" class="form-control">
                                </div>

                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-4">

                                <label class="form-label">Material</label>
                                <span class="help">e.g. "Material used in creation"</span>
                                <div class="controls">
                                    <input type="text" id="Material" value="<?php echo $result->Material?>" name="Material" class="form-control">
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 col-sm-4 col-xs-4">

                                <label class="form-label">Old Accession Number</label>
                                <span class="help">e.g. "PM_12345"</span>
                                <div class="controls">
                                    <input type="text" id="Old_Acc_No" value="<?php echo $result->Old_Acc_No?>" name="Old_Acc_No" class="form-control">
                                </div>

                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-4">

                                <label class="form-label">Measurement/Unit</label>
                                <span class="help">e.g. "cm"</span>
                                <div class="controls">
                                    <input type="text" id="Meas_Unit" value="<?php echo $result->Meas_Unit?>" name="Meas_Unit" class="form-control">
                                </div>

                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-4">

                                <label class="form-label">Check Date</label>
                                <span class="help">e.g. "0000-00-00"</span>
                                <div class="controls">
                                    <input type="text" id="Check_Date" value="<?php echo $result->Check_Date?>" name="Check_Date" class="form-control">
                                </div>

                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-4">

                                <label class="form-label">Format Name</label>
                                <span class="help">e.g. "group name"</span>
                                <div class="controls">
                                    <input type="text" id="Format_Name" value="<?php echo $result->Format_Name?>" name="Format_Name" class="form-control">
                                </div>

                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-4">

                                <label class="form-label">Loan No</label>
                                <span class="help">e.g. "12345"</span>
                                <div class="controls">
                                    <input type="text" id="Loan_No" value="<?php echo $result->Loan_No?>" name="Loan_No" class="form-control">
                                </div>

                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-4">

                                <label class="form-label">Reg. No</label>
                                <span class="help">e.g. "12345"</span>
                                <div class="controls">
                                    <input type="text" id="Reg_No" value="<?php echo $result->Reg_No?>" name="Reg_No" class="form-control">
                                </div>

                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-4">

                                <label class="form-label">Book Reference Number</label>
                                <span class="help">e.g. "12345"</span>
                                <div class="controls">
                                    <input type="text" id="Book_Ref" value="<?php echo $result->Book_Ref?>" name="Book_Ref" class="form-control">
                                </div>

                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6">

                                <label class="form-label">image</label>
                                <span class="help">e.g. "image"</span>
                                <div class="controls">
                                    <input type="file" id="exampleInputFile1" name="image" value="">
                                </div>

                            </div>
                            <?php if($result->image){?>
                                    <label class="form-label">Previous Main Image</label>
                                    <div class="controls" > <?php echo create_img_thumb($result->image,IMAGE."/".$result->id);?>
                                        <input type="hidden" name="old_image" value="<?php echo $result->image; ?>" />
                                    </div>
                            <?php }?>
                        </div>

                        <div class="clearfix"></div>
                    </div>
                    <!-- /.box-body -->
                    <div class="clearfix"></div>
                    <div class="box-footer">
                        <div class="row ">
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