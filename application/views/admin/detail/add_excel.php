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
                    <?php echo form_open_multipart(current_url(),array('name'=>'add_bankdata','id'=>'add_bankdata','class'=>'form-horizontal','method'=>'post'));?>
                    <h3>Upload File</h3>
                    <?php if( $error = $this->session->flashdata('invalid_user')): ?>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="alert alert-dismissible alert-danger">
                                    <?php echo $error; ?>
                                </div>
                            </div>
                        </div>
                    <?php endif ; ?>
                    <?php
                    $errors =$this->session->flashdata('error_msg');
                    $success =$this->session->flashdata('success_msg');
                    if(isset($errors)) { ?>
                        <div class="alert alert-danger"> <?php echo $this->session->flashdata('error_msg'); ?> </div>
                    <?php } ?>
                    <?php if(isset($success)) { ?>
                        <div class="alert alert-success"> <?php echo $this->session->flashdata('success_msg'); ?> </div>
                    <?php } ?>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="student" class="control-label col-sm-2">Select File</label>
                            <div class="col-sm-10">
                                <input name="file"  type="file"  />
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <!-- /.box-body -->
                    <div class="clearfix"></div>
                    <div class="box-footer">
                        <div class="row ">
                            <div class="col-sm-1 pull-right">
                                <a class="btn btn-primary pull-right bg" type="submit" href="<?php echo base_url('bankdata/index');?>" id="btn_submit">Cancel</a>
                            </div>
                            <div class="col-sm-1 pull-right">
                                <button class="btn btn-primary pull-right bg marging-right" id="btn_submit" type="submit" style="min-width: 70px">Upload</button>
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
