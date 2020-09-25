<?php $controller_name = $this->router->class;
$method_name = $this->router->method;
$custom_link = $controller_name.'/'.$method_name;
?>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo base_url('assets/images/default70.jpg') ?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?php echo $this->session->userdata('user_name') ;?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <ul class="sidebar-menu" data-widget="tree">
            <li class="menu-open <?php if($custom_link  == "admin/dashboard") echo "active open"; ?>">
                <a href="<?php echo base_url('admin/dashboard')?>">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            <li class="treeview <?php if($controller_name == "gallery") echo "active open"; ?>">
                <a href="#">
                    <i class="fa fa-gear"></i> <span>Gallery</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php if($controller_name == "gallery" && $method_name == "add") echo "active open"; ?>">
                        <a href="<?php echo base_url('gallery/add')?>"><i class="fa fa-circle-o"></i> Add </a></li>
                    <li class="<?php if($controller_name == "gallery" && $method_name == "index") echo "active open"; ?>">
                        <a href="<?php echo base_url('gallery/index')?>"><i class="fa fa-circle-o"></i> All </a></li>
                </ul>
            </li>
            <li class="treeview <?php if($controller_name == "settings") echo "active open"; ?>">
                <a href="#">
                    <i class="fa fa-gear"></i> <span>Settings</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php if($controller_name == "settings" && $method_name == "index") echo "active open"; ?>">
                        <a href="<?php echo base_url('settings/index')?>"><i class="fa fa-circle-o"></i> All </a></li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>