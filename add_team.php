<?php include('includes/header.php') ;?>    

  <!-- begin::Body -->
  <body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--fixed kt-subheader--enabled kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">

    <!-- begin:: Header Mobile -->
    <div id="kt_header_mobile" class="kt-header-mobile  kt-header-mobile--fixed ">
      <div class="kt-header-mobile__logo">
        <a href="index.html">
          <img alt="Logo" src="assets/media/logos/logo-1.png" />
        </a>
      </div>
      <div class="kt-header-mobile__toolbar">
        <button class="kt-header-mobile__toolbar-toggler kt-header-mobile__toolbar-toggler--left" id="kt_aside_mobile_toggler"><span></span></button>
        <button class="kt-header-mobile__toolbar-toggler" id="kt_header_mobile_toggler"><span></span></button>
        <button class="kt-header-mobile__toolbar-topbar-toggler" id="kt_header_mobile_topbar_toggler"><i class="flaticon-more"></i></button>
      </div>
    </div>

    <!-- end:: Header Mobile -->

    <!-- begin:: Root -->
    <div class="kt-grid kt-grid--hor kt-grid--root">

      <!-- begin:: Page -->
      <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">

        <!-- begin:: Aside -->
        <button class="kt-aside-close " id="kt_aside_close_btn"><i class="la la-close"></i></button>
        <div class="kt-aside  kt-aside--fixed  kt-grid__item kt-grid kt-grid--desktop kt-grid--hor-desktop" id="kt_aside">

          <!-- begin::Aside Brand -->
          <?php include('includes/sidebar_logo.php') ?>

          <!-- end:: Aside Brand -->

          <!-- begin:: Aside Menu -->
          <?php include('includes/sidebar.php') ?>
          <!-- end:: Aside Menu -->

          <!-- begin:: Aside Footer -->
          <div class="kt-aside__footer kt-grid__item" id="kt_aside_footer">
             
          </div>

          <!-- end:: Aside Footer-->
        </div>

        <!-- end:: Aside -->

        <!-- begin:: Wrapper -->
        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">

          <!-- begin:: Header -->
          <div id="kt_header" class="kt-header kt-grid__item  kt-header--fixed ">

            <!-- begin:: Header Menu -->
            <button class="kt-header-menu-wrapper-close" id="kt_header_menu_mobile_close_btn"><i class="la la-close"></i></button>
            <div class="kt-header-menu-wrapper" id="kt_header_menu_wrapper">
              <div id="kt_header_menu" class="kt-header-menu kt-header-menu-mobile  kt-header-menu--layout- ">
                <ul class="kt-menu__nav ">
                  
                   
                   
                </ul>
              </div>
            </div>

            <!-- end:: Header Menu -->

            <!-- begin:: Header Topbar -->


            <div class="kt-header__topbar">


              <!--begin: Search -->
               
              <!--end: Search -->

              <!--begin: Notifications -->
             

              <!--end: Notifications -->

              <!--begin: Quick Actions -->
             
              <!--end: Quick Actions -->

              <!--begin:: Languages -->
             
              <!--end:: Languages -->

              <!--begin: User Bar -->
                 <?php include('includes/navbar.php') ?>
              <!--end: User Bar -->

              <!--begin:: Quick Panel Toggler -->
               

              <!--end:: Quick Panel Toggler -->
            </div>

            <!-- end:: Header Topbar -->
          </div>
<?php
require('includes/db.php');
if (isset($_POST['team_name'])){
    // $team_email = stripslashes($_POST['team_email']);
    // $team_email = mysqli_real_escape_string($con,$team_email); 


    $team_name = stripslashes($_POST['team_name']);
    $team_name = mysqli_real_escape_string($con,$team_name); 
    
    $role = stripslashes($_POST['role']);
    $role = mysqli_real_escape_string($con,$role); 

 

            //$post_image        = $_FILES['image']['name'];
            //$post_image_temp   = $_FILES['image']['tmp_name'];
            //move_uploaded_file($post_image_temp, "img/".$post_image."");

 $query_0 = "SELECT * FROM `teams` WHERE (team_name='$team_name' and role='$role')";
 $result_0 = mysqli_query($con,$query_0) or die(mysql_error());
  if(mysqli_num_rows($result_0) > 0){

                             ?>

                          <script type="text/javascript">
                          alert('This Team Already Registered.');
						  window.location = 'add_team.php' ;

                          </script>



                          <?php 
             
          }

          else{


        $query = "INSERT into `teams` ( team_name,role)VALUES ('$team_name','$role')";
		//echo $query ;
        $result = mysqli_query($con,$query);
        if($result){
    //       
 echo "<script>alert('Team registered successfully');window.location = 'all_team.php' ;</script>" ;

        }}
    }else{
?>
          <!-- end:: Header -->
          <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

            <!-- begin:: Subheader -->
             
            <!-- end:: Subheader -->

            <!-- begin:: Content -->
            <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">

              <!--begin::Dashboard 2-->
                    <div class="kt-portlet__head">
                      <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">Add Team</h3>
                      </div>
                    </div>
              <!--begin::Row-->
            <br>
         <form  class="kt-form kt-form--label-right" action="" method="post"  >




  <div class="form-group">
    <label for="team_name">Team Name</label>
    <input required type="text" class="form-control" id="team_name" name="team_name" placeholder="Team Name">
  </div>



<!--     <div class="form-group">
    <label for="team_email">Team Email</label>
    <input required type="email" class="form-control" id="team_email" name="team_email" placeholder="Email">
  </div>
 -->
 
<div class="form-group">
    <label for="role">Team Role</label>
    <select required name="role" class="form-control" id="role">
      <option value="">Choose</option>
      <option value="Admin">Admin</option>
      <option value="Civil Team">Civil Team</option>
      <option value="Civil Team Manager">Civil Team - Manager</option>
      <option value="O&M Team">O&M Team</option>
      <option value="O&M Team Manager">O&M Team - Manager</option>
      <option value="Finance Team">Finance Team</option>
      <option value="Finance Team Director">Finance Team - Director</option>
      <option value="PMO Team Manager">PMO Team - Manager</option>
      <option value="Technical Team Director">Technical Team - Director</option>
      <option value="Supplier">Supplier</option>

    </select>
  </div>



  <div class="form-group">
  <button type="submit" class="btn btn-primary">Create</button>
    <input class="btn btn-primary" action="action" onclick="window.history.go(-1); return false;" type="button" value="Cancel" />
    </div>
  
  
    
</form>

 <?php } ?>

              <!--end::Row-->

              <!--end::Dashboard 2-->
            </div>

            <!-- end:: Content -->
          </div>

<?php include('includes/footer.php') ?>