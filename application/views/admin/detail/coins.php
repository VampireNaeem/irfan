<?php $this->load->view('includes/header_files.php'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/dataTables.bootstrap.min.css');?>">
<?php $this->load->view('includes/header.php'); ?>
<?php $this->load->view('includes/sidebar.php'); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Coins
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('admin/dashboard')?>"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            <li class="active">All Services</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <?php include(APPPATH.'views/includes/_messages.php') ?>
                    <div class="box-header">
                        <h3 class="box-title pull-right"><?php echo anchor('detail/add', '<i class="fa fa-plus"></i> Add item', array('class' => 'btn btn-block btn-primary btn-flat ')); ?></h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="big_table" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Accession Number</th>
                                <th>Provenance</th>
                                <th>image</th>
                                <th>Group Classification</th>
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
        "ajax": '<?php echo base_url('detail/coins');?>',
        columns: [
            { data: "id" },
            { data: "Accession_Number" },
            { data: "Provenance" },
            { data: "image" },
            { data: "Group_Classification" },
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