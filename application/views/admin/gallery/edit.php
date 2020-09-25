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
            <li><a href="<?php echo base_url('gallery/index') ?>"><i class="fa fa-dashboard"></i>Gallery</a></li>
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

                                <label class="form-label">Title</label>
                                <span class="help">e.g. "Title"</span>
                                <div class="controls">
                                    <input type="text" id="title" name="title" value="<?php echo $result->title?>"
                                           class="form-control">
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-6">

                                <label class="form-label">image</label>
                                <span class="help">e.g. "image"</span>
                                <div class="controls">
                                    <input type="file" id="exampleInputFile1" name="image" value="">
                                </div>

                            </div>
                            <?php if($result->gallery_image){?>
                                <label class="form-label">Previous Main Image</label>
                                <div class="controls" > <?php echo create_img_thumb($result->gallery_image,GALLERY_IMAGE."/".$result->gallery_id);?>
                                    <input type="hidden" name="old_image" value="<?php echo $result->gallery_image; ?>" />
                                </div>
                            <?php }?>
                            <div class="col-md-6 col-sm-6 col-xs-6">

                                <label class="form-label">Status</label>
                                <span class="help">e.g. "Status"</span>
                                <div class="controls">
                                    <select class="form-control" name="select">
                                        <option  <?php if($result->is_active == 1)  { echo 'selected="selected"';}?>  value="1"> Active</option>
                                        <option  <?php if($result->is_active == 0) { echo 'selected="selected"';}?> value="0"> In-Active</option>
                                    </select>
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