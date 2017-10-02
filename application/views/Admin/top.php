<?php
 $cpage = $this->uri->segment(2);
 
?>
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url()?>admin/home"><img src="<?php echo base_url()?>assets/images/site-logo-admin.png" title="<?php echo $this->config->item("SITE_NAME")?>"  /></a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li><strong>Welcome</strong>  <?php echo $this->session->ses_name?> </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="<?php echo base_url()?>admin/home/profile"><i class="fa fa-user fa-fw"></i> User Profile</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo base_url()?>admin/login/logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="<?php echo base_url()?>admin/home" <?php if($cpage == "home") echo 'class="active"';?> ><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Site Setup<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo base_url()?>admin/buyers" <?php if($cpage == "buyers") echo 'class="active"';?> ><i class="fa fa-wrench fa-fw"></i> Configurations</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li <?php if($cpage == "categories" || $cpage == "owners" || $cpage == "ads" || $cpage == "places") echo 'class="active"';?> >
                            <a href="#"><i class="fa fa-list fa-fw"></i> Property Setup<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo base_url()?>admin/categories" <?php if($cpage == "categories") echo 'class="active"';?> ><i class="fa fa-sitemap fa-fw"></i>Categories</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url()?>admin/owners" <?php if($cpage == "owners") echo 'class="active"';?> ><i class="fa fa-user fa-fw"></i>Owners</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url()?>admin/ads" <?php if($cpage == "ads" || $cpage == "places") echo 'class="active"';?> ><i class="fa fa-list fa-fw"></i>Properties</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url()?>admin/bodytype" <?php if($cpage == "bodytype") echo 'class="active"';?> ><i class="fa fa-list fa-fw"></i>Body Type</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url()?>admin/maker" <?php if($cpage == "maker") echo 'class="active"';?> ><i class="fa fa-list fa-fw"></i>Maker</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url()?>admin/brand" <?php if($cpage == "brand") echo 'class="active"';?> ><i class="fa fa-list fa-fw"></i>Brand</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url()?>admin/model" <?php if($cpage == "model") echo 'class="active"';?> ><i class="fa fa-list fa-fw"></i>Model</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        
                        <li>
                            <a href="forms.html"><i class="fa fa-edit fa-fw"></i> Forms</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> UI Elements<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="panels-wells.html">Panels and Wells</a>
                                </li>
                                <li>
                                    <a href="buttons.html">Buttons</a>
                                </li>
                                <li>
                                    <a href="notifications.html">Notifications</a>
                                </li>
                                <li>
                                    <a href="typography.html">Typography</a>
                                </li>
                                <li>
                                    <a href="icons.html"> Icons</a>
                                </li>
                                <li>
                                    <a href="grid.html">Grid</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-sitemap fa-fw"></i> Multi-Level Dropdown<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#">Second Level Item</a>
                                </li>
                                <li>
                                    <a href="#">Second Level Item</a>
                                </li>
                                <li>
                                    <a href="#">Third Level <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                    </ul>
                                    <!-- /.nav-third-level -->
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li class="active">
                            <a href="#"><i class="fa fa-users fa-fw"></i> Users<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo base_url()?>/admin/buyers" <?php if($cpage == "buyers") echo 'class="active"';?> ><i class="fa fa-user fa-fw"></i> Buyers</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url()?>/admin/customers" <?php if($cpage == "customers") echo 'class="active"';?> ><i class="fa fa-user fa-fw"></i> Customers</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>