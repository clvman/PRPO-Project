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
if (isset($_POST['supplier_name'])){
    $supplier_name = stripslashes($_POST['supplier_name']);
    $supplier_name = mysqli_real_escape_string($con,$supplier_name);


 


    $Country = stripslashes($_POST['Country']);
    $Country = mysqli_real_escape_string($con,$Country); 
    


    $Telephone_Number = stripslashes($_POST['Telephone_Number']);
    $Telephone_Number = mysqli_real_escape_string($con,$Telephone_Number);



    $fax = stripslashes($_POST['fax']);
    $fax = mysqli_real_escape_string($con,$fax);





    $address = stripslashes($_POST['address']);
    $address = mysqli_real_escape_string($con,$address);





    $email = stripslashes($_POST['email']);
    $email = mysqli_real_escape_string($con,$email);




        $query = "INSERT into `supplier` (supplier_name,country,telephone_number,fax,address,email)VALUES ('$supplier_name', '$Country','$Telephone_Number','$fax','$address','$email')";
        $result = mysqli_query($con,$query);
        if($result){
            
 echo "<script>alert('Supplier registered successfully');window.location = 'all_suppliers.php';</script>" ;

        }


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
                        <h3 class="kt-portlet__head-title">Add Supplier</h3>
                      </div>
                    </div>
              <!--begin::Row-->
            
         <form  class="kt-form kt-form--label-right" action="" method="post"  >

<!--   <div class="form-group">
    <label for="Role">User Role</label>
    <select required name="role" class="form-control" id="Role">
         <option value="">Choose</option>
      <option value="Admin">Admin</option>
      <option value="End User">End User</option>
	    <option value="End User">Vendor</option>

    </select>
  </div> -->


  <div class="form-group">
    <label for="username">Name</label>
    <input required type="text" class="form-control" id="supplier_name" name="supplier_name" placeholder="Name">
  </div>



    <div class="form-group">
    <label for="username">Country</label>
    <input optional  type="text" class="form-control" id="Country" name="Country" placeholder="Country">
  </div>


 
  <div class="form-group">
    <label for="exampleInputPassword1">Telephone Number</label>
    <input optional  type="text" class="form-control" id="Telephone_Number"  name="Telephone_Number">
  </div>



 
  <div class="form-group">
    <label for="exampleInputPassword1">Email</label>
    <input optional  type="email" class="form-control" id="email"  name="email">
  </div>





 
  <div class="form-group">
    <label for="exampleInputPassword1">Fax</label>
    <input optional  type="text" class="form-control" id="fax"  name="fax">
  </div>





 
  <div class="form-group">
    <label for="exampleInputPassword1">Address</label>
    <input optional  type="text" class="form-control" id="address"  name="address">
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