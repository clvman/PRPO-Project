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
if (isset($_POST['approval_level'])){
    $approval_level = stripslashes($_POST['approval_level']);
    $approval_level = mysqli_real_escape_string($con,$approval_level);


 


    $team_name = stripslashes($_POST['team_name']);
    $team_name = mysqli_real_escape_string($con,$team_name); 
    

 $query_0 = "SELECT * FROM `approvals` WHERE (level='$approval_level'and team='$team_name'  )";
 $result_0 = mysqli_query($con,$query_0) or die(mysql_error());
  if(mysqli_num_rows($result_0) > 0){

 echo "<script>alert('This Approval Level already registered');window.location = 'add_approval.php';</script>" ;
             
          }

          else{


        $query = "INSERT into `approvals` (level,team) VALUES ('$approval_level','$team_name')";
        $result = mysqli_query($con,$query);
        if($result){
            
 echo "<script>alert('Approval Level registered successfully');window.location = 'all_approvals.php';</script>" ;

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
                        <h3 class="kt-portlet__head-title">Add Approval</h3>
                      </div>
                    </div>
              <!--begin::Row-->
            
         <form  class="kt-form kt-form--label-right" action="" method="post"  >

              <div class="form-group">
                <label for="approval_level">Approval Level</label>
                <select required   name="approval_level" class="form-control" id="approval_level">
                     <option value="">Choose</option>
                     <option value="1">Level 1</option>
                     <option value="2">Level 2</option>
                     <option value="3">Level 3</option>
                     <option value="4">Level 4</option>
                     <option value="5">Level 5</option>
                     <option value="6">Level 6</option>
                     <option value="7">Level 7</option>

                </select>
              </div>



  <div class="form-group">
    <label for="team_name">Team</label>
    <select required  name="team_name" class="form-control" id="team_name">
         <option value="">Choose</option>
     

<?php
$con1=mysqli_connect('localhost','root','123456','prpo');
$sql1 = "SELECT `team_name`  FROM teams"; 
$result1 = $con1->query($sql1);
while($row1 = $result1->fetch_assoc()){
echo "<option value='".$row1['team_name']."'>".$row1['team_name']."</option>";
}
?>

     

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