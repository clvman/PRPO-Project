<?php include('includes/header.php') ;?>    
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

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

          
<?php
require('includes/db.php');
if (isset($_GET['id'])){

 $id=$_GET['id'];


  $query="SELECT * FROM `sites` WHERE site_id='$id' ";
   //echo $query;
   $result=mysqli_query($con,$query);


while($row=mysqli_fetch_assoc($result))

{

 $TASC_Site_Code=$row['tasc_site_code'];
$site_name=$row['site_name'];
 
}

}



if (isset($_POST['TASC_Site_Code'])){



    $TASC_Site_Code = stripslashes($_POST['TASC_Site_Code']);
    $TASC_Site_Code = mysqli_real_escape_string($con,$TASC_Site_Code);


 


    $site_name = stripslashes($_POST['site_name']);
    $site_name = mysqli_real_escape_string($con,$site_name); 
    


    // $role = stripslashes($_POST['role']);









$query = "UPDATE `sites` SET `tasc_site_code`='$TASC_Site_Code' ,  ";


$query .="  `site_name`='$site_name'   ";


// $query .="  `role`='$role' ";

$query .=" WHERE `site_id`= '$id' ";
$result = mysqli_query($con,$query);
 
 

if($result){   
            echo "<script>alert('Done');window.location = 'all_sites.php';</script>" ;

}




}



?>

          </div>
     <!-- end:: Header -->
          <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

            <!-- begin:: Subheader -->
             
            <!-- end:: Subheader -->

            <!-- begin:: Content -->
            <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">

              <!--begin::Dashboard 2-->
                    <div class="kt-portlet__head">
                      <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">Edit Site</h3>
                      </div>
                    </div>
              <!--begin::Row-->
            
  <form  action="" method="post"  >

 


<br>

      



  <div class="form-group">
    <label for="username">TASC Site Code</label>
    <input required type="text" class="form-control "  name="TASC_Site_Code" value="<?php echo  $TASC_Site_Code; ?>" ></input>   

  </div>

  <div class="form-group">
    <label for="email">Site Name</label>
    <input required type="text" class="form-control "  name="site_name" value="<?php echo  $site_name; ?>" ></input>   

  </div>
                 
					  
					  <button type="submit" name="change"  class="btn btn-primary">Edit</button>
  
  
    
</form>

<script type="text/javascript">
var code = {};
$("select[name='role'] > option").each(function () {
    if(code[this.text]) {
        $(this).remove();
    } else {
        code[this.text] = this.value;
    }
});
</script>


<script type="text/javascript">
var code = {};
$("select[name='team'] > option").each(function () {
    if(code[this.text]) {
        $(this).remove();
    } else {
        code[this.text] = this.value;
    }
});
</script>


              <!--end::Row-->

              <!--end::Dashboard 2-->
            </div>

            <!-- end:: Content -->
          </div>

             

<?php include('includes/footer.php') ?>