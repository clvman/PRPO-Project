<?php include('includes/header.php') ;
	  include ('includes/db.php') ;?>		
    <style>
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
    <script src="assets/plugins/general/jquery/dist/jquery.js" type="text/javascript"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.js"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> -->
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
                        if (isset($_GET['id'])){
                            $id=$_GET['id'];
                            $query="SELECT * FROM `submitted_pr` WHERE id='$id' ";
                            $result=mysqli_query($con,$query);
                            while($row=mysqli_fetch_assoc($result))
                            {
                              $pr_id = $row['id'];
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

                            $site_array = explode($tasc_site_code, ',');
                            
            
                            $query = "SELECT * FROM users WHERE username = '" . $requester . "'";
                            $result=mysqli_query($con,$query);
                            $userInfor=mysqli_fetch_assoc($result);
                          }
                       
                        if (isset($_POST['location'])){
                                // File upload
                                if($_FILES["fileToUpload"]["name"]) {
                                    $target_dir = "upload/purchase/";
                                    $target_file_name = time() . '-' . basename($_FILES["fileToUpload"]["name"]);
                                    $target_file = $target_dir . $target_file_name;

                                    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                                        $attach = stripslashes($target_file_name);
                                        $attach = mysqli_real_escape_string($con,$attach);
                                    } 
                                } else {
                                    $attach = "";
                                }

                                $pr_id = stripslashes($_POST['pr_id']);
                                $pr_id = mysqli_real_escape_string($con,$pr_id);

                                $pr_code = stripslashes($_POST['pr_code']);
                                $pr_code = mysqli_real_escape_string($con,$pr_code);                                

                                $owner = stripslashes($_POST['owner']);
                                $owner = mysqli_real_escape_string($con,$owner); 

                                $owner_date = stripslashes($_POST['owner_date']);
                                $owner_date = mysqli_real_escape_string($con,$owner_date);

                                $currency = stripslashes($_POST['currency']);
                                $currency = mysqli_real_escape_string($con,$currency);

                                $company = stripslashes($_POST['company']);
                                $company = mysqli_real_escape_string($con,$company);

                                $supplier = stripslashes($_POST['supplier']);
                                $supplier = mysqli_real_escape_string($con,$supplier);

                                $note = stripslashes($_POST['note']);
                                $note = mysqli_real_escape_string($con,$note);

                                $location = stripslashes($_POST['location']);
                                $location = mysqli_real_escape_string($con,$location);		    		    		    

                                $tasc_site = stripslashes($_POST['tasc_site']);
                                $tasc_site = mysqli_real_escape_string($con,$tasc_site);	

                                $table_data = stripslashes($_POST['table_data']);
                                $table_data = mysqli_real_escape_string($con,$table_data);	

                                $net_amount_input = stripslashes($_POST['net_amount_input']);
                                $net_amount_input = mysqli_real_escape_string($con,$net_amount_input);

                                if($pr_status == 2) {
                                    $query = "SELECT * FROM submitted_pr WHERE id = " . $pr_id;
                                    $result = mysqli_query($con,$query);
                                    $pr = mysqli_fetch_assoc($result);
                                    $reject_report_to = $pr['reject_report_to'];
                                    $reject_level = $pr['reject_level'];
                                    
                                    $update_date = "";
                                    for($i = $reject_level; $i <= $pr_step; $i++) {
                                        $update_date .= "level" . $i . "_date = '', ";
                                    }
                                    

                                    $query = "UPDATE submitted_pr SET pr_status = 0, request_date = '" . date("Y-m-d h:i:sa") . "', " . $update_date . " pr_reporting_to = '" . $reject_report_to . "', pr_step = '" . $reject_level . "' WHERE id = " . $pr_id;
                                } else if($pr_status == 3) {
                                    $update_date = "level" . $pr_step . "_date = ''";
                                    $query = "UPDATE submitted_pr SET pr_status = 0, request_date = '" . date("Y-m-d h:i:sa") . "', " . $update_date . " WHERE id = " . $pr_id;
                                } 
                                $result = mysqli_query($con,$query);
                                
                                if($result){
                                    echo "<script>alert('Purchase request successfully');window.location = 'all_pr.php';</script>" ;
                                }		    
                        }else{
                    ?>						
								 
                    <div class="kt-portlet">
                        <div class="kt-portlet__head">
                            <div class="kt-portlet__head-label">
                                <h3 class="kt-portlet__head-title">Edit Purchase</h3>
                                <h3 class="kt-portlet__head-title"><i class="fas fa-edit header-icon"></h3></i>
                            </div>
                        </div>
                        <!--begin::Form-->					 
                        <form class="kt-form kt-form--label-right" method="POST" enctype="multipart/form-data">
                            <div class="kt-portlet__body">
                                <div class="form-group row form-group-marginless kt-margin-t-20">
                                    <!--Ticket ID start -->
                                    <label class="col-lg-1 col-form-label">PR Code:</label>
                                    <div class="col-lg-3">
                                        <input required hidden name="pr_id" readonly  type="text" class="form-control" value="<?php  echo $pr_id ?>" >
                                        <input required name="pr_code" readonly  type="text" class="form-control" value="<?php  echo $pr_code ?>" >
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
                                    <!--Ticket Subject ends -->
                                    <!--Ticket start datetime START Hidden -->									
                                    <input hidden name="created_on" type="text" class="form-control"   value="<?php echo date("Y-m-d h:i:sa"); ?>">
                                    <!--Ticket start datetime END -->
                                    <!--Ticket status START -->
                                </div>
                                <div class="kt-separator kt-separator--border-dashed kt-separator--space-lg kt-separator--portlet-fit"></div>
                                <div class="form-group row form-group-marginless kt-margin-t-20">
                                    <label class="col-lg-1 col-form-label">Currency:</label>
                                    <div class="col-lg-3">
                                        <select required class="form-control kt_selectpicker" name="currency" data-size="7" data-live-search="true">
                                            <option value="">Nothing Selected</option>
                                            <option value="JOD" <?php echo $currency == "JOD" ? 'selected' : null ?> >JOD</option>
                                            <option value="USD" <?php echo $currency == "USD" ? 'selected' : null ?> >USD</option>
                                        </select>	
                                    </div>	
                                    <label class="col-lg-1 col-form-label">Requiring Company:</label>
                                    <div class="col-lg-3">
                                        <select required class="form-control kt_selectpicker" name="company" data-size="7" data-live-search="true">
                                            <option value="">Nothing Selected</option>
                                            <option value="AlMSAR" <?php echo $require_company == "AlMSAR" ? 'selected' : null ?> >ALMSAR</option>
                                            <option value="TASC" <?php echo $require_company == "TASC" ? 'selected' : null ?>>TASC</option>
                                        </select>	
                                    </div>	
                                    <label class="col-lg-1 col-form-label">Notes:</label>
                                    <div class="col-lg-3">
                                        <textarea name="note" row="2" class="form-control"><?php echo $note ?></textarea>
                                    </div>								
                                </div>
                                <div class="kt-separator kt-separator--border-dashed kt-separator--space-lg kt-separator--portlet-fit"></div>
                                <div class="form-group row form-group-marginless kt-margin-t-20">
                                    <label class="col-lg-1 col-form-label">Supplier:</label>
                                    <div class="col-lg-5">
                                        <select required class="form-control kt_selectpicker" name="supplier" data-size="7" data-live-search="true">
                                            <?php
                                                $con1=mysqli_connect('localhost','root','123456','prpo');
                                                $sql1 = "SELECT *  FROM supplier"; 
                                                $result1 = $con1->query($sql1);
                                                while($row1 = $result1->fetch_assoc()){
                                                    echo "<option value='".$row1['supplier_name']."'>".$row1['supplier_name']."</option>";
                                                }
                                            ?>
                                        </select>	
                                    </div>														 
                                    <label class="col-lg-1 col-form-label">TASC Site Code:</label>
                                    <div class="col-lg-5">

                                    <select required class="form-control kt_selectpicker" data-size="7" data-live-search="true" multiple id="site" name="site">
                                        <?php
                                            $sql1 = "SELECT *  FROM sites"; 
                                            $result1 = $con1->query($sql1);
                                            $site_array = explode(',', $tasc_site_code);
                                            while($row1 = $result1->fetch_assoc()){
                                                $flag = false;
                                                foreach($site_array as $value) {
                                                    if(strcmp($value, $row1['tasc_site_code']) == 0) {
                                                        $flag = true;
                                                        break;
                                                    }
                                                }
                                                if($flag == true) {
                                                    echo "<option value='".$row1['tasc_site_code']."' selected>"."<b>TASC Site Code</b>: ".$row1['tasc_site_code']."&nbsp;&nbsp;&nbsp;<b>Site Name</b>:".$row1['site_name']."</option>";
                                                } else {
                                                    echo "<option value='".$row1['tasc_site_code']."' >"."<b>TASC Site Code</b>: ".$row1['tasc_site_code']."&nbsp;&nbsp;&nbsp;<b>Site Name</b>:".$row1['site_name']."</option>";
                                                }
                                                // echo "<option value='".$row1['tasc_site_code']."' selected>"."<b>TASC Site Code</b>: ".$row1['tasc_site_code']."&nbsp;&nbsp;&nbsp;<b>Site Name</b>:".$row1['site_name']."</option>";
                                                //echo "<option value='".$row1['tasc_site_code']."'>"."".$row1['tasc_site_code']."</option>";
                                            }
                                        ?>
                                    </select>
                                    <input type="hidden" name="tasc_site" id="tasc_site" />
                                    </div>												 
                                    <input type="hidden" name="location" id="location" />
                                    <div style="clear:both"></div>
                                </div> 
                                <div class="kt-separator kt-separator--border-dashed kt-separator--space-lg kt-separator--portlet-fit"></div>
                                <div class="form-group row form-group-marginless kt-margin-t-20">
                                    <label class="col-lg-1 col-form-label">Attachment:</label>
                                    <div class="col-lg-11">
                                        <input type="file" class="form-control" name="fileToUpload" id="fileToUpload">
                                    </div>
                                </div>				
                                <div class="kt-separator kt-separator--border-dashed kt-separator--space-lg kt-separator--portlet-fit"></div>
                                <div class="form-group row form-group-marginless kt-margin-t-20">
                                    <label class="col-lg-1 col-form-label">Items:</label>
                                    <div class="col-lg-11">
                                            <select required  class="form-control kt_selectpicker" data-size="7" data-live-search="true" multiple id="items" name="items">
                                                <?php
                                                    $con1=mysqli_connect('localhost','root','123456','prpo');
                                                    $sql1 = "SELECT *  FROM items"; 
                                                    $result1 = $con1->query($sql1);
                                                    $item_array = explode(',', $items);
                                                    while($row1 = $result1->fetch_assoc()){
                                                        $flag = false;
                                                        foreach($item_array as $value) {
                                                            if(strcmp($value, $row1['material_code']) == 0) {
                                                                $flag = true;
                                                                break;
                                                            }
                                                        }
                                                        if($flag == true) {
                                                            echo "<option value='".$row1['material_code']."' selected>".$row1['material_code']."</option>";
                                                        } else {
                                                            echo "<option value='".$row1['material_code']."'>".$row1['material_code']."</option>";
                                                        }
                                                        
                                                    }
                                                ?>
                                            </select>
                                    </div>
                                </div>		
                                <div class="kt-separator kt-separator--border-dashed kt-separator--space-lg kt-separator--portlet-fit"></div>
                                <div class="table-responsive">
                                <table class="table table-bordered" id="pr_table" width="50%" cellspacing="0">
                                    <table class="table table-bordered" id="pr_table" width="100%" cellspacing="0">
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
                                            <button type="Submit" class="btn btn-brand">Resubmit</button>
                                            <button  type="reset" class="btn btn-secondary">Cancel</button>
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
                                    if($request_date == NULL || $request_date == "0000-00-00 00:00:00") {
                                        echo '<a target="_blank">' . $requester . '</a>';
                                    } else {
                                        echo '<a target="_blank">' . $requester . ' (' . $request_date . ')</a>';
                                    }
                                    echo '<p>status: submited</p>';
                                echo '</li>'; 
                                } else if($i < 8) {
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
                                    // echo '<a target="_blank">' . $manager . '</a>';
                                    // echo '<a>' . $dateArray[$i] . '</a>';
                                    // echo "<script>console.log('fdsfdsfdsfsa)</script>";
                                    if($dateArray[$i] == NULL || $dateArray[$i] == "0000-00-00 00:00:00") {
                                    echo '<a target="_blank">' . $manager . '</a>';
                                    } else {
                                    echo '<a target="_blank">' . $manager . ' (' . $dateArray[$i] . ')</a>';
                                    }      
                                    if($i < $pr_step) {
                                    $statusText = "Approved";
                                    } else if($i == $pr_step) {
                                    switch($pr_status) {
                                        case 0: $statusText = "Pandding"; break;
                                        case 1: $statusText = "Approved"; break;
                                        case 2: $statusText = "Rejected"; break;
                                        case 3: $statusText = "Requested more infor"; break;
                                        default: $statusText = ""; break;
                                    }
                                    } else {
                                        $statusText = "Pandding";
                                    }       

                                    echo '<p>status: ' . $statusText . '</p>';
                                    if($pr_status == 2 && $pr_step == $i) {
                                    echo '<p>Rejected Reason: ' . $reject_text . '</p>';
                                    if(strlen( $reject_attach ) > 0) {
                                        echo '<a class="btn" id="downloadA" href="upload/purchase/<?php echo $reject_attach ?>" download><i class="fa fa-download"></i>Download</a>';
                                    }
                                    } else if($pr_status == 3 && $pr_step == $i) {
                                        echo '<p>Requested more infor: ' . $request_text . '</p>';
                                        if(strlen( $request_attach ) > 0) {
                                            echo '<a class="btn" id="downloadA" href="upload/purchase/<?php echo $request_attach ?>" download><i class="fa fa-download"></i>Download</a>';
                                        }                  
                                    }
                                echo '</li>'; 
                                } else if($i == 8) {
                                echo '<li>';
                                    if($dateArray[$i] == NULL || $dateArray[$i] == "0000-00-00 00:00:00") {
                                    echo '<a target="_blank">Final</a>';
                                    } else {
                                    echo '<a target="_blank">Final (' . $dateArray[$i] . ')</a>';
                                    } 
                                    echo '<p>status: ' . $status . '</p>';
                                echo '</li>';               
                                }
                    
                            }
                            ?>
                        </ul>
                            </div>
                        </div>
	    </div>	 
	<!--end::Row-->
	<!--end::Dashboard 2-->
