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


  $query="SELECT * FROM `items` WHERE id='$id' ";
   //echo $query;
   $result=mysqli_query($con,$query);

// print_r(mysqli_fetch_assoc($result));
  while($row=mysqli_fetch_assoc($result))

  {

    $material_code=$row['material_code'];
    $item_description=$row['item_description'];
    $unit=$row['unit'];


    $Qty=$row['Qty'];
    $Rate=$row['Rate'];
    $Amount=$row['Amount'];
    $Agreement = $row['Agreement'];
    $Currency = $row['Currency'];
    // $role=$row['role'];
   
  }

}



if (isset($_POST['material_code'])){



    $material_code = stripslashes($_POST['material_code']);
    $material_code = mysqli_real_escape_string($con,$material_code);


 


    $item_description = stripslashes($_POST['item_description']);
        $item_description = mysqli_real_escape_string($con,$item_description);



    $unit = stripslashes($_POST['unit']);
    $unit = mysqli_real_escape_string($con,$unit); 
    
    $Qty = stripslashes($_POST['Qty']);
    $Qty = mysqli_real_escape_string($con,$Qty); 
    

    $Rate = stripslashes($_POST['Rate']);
    $Rate = mysqli_real_escape_string($con,$Rate); 
    

    $Amount = stripslashes($_POST['Amount']);
    $Amount = mysqli_real_escape_string($con,$Amount); 

    $Agreement = stripslashes($_POST['Agreement']);
    $Agreement = mysqli_real_escape_string($con,$Agreement); 

    $Currency = stripslashes($_POST['Currency']);
    $Currency = mysqli_real_escape_string($con,$Currency);

    // $role = stripslashes($_POST['role']);









$query = "UPDATE `items` SET `material_code`='$material_code' ,  ";

$query .="  `item_description`='$item_description' , ";

$query .="  `Agreement`='$Agreement' , ";

$query .="  `Currency`='$Currency' , ";

$query .="  `unit`='$unit' ,    ";

$query .="  `Qty`='$Qty' ,    ";


$query .="  `Rate`='$Rate' ,    ";


$query .="  `Amount`='$Amount'   ";


$query .=" WHERE `id`= '$id' ";
$result = mysqli_query($con,$query);
 
 

if($result){   
            echo "<script>alert('Done');window.location = 'all_items.php';</script>" ;

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
                        <h3 class="kt-portlet__head-title">Edit Item</h3>
                      </div>
                    </div>
              <!--begin::Row-->
            
  <form  action="" method="post"  >

 


<br>

      



  <div class="form-group">
    <label for="username">Material Code</label>
    <input required type="text" class="form-control "  name="material_code" value="<?php echo  $material_code; ?>" ></input>   

  </div>

  <div class="form-group">
    <label for="email">Item Description</label>
    <input required type="text" class="form-control "  name="item_description" value="<?php echo  $item_description; ?>" ></input>   

  </div>

  <div class="form-group">
    <label for="Agreement">Agreement</label>
    <select required class="form-control" id="Agreement"  name="Agreement">
      <option Value="Yes" <?php echo $Agreement == "Yes" ? 'selected' : '' ?>>Yes</option>
      <option value="No" <?php echo $Agreement == "No" ? 'selected' : '' ?>>No</option>
    </select>
  </div> 

  <div class="form-group">
    <label for="Currency">Currency</label>
    <select required class="form-control" id="Currency"  name="Currency">
      <option Value="JOD" <?php echo $Currency == "JOD" ? 'selected' : '' ?>>JOD</option>
      <option value="USD" <?php echo $Currency == "USD" ? 'selected' : '' ?>>USD</option>
    </select>
  </div> 

  <div class="form-group">
    <label for="Unit">Unit</label>
    <select required class="form-control" id="unit"  name="unit">
      <option Value="Job" <?php echo $unit == "Job" ? 'selected' : '' ?>>Job</option>
      <option value="Quantity" <?php echo $unit == "Quantity" ? 'selected' : '' ?>>Quantity</option>
    </select>
  </div> 


  <div class="form-group">
    <label for="exampleInputPassword1">Quantity</label>
    <input required type="text" class="form-control" id="Qty"  name="Qty" value="<?php echo  $Qty; ?>">
  </div>



 <div class="form-group">
    <label for="exampleInputPassword1">Rate</label>
    <input required type="text" class="form-control" id="Rate"  name="Rate" value="<?php echo  $Rate; ?>">
  </div>




 <div class="form-group">
    <label for="exampleInputPassword1">Amount</label>
    <input required type="text" class="form-control" id="Amount"  name="Amount" value="<?php echo  $Amount; ?>">
  </div>





<!-- 
      <label class="col-lg-1 col-form-label">Role:</label>

     <div class="form-group">
     
     <select  required name="role" id="role" class="form-control">
        
         <option   value="<?php echo  $role; ?>" ><?php echo  $role; ?></option>
		 <option   value="Admin" >Admin</option>
		 <option   value="End User" >End User</option>
		 <option   value="Vendor" >Vendor</option>

         


     </select>                                                
     </div>     -->                   
					  
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