<?php include('includes/header.php') ;?>    

  <!-- begin::Body -->
  <script src="./assets/js/jquery-3.5.1.min.js"></script>
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
            if (isset($_POST['material_code'])){
                $material_code = stripslashes($_POST['material_code']);
                $material_code = mysqli_real_escape_string($con,$material_code);

                $item_description = stripslashes($_POST['item_description']);
                $item_description = mysqli_real_escape_string($con,$item_description); 
                
                $Amount = stripslashes($_POST['Amount']);
                $Amount = mysqli_real_escape_string($con,$Amount);

                $Agreement = stripslashes($_POST['Agreement']);
                $Agreement = mysqli_real_escape_string($con,$Agreement);

                $Currency = stripslashes($_POST['Currency']);
                $Currency = mysqli_real_escape_string($con,$Currency);

                $Unit = stripslashes($_POST['Unit']);
                $Unit = mysqli_real_escape_string($con,$Unit);

                $Rate = stripslashes($_POST['Rate']);
                $Rate = mysqli_real_escape_string($con,$Rate);                
                                                
                $query = "INSERT into `items` (material_code, item_description, Amount, Agreement, Currency, Rate, unit) VALUES ('$material_code', '$item_description','$Amount', '$Agreement', '$Currency', '$Rate', '$Unit')";
                $result = mysqli_query($con,$query);
                if($result){     
                  echo "<script>alert('Item registered successfully');window.location = 'all_items.php';</script>" ;
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
                  <h3 class="kt-portlet__head-title">Add Item</h3>
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
                      <label for="username">Material Code</label>
                      <input required type="text" class="form-control" id="material_code" name="material_code" placeholder="Material Code">
                    </div>
                    <div class="form-group">
                    <label for="username">Item Description</label>
                     <textarea name="item_description" required class="form-control" id="item_description" ></textarea>
                    </div>
                    <div class="form-group">
                        <label for="Agreement">Agreement</label>
                        <select required name="Agreement" class="form-control" id="Agreement">
                          <option value="Yes">Yes</option>
                          <option value="No">No</option>
                        </select>
                    </div>   
                    <div class="form-group">
                      <label for="Currency">Currency</label>
                      <select required class="form-control" id="Currency"  name="Currency">
                        <option Value="JOD">JOD</option>
                        <option Value="USD">USD</option>
                      </select>
                    </div>   
                    <div class="form-group">
                      <label for="Unit">Unit</label>
                      <select required class="form-control" id="Unit"  name="Unit">
                        <option Value="Job">Job</option>
                        <option value="Quantity">Quantity</option>
                      </select>
                    </div> 
                    <div class="form-group">
                      <label for="Rate">Rate</label>
                      <input required type="number" class="form-control" id="Rate"  name="Rate">
                    </div>                                                           
                    <div class="form-group">
                      <label for="Amount">Amount</label>
                      <input required type="text" class="form-control" id="Amount"  name="Amount">
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