<!-- end:: Content -->
 <?php } ?>				 
<script type="text/javascript">
	$(document).ready(function() {
		function checkEnter(e){
		 e = e || event;
		 var txtArea = /textarea/i.test((e.target || e.srcElement).tagName);
		 return txtArea || (e.keyCode || e.which || e.charCode || 0) !== 13;
		}

		$("#site").change(function(){
			$('#tasc_site').val($('#site').val());
		})

		$('#items').change(function(){
			$('#location').val($('#items').val());
			var searchQuery = $('#location').val();
			$.ajax({
				url:"live_search.php",
				method:"POST",
				dataType: "json",
				data:{query: searchQuery},
				success:function(response) {
					var tbody_content = "";
					var netAmount = 0;
					var table_data_array = [];
					var table_json = $("#table_data").val();
					// var table_array = JSON.parse($("#table_data").val());

					if(response.length > 0) {
						if(table_json != '') {
							var table_array = JSON.parse(table_json);
							for(var i = 0; i < response.length; i++) {
								for(var j = 0; j < table_array.length; j++) {
									if(response[i]['id'] == table_array[j]['id']) {
										response[i] = table_array[j];
										break;
									}
								}
							}
						}

						for(var i = 0; i < response.length; i++) {
							var item_array = response[i];
							// quantity input tag
							var quantity_input = "<input required type='number' class='qty_input form-control col-4' min='1'  name='qty_id' value='" +response[i]['Qty']+"'/>";

							var rate_content = "";
							var rate_td = "";
							var total = 0;

							if(response[i]['Agreement'] == "No") {
								rate_content = "<input required type='number' class='rate_input form-control col-4' min='1'  name='rate_id' value='1' />";
								rate_td = "<td class='rate_td' data='1'>"+rate_content+"</td>";
								total = response[i]['Qty'];
							} else {
								// rate input tag
								rate_content = response[i]['Rate'];
								rate_td = "<td class='rate_td' data="+response[i]['Rate']+">"+rate_content+"</td>";
								total = response[i]['Qty'] * response[i]['Rate'];								
							}

							tbody_content += "<tr class='items' row-id='"+response[i]["id"]+"'>"+
												"<td>"+response[i]['material_code']+"</td>"+
												"<td>"+response[i]['item_description']+"</td>"+
												"<td>"+response[i]['Agreement']+"</td>"+
												"<td class='qty_td' data="+response[i]['Qty']+">"+quantity_input+"</td>"+
												rate_td+
												// "<td>"+response[i]['Amount']+"</td>"+
												"<td class='total'>"+total+"</td>"+
											"</tr>";
							netAmount += parseInt(total);
							item_array['total'] = total;
							table_data_array.push(item_array);
						}
					}
					$("#net_amount_input").val(netAmount);
					$("#table_data").val(JSON.stringify(table_data_array));
					$("#tbodyid").html(tbody_content);

					if(netAmount == 0) {
						$("#net_amount").text('');
					} else {
						$("#net_amount").text(netAmount);
					}
				}
			});
		})

		$('#items').selectpicker({
		  noneResultsText: 'No results matched: <a href="add_item.php"> Create New Item </a>'
		});

		$("tbody").on("change", ".qty_input", function() {
			var qty = $(this).val();
			$(this).parent().attr('data', qty);
			var id = $(this).parents('tr').attr('row-id');
			var rate = $(this).parent().siblings('.rate_td').attr('data');
			var total = parseInt(qty) * parseInt(rate);
			$(this).parent().siblings('.total').text(total);

			var net_amount = 0;

			var table_data_json = $("#table_data").val();
			var table_data = JSON.parse(table_data_json);
			$("tbody tr").each(function(index){
				for(var i = 0; i < table_data.length; i++) {
					if(table_data[i]['id'] == id) {
						table_data[i]['Qty'] = qty;
						table_data[i]['Rate'] = rate;
						table_data[i]['Qty'] = qty;
						table_data[i]['total'] = total;
						break;
					}
				}
				var total_td = $(this).children('.total');
				net_amount += parseInt($(total_td).text());
			})
			$("#net_amount_input").val(net_amount);
			$("#net_amount").text(net_amount);
			$("#table_data").val(JSON.stringify(table_data));
		})
		$("tbody").on("change", ".rate_input", function() {
			var rate = $(this).val();
			$(this).parent().attr('data', rate);
			var id = $(this).parents('tr').attr('row-id');
			var qty = $(this).parent().siblings('.qty_td').attr('data');
			var total = parseInt(qty) * parseInt(rate);
			$(this).parent().siblings('.total').text(total);

			var net_amount = 0;

			var table_data_json = $("#table_data").val();
			var table_data = JSON.parse(table_data_json);
			$("tbody tr").each(function(index){
				for(var i = 0; i < table_data.length; i++) {
					if(table_data[i]['id'] == id) {
						table_data[i]['Qty'] = qty;
						table_data[i]['Rate'] = rate;
						table_data[i]['Qty'] = qty;
						table_data[i]['total'] = total;
						break;
					}
				}				
				var total_td = $(this).children('.total');
				net_amount += parseInt($(total_td).text());
			})
			$("#net_amount_input").val(net_amount);
			$("#net_amount").text(net_amount);
			$("#table_data").val(JSON.stringify(table_data));						
		})

        $('#location').val($('#items').val());
			var searchQuery = $('#location').val();
			$.ajax({
				url:"live_search.php",
				method:"POST",
				dataType: "json",
				data:{query: searchQuery},
				success:function(response) {
					var tbody_content = "";
					var netAmount = 0;
					var table_data_array = [];
					var table_json = $("#table_data").val();
					// var table_array = JSON.parse($("#table_data").val());

					if(response.length > 0) {
						if(table_json != '') {
							var table_array = JSON.parse(table_json);
							for(var i = 0; i < response.length; i++) {
								for(var j = 0; j < table_array.length; j++) {
									if(response[i]['id'] == table_array[j]['id']) {
										response[i] = table_array[j];
										break;
									}
								}
							}
						}

						for(var i = 0; i < response.length; i++) {
							var item_array = response[i];
							// quantity input tag
							var quantity_input = "<input required type='number' class='qty_input form-control col-4' min='1'  name='qty_id' value='" +response[i]['Qty']+"'/>";

							var rate_content = "";
							var rate_td = "";
							var total = 0;

							if(response[i]['Agreement'] == "No") {
								rate_content = "<input required type='number' class='rate_input form-control col-4' min='1'  name='rate_id' value='1' />";
								rate_td = "<td class='rate_td' data='1'>"+rate_content+"</td>";
								total = response[i]['Qty'];
							} else {
								// rate input tag
								rate_content = response[i]['Rate'];
								rate_td = "<td class='rate_td' data="+response[i]['Rate']+">"+rate_content+"</td>";
								total = response[i]['Qty'] * response[i]['Rate'];								
							}

							tbody_content += "<tr class='items' row-id='"+response[i]["id"]+"'>"+
												"<td>"+response[i]['material_code']+"</td>"+
												"<td>"+response[i]['item_description']+"</td>"+
												"<td>"+response[i]['Agreement']+"</td>"+
												"<td class='qty_td' data="+response[i]['Qty']+">"+quantity_input+"</td>"+
												rate_td+
												// "<td>"+response[i]['Amount']+"</td>"+
												"<td class='total'>"+total+"</td>"+
											"</tr>";
							netAmount += parseInt(total);
							item_array['total'] = total;
							table_data_array.push(item_array);
						}
					}
					$("#net_amount_input").val(netAmount);
					$("#table_data").val(JSON.stringify(table_data_array));
					$("#tbodyid").html(tbody_content);

					if(netAmount == 0) {
						$("#net_amount").text('');
					} else {
						$("#net_amount").text(netAmount);
					}
				}
			});
	});
</script>

<!--for components/forms/file-upload/uppy.html  (File Upload) -->
<script src="assets/js/pages/components/forms/file-upload/uppy.js" type="text/javascript"></script>


<?php include('includes/footer.php') ?>