<div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Admin Panel</a> 
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> Last access : 30 May 2014 &nbsp; <a href="logout.php" class="btn btn-danger square-btn-adjust">Logout</a> </div>
        </nav>   
<?php include("userdetails.php"); ?>
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="../<?php echo $profileimage; ?>" class="user-image img-responsive"/>
					</li>
				
					
                    <li>
                        <a  href="index.php"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
                    </li>
                     <li>
                        <a  href="manageusers.php"><i class="fa fa-user fa-3x"></i> Manage Users</a>
                    </li>
                    <li>
                        <a  href="managegroups.php"><i class="fa fa-users fa-3x"></i> Manage Groups</a>
                    </li>
                    <!-- <li>
                        <a  href="#"><i class="fa fa-qrcode fa-3x"></i> Tabs & Panels</a>
                    </li>
						   <li  >
                        <a   href="#"><i class="fa fa-bar-chart-o fa-3x"></i> Morris Charts</a>
                    </li>	
                      <li  >
                        <a  href="#"><i class="fa fa-table fa-3x"></i> Table Examples</a>
                    </li>
                    <li  >
                        <a  href="#"><i class="fa fa-edit fa-3x"></i> Forms </a>
                    </li> -->				
					
					                   
                    <li>
                        <a href="#"><i class="fa fa-cogs fa-3x"></i> Tools<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">

                         <li>
                            <a href="#">Admin Tools<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="adminlist.php">Admin List</a>
                                    </li>
                                </ul>
                         </li>
                            <!-- <li>
                                <a href="#">Second Level Link</a>
                            </li> -->
                            <?php if ($loggedadmin >= 800) { ?>
                            <li>
                                <a href="#">Guardian Tools<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="adminlog.php">Admin Log</a>
                                    </li>
                                    <!-- <li>
                                        <a href="#">Third Level Link</a>
                                    </li>
                                    <li>
                                        <a href="#">Third Level Link</a>
                                    </li> -->

                                </ul>
                               
                            </li>
                            <?php } ?>
                        </ul>
                      </li>  
                  <li  >
                        <a  href="#"><i class="fa fa-square-o fa-3x"></i> sss</a>
                    </li>	
                </ul>
               
            </div>
            
        </nav>