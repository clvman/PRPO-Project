<?php include('includes/header.php') ;
	  include ('includes/db.php') ;?>		
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.js"></script>
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

			$approvals = $_SESSION['approvals'];
			foreach($approvals as $value) {
				// print_r($value);
				
				if($_SESSION['level'] > 1) {
					if($value['level'] == ($_SESSION['level'] + 1)) {
						$pr_step = $_SESSION['level'] + 1;
						$pr_status = 0;
						$pr_reporting_to = $value['team'];
						// $level2_data = "";
						$pr_email = $value['email'];
						$user_level = $_SESSION['level'];
						$user_report_to = $_SESSION['team_name'];
						break;
					}
				} else if($_SESSION['level'] == 1) {
					if($value['level'] == 2) {
						if(strlen(strstr($value['team'], $_SESSION['team_name'])) > 0) {
							$pr_step = 2;
							$pr_status = 0;							
							$pr_reporting_to = $value['team'];
							// $level2_data = $owner_date;
							$pr_email = $value['email'];
							$user_level = $_SESSION['level'];
							$user_report_to = $_SESSION['team_name'];
							break;
						}
					}
				}
			}

			$pr_status = 0;
			$user_email = $_SESSION['email'];
		 	$query = "INSERT into `submitted_pr` (pr_code, requester, request_date, currency, require_company, supplier, tasc_site_code, net_amount, items, items_array, attach, note, pr_step, pr_status, pr_reporting_to, pr_email_to, user_email_to, user_report_to, user_level) VALUES ('$pr_id', '$owner', '$owner_date', '$currency', '$company', '$supplier', '$tasc_site', '$net_amount_input', '$location', '$table_data', '$attach', '$note', '$pr_step', '$pr_status', '$pr_reporting_to', '$pr_email', '$user_email', '$user_report_to', '$user_level')";		
			$result = mysqli_query($con,$query);
			if($result){
				echo "<script>alert('Purchase request successfully');window.location = 'all_pr.php';</script>" ;
			}		    
    }else{
?>						
							
						 
	<div class="kt-portlet">
		<div class="kt-portlet__head">
			<div class="kt-portlet__head-label">
				<h3 class="kt-portlet__head-title">Create New Purchase Request</h3>
			</div>
		</div>
		<!--begin::Form-->					 
		<form class="kt-form kt-form--label-right" method="POST" enctype="multipart/form-data">
			<div class="kt-portlet__body">
				<div class="form-group row form-group-marginless kt-margin-t-20">
					<!--Ticket ID start -->
					<label class="col-lg-1 col-form-label">PR Code:</label>
					<div class="col-lg-3">
						<input required name="pr_id" readonly  type="text" class="form-control" value="<?php require_once('ticket_id_generator.php')?>" >
					</div>

					<!--Ticket ID end -->

					<!--Ticket Subject start -->

					<label class="col-lg-1 col-form-label">Requester:</label>
					<div class="col-lg-3">
						<input required name="owner" readonly  type="text" class="form-control" value="<?php echo $_SESSION['PRPO_Current_User'] ?>" >
					</div>

					<label class="col-lg-1 col-form-label">Request Date:</label>
					<div class="col-lg-3">
						<input required name="owner_date" readonly  type="text" class="form-control" value="<?php echo date("Y-m-d h:i:sa") ?>" >
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
							<option value="JOD">JOD</option>
							<option value="USD">USD</option>
						</select>	
					</div>	
					<label class="col-lg-1 col-form-label">Requiring Company:</label>
					<div class="col-lg-3">
						<select required class="form-control kt_selectpicker" name="company" data-size="7" data-live-search="true">
							<option value="">Nothing Selected</option>
							<option value="AlMSAR">ALMSAR</option>
							<option value="TASC">TASC</option>
						</select>	
					</div>	
					<label class="col-lg-1 col-form-label">Notes:</label>
					<div class="col-lg-3">
						<textarea name="note" row="2" class="form-control"></textarea>
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
							while($row1 = $result1->fetch_assoc()){
							 echo "<option value='".$row1['tasc_site_code']."'>"."<b>TASC Site Code</b>: ".$row1['tasc_site_code']."&nbsp;&nbsp;&nbsp;<b>Site Name</b>:".$row1['site_name']."</option>";
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
									while($row1 = $result1->fetch_assoc()){
										echo "<option value='".$row1['material_code']."'>".$row1['material_code']."</option>";
									}
								?>
							</select>
					</div>
				</div>		
				<div class="kt-separator kt-separator--border-dashed kt-separator--space-lg kt-separator--portlet-fit"></div>
	            <div class="table-responsive">
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
		                       <th id='net_amount'></th>
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
							<button type="Submit" class="btn btn-brand">Submit</button>
							<button  type="reset" class="btn btn-secondary">Cancel</button>
						</div>
					</div>
				</div>
			</div>
		</form>
		<!--end::Form-->
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
	});
</script>

<!--for components/forms/file-upload/uppy.html  (File Upload) -->
<script src="assets/js/pages/components/forms/file-upload/uppy.js" type="text/javascript"></script>


<?php include('includes/footer.php') ?>