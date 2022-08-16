<style type="text/css">
  .btn {
    background-color: DodgerBlue;
    border: none;
    color: white;
    padding: 12px 30px;
    cursor: pointer;
    font-size: 20px;
  }

  /* Darker background on mouse-over */
  .btn:hover {
    background-color: RoyalBlue;
  }
  .header-icon {
    margin-left: 20px;
  }
  ul.timeline {
    list-style-type: none;
    position: relative;
  }
  ul.timeline:before {
      content: ' ';
      background: #d4d9df;
      display: inline-block;
      position: absolute;
      left: 29px;
      width: 2px;
      height: 100%;
      z-index: 400;
  }
  ul.timeline > li {
      margin: 20px 0;
      padding-left: 20px;
  }
  ul.timeline > li:before {
      content: ' ';
      background: white;
      display: inline-block;
      position: absolute;
      border-radius: 50%;
      border: 3px solid #22c0e8;
      left: 20px;
      width: 20px;
      height: 20px;
      z-index: 400;
  }
</style>
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
            <div class="kt-header__topbar">
              <!--begin: User Bar -->
              <?php include('includes/navbar.php') ?>
              <!--end: User Bar -->
            </div>
            <!-- end:: Header Topbar -->        
            <?php
              require('includes/db.php');
              if (isset($_GET['id'])){
                $id=$_GET['id'];
                $query="SELECT * FROM `submitted_pr` WHERE id='$id' ";
                $result=mysqli_query($con,$query);
                while($row=mysqli_fetch_assoc($result))
                {
                  $pr_code = $row['pr_code'];
                  $requester = $row['requester'];
                  $request_date = $row['request_date'];
                  $currency = $row['currency'];
                  $require_company = $row['require_company'];
                  $supplier = $row['supplier'];
                  $tasc_site_code = $row['tasc_site_code'];
                  $items = $row['items'];
                  $net_amount = $row['net_amount'];
                  $items_array = $row['items_array'];
                  $note = $row['note'];
                  $attach = $row['attach'];
                  $status = $row['status'];
                  $attach = $row['attach'];
                  $pr_step = $row['pr_step'];
                  $pr_status = $row['pr_status'];
                  $pr_reporting_to = $row['pr_reporting_to'];
                  $reject_text = $row['reject_text'];
                  $reject_attach = $row['reject_attach'];
                  $request_text = $row['request_text'];
                  $request_attach = $row['request_attach'];
                  $dateArray = [];
                  $dateArray[1] = $row['level1_date'];
                  $dateArray[2] = $row['level2_date'];
                  $dateArray[3] = $row['level3_date'];
                  $dateArray[4] = $row['level4_date'];
                  $dateArray[5] = $row['level5_date'];
                  $dateArray[6] = $row['level6_date'];
                  $dateArray[7] = $row['level7_date'];
                  $dateArray[8] = $row['level8_date'];
                  $user_level = $row['user_level'];
                }

                $query = "SELECT * FROM approvals";
                $result=mysqli_query($con,$query);
                $approvals = [];
                while($row=mysqli_fetch_assoc($result)) {
                  array_push($approvals, $row);
                }

                $query = "SELECT * FROM users WHERE username = '" . $requester . "'";
                $result=mysqli_query($con,$query);
                $userInfor=mysqli_fetch_assoc($result);
              }
            ?>
          </div>
  <div class="kt-portlet">
    <div class="kt-portlet__head">
      <div class="kt-portlet__head-label">
        <h3 class="kt-portlet__head-title">View Purchase Request</h3>
        <h3 class="kt-portlet__head-title"><i class="fas fa-eye header-icon"></h3></i>
      </div>
    </div>
    <!--begin::Form-->           
    <form class="kt-form kt-form--label-right" method="POST" enctype="multipart/form-data">
      <div class="kt-portlet__body">
        <div class="form-group row form-group-marginless kt-margin-t-20">
          <!--Ticket ID start -->
          <label class="col-lg-1 col-form-label">PR Code:</label>
          <div class="col-lg-3">
            <input required name="pr_id" readonly  type="text" class="form-control" value="<?php echo $pr_code?>" >
          </div>
          <!--Ticket ID end -->
          <!--Ticket Subject start -->
          <label class="col-lg-1 col-form-label">Requester:</label>
          <div class="col-lg-3">
            <input required name="owner" readonly  type="text" class="form-control" value="<?php echo $requester ?>" >
          </div>
          <label class="col-lg-1 col-form-label">Request Date:</label>
          <div class="col-lg-3">
            <input required name="owner_date" readonly  type="text" class="form-control" value="<?php echo $request_date ?>" >
          </div>                      
        </div>
        <div class="kt-separator kt-separator--border-dashed kt-separator--space-lg kt-separator--portlet-fit"></div>
        <div class="form-group row form-group-marginless kt-margin-t-20">
          <label class="col-lg-1 col-form-label">Currency:</label>
          <div class="col-lg-3">
            <input required name="owner" readonly  type="text" class="form-control" value="<?php echo $currency ?>" >
          </div>  
          <label class="col-lg-1 col-form-label">Reqire Company:</label>
          <div class="col-lg-3">
            <input required name="owner" readonly  type="text" class="form-control" value="<?php echo $require_company ?>" >
          </div>      
          <label class="col-lg-1 col-form-label">note:</label>
          <div class="col-lg-3">
            <textarea readonly row="2" class="form-control"><?php echo $note ?></textarea>
          </div>                      
        </div>
        <div class="kt-separator kt-separator--border-dashed kt-separator--space-lg kt-separator--portlet-fit"></div>
        <div class="form-group row form-group-marginless kt-margin-t-20">
          <label class="col-lg-1 col-form-label">Supplier:</label>
          <div class="col-lg-5">
            <input required name="owner" readonly  type="text" class="form-control" value="<?php echo $supplier ?>" >
          </div>                             
          <label class="col-lg-1 col-form-label">TASC Site Code:</label>
          <div class="col-lg-5">
            <input required name="owner" readonly  type="text" class="form-control" value="<?php echo $tasc_site_code ?>" >
          </div>                        
        </div> 
        <div class="kt-separator kt-separator--border-dashed kt-separator--space-lg kt-separator--portlet-fit"></div>
        <div class="form-group row form-group-marginless kt-margin-t-20">
          <label class="col-lg-1 col-form-label">attachment:</label>
          <div class="col-lg-4">
            <?php 
              if ( strlen( $attach ) === 0 ) {
                  echo '<a class="btn" id="downloadA"  download>Not Attachment Found</a>';
              } else {
                  echo '<a class="btn" id="downloadA" href="upload/purchase/<?php echo $attach ?>" download><i class="fa fa-download"></i>Download</a>';
              }
            ?>
          </div>   
          <!-- status -->
          <label class="col-lg-1 col-form-label">PR Current Status:</label>
          <div class="col-lg-4">
            <input  name="pr_status" readonly  type="text" class="form-control" value="<?php echo $status ?>" >
          </div>   
          <!-- end status -->                                          
        </div> 
        <div class="kt-separator kt-separator--border-dashed kt-separator--space-lg kt-separator--portlet-fit"></div>
        <div class="form-group row form-group-marginless kt-margin-t-20">
          <label class="col-lg-1 col-form-label">Items:</label>
          <div class="col-lg-11">
            <input required name="owner" readonly  type="text" class="form-control" value="<?php echo $items ?>" >
          </div>                                                     
        </div>   
        <div class="kt-separator kt-separator--border-dashed kt-separator--space-lg kt-separator--portlet-fit"></div>
          <div class="table-responsive">
              <table class="table table-bordered" id="pr_table" width="50%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Material Code</th>
                        <th>Item Description</th>
                        <!--   <th>Unit</th> -->
                        <th>Agreement</th>
                        <th>Quantity</th>
                        <!--    <th>Rate</th> -->
                        <th>Rate</th>
                        <!-- <th>Amount</th> -->
                        <th>Total</th>
                    </tr>
                </thead>
                  <tbody id='tbodyid'>
                    <?php 
                      $items = json_decode($items_array);
                      foreach ($items as $key => $value) {
                    ?>
                        <tr>
                          <td><?php echo $value->material_code ?></td>
                          <td><?php echo $value->item_description ?></td>
                          <td><?php echo $value->Agreement ?></td>
                          <td><?php echo $value->Qty ?></td>
                          <td><?php echo $value->Rate ?></td>
                          <td><?php echo $value->total ?></td>
                        </tr>
                <?php } ?>
                  </tbody>
                  <tfoot id='tfoorid'>
                      <tr>
                        <th colspan="4">Total</th>
                        <th>Net Amount:</th>
                        <th id='net_amount'><?php echo $net_amount ?></th>
                      </tr>
                  </tfoot>
              </table>
              <input hidden id="table_data" name="table_data" /> 
              <input hidden id="net_amount_input" name="net_amount_input" />
          </div>
        </div>
        <div class="kt-portlet__foot">
          <div class="kt-form__actions">
            <div class="row">
              <div class="col-lg-5"></div>
              <div class="col-lg-7">
              </div>
            </div>
          </div>
        </div>
    </form>
    <!--end::Form-->
  </div>
  <div class="container mt-5 mb-5">
	<div class="row">
		<div class="col-md-6 offset-md-3">
			<h4>PR Status</h4>
      <ul class="timeline">
        <?php 
          for($i = $user_level; $i <= 8; $i++){
            if($i == $user_level) {
              echo '<li>';
                echo '<a target="_blank">' . $requester . '</a>';
                echo '<a class="float-right">' . $request_date . '</a>';
                echo '<p>status: submited</p>';
              echo '</li>'; 
            } else {
              foreach($approvals as $value) {
                if($value['level'] == $i) {
                  if($i == 2) {
                    if(strlen(strstr($value['team'], $userInfor['team'])) > 0) {
                      $manager = $value['team'];
                      break;
                    }
                  } else {
                    $manager = $value['team'];
                    break;
                  }
                }
              }

              echo '<li>';
                echo '<a target="_blank">' . $manager . '</a>';
                echo '<a class="float-right">' . $dateArray[$i] . '</a>';
                switch($pr_status) {
                  case 0: $statusText = "Pandding"; break;
                  case 1: $statusText = "Approved"; break;
                  case 2: $statusText = "Rejected"; break;
                  case 3: $statusText = "Requested more infor"; break;
                  default: $statusText = ""; break;
                }
                echo '<p>status: ' . $statusText . '</p>';
                if($pr_status == 2) {
                  echo '<p>Rejected Reason: ' . $reject_text . '</p>';
                } else if($pr_status == 3) {
                  echo '<p>Requested more infor: ' . $request_text . '</p>';
                }
              echo '</li>'; 
            }
 
          }
        ?>
      </ul>
		</div>
	</div>
</div>
             

<?php include('includes/footer.php') ?>
    <!--begin::Page Scripts(used by this page) -->
    <script src="assets/js/pages/custom/users/edit.js" type="text/javascript"></script>