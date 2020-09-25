<?php $this->load->view('includes/header_files.php'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/dataTables.bootstrap.min.css');?>">
<?php $this->load->view('includes/header.php'); ?>
<?php $this->load->view('includes/sidebar.php'); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Settings
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('admin/dashboard')?>"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            <li class="active">All Settings</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <?php include(APPPATH.'views/includes/_messages.php') ?>
                    <div class="box-header">
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="big_table" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Value</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<?php $this->load->view('includes/footer.php'); ?>
<?php $this->load->view('includes/footer_files.php'); ?>

<script src="<?php echo base_url('assets/js/jquery.dataTables.js');?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/dataTables.bootstrap.min.js');?>" type="text/javascript"></script>

<script>

    oTable = $('#big_table').DataTable({
        "ajax": '<?php echo base_url('admin/settings/index');?>',
        columns: [
            { data: "setting_id" },
            { data: "name" },
            { data: "value" },
            { data: "description" },
            { data: "Actions" }
        ],

        buttons: [],
        aaSorting: [[0, "desc" ]],
        processing: true,
        lengthMenu: [[100, 250, 500, 1000], [100, 250, 500, 1000]],


    });
    $(".alert").fadeTo(2000, 2000).slideUp(800, function(){
        $(".alert").alert('close');
    });

</script>