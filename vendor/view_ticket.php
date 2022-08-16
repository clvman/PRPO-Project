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

					<!-- end:: Header -->
					<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

						<!-- begin:: Subheader -->
						 
						<!-- end:: Subheader -->

						<!-- begin:: Content -->
						<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">

							<!--begin::Dashboard 2-->

							<!--begin::Row-->
					<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

						<!-- begin:: Content Head -->
						<div class="kt-subheader   kt-grid__item" id="kt_subheader">
							<div class="kt-container  kt-container--fluid ">
								<div class="kt-subheader__main">
									<h3 class="kt-subheader__title">
										View Ticket 
									</h3>
									<span class="kt-subheader__separator kt-subheader__separator--v"></span>
									<div class="kt-subheader__toolbar" id="kt_subheader_search">
										<span class="kt-subheader__desc" id="kt_subheader_total">
											<?php echo $_GET['ticket_id'] ?> </span>
									</div>
								</div>

							</div>
						</div>

						<!-- end:: Content Head -->

						<!-- begin:: Content -->
						<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">

<?php 
      include('includes/db.php');
      date_default_timezone_set('Asia/Amman'); 
      $ticket_id = $_GET['ticket_id'];
      $sql_ticket_details = " SELECT * FROM `tickets` where `ticket_id` = '$ticket_id' ; ";
      $query_ticket_details = mysqli_query($con,$sql_ticket_details);
      $row_ticket_details = mysqli_fetch_assoc($query_ticket_details);
      $ticket_severity = $row_ticket_details['ticket_severity'];
      $impact = $row_ticket_details['customer_impact'];
      $assigned_to = $row_ticket_details['assigned_to'];
      $impacts_description_name=$row_ticket_details['impact_description'];
      $ticket_status= $row_ticket_details['ticket_status'];
      $ticket_due_date_old= $row_ticket_details['ticket_due_date'];
      $created_on=$row_ticket_details['created_on'];



 ?>




							<div class="kt-portlet kt-portlet--tabs">

								<div class="kt-portlet__head">
									<div class="kt-portlet__head-toolbar">
										<ul class="nav nav-tabs nav-tabs-space-xl nav-tabs-line nav-tabs-bold nav-tabs-line-3x nav-tabs-line-brand" role="tablist">
											<li class="nav-item">
												<a class="nav-link active" data-toggle="tab" href="#kt_users_edit_tab_1" role="tab">
													<i class="flaticon2-calendar-3"></i> Ticket
												</a>
											</li>
									 
										 
									 
											<li class="nav-item">
												<a class="nav-link" data-toggle="tab" href="#kt_users_edit_tab_5" role="tab">
													<i class="flaticon2-calendar-5"></i> Remarks
												</a>
											</li>
										</ul>
									</div>
								</div>
								<div class="kt-portlet__body">
									<form action="" method="POST" id="kt_user_form">

										<!--begin: Tab Content-->
										<div class="tab-content kt-margin-t-20 kt-margin-b-20">

											<!--begin: Tab-->
											<div class="tab-pane active" id="kt_users_edit_tab_1" role="tabpanel">
												<div class="kt-form kt-form--label-right">
													<div class="kt-form__body">
														<div class="kt-section kt-section--first">
															<div class="kt-section__body">
															 

												<div class="form-group row form-group-marginless kt-margin-t-20">
													



                                                  <form class="kt-form kt-form--label-right" method="POST"  >
													<!--Ticket ID start -->
													<label class="col-lg-1 col-form-label">Ticket ID:</label>
													<div class="col-lg-2">
														<input required name="ticket_id" readonly  type="text" class="form-control" value="<?php echo $_GET['ticket_id'] ?>" >
														 
													</div>

													<!--Ticket ID end -->

													<!--Ticket Subject start -->
  		
													<label class="col-lg-1 col-form-label">Ticket Subject:</label>
													<div class="col-lg-3">
														<input readonly required name="ticket_subject" type="text" class="form-control" placeholder="Subject" value="<?php echo $row_ticket_details['ticket_subject'] ?>">
														 
													</div>

													<label class="col-lg-1 col-form-label"> Severity:</label>

													<div class="col-lg-3">
														<input readonly required name="ticket_subject" type="text" class="form-control" placeholder="Subject" value="<?php echo $row_ticket_details['ticket_severity'] ?>">
													
									                												 
													</div>





												</div>
															

<div class="kt-separator kt-separator--border-dashed kt-separator--space-lg kt-separator--portlet-fit"></div>
										<div class="form-group row form-group-marginless kt-margin-t-20">
													
 
													<!--2nd ROW -->

													<label class="col-lg-1 col-form-label"> Impact:</label>

													<div class="col-lg-2">
													
									                <input readonly required name="ticket_subject" type="text" class="form-control" placeholder="Subject" value="<?php echo $row_ticket_details['customer_impact'] ?>">											 
													</div>
  		
 
													<label class="col-lg-1 col-form-label">Customer Name:</label>
													<div class="col-lg-3">
														<input required name="Customer_Name" readonly  type="text" class="form-control" value="<?php echo $row_ticket_details['customer_name'] ?>" >
														 
													</div>



													<label class="col-lg-1 col-form-label">Circuit ID:</label>
													<div class="col-lg-3">
														<input required name="Circuit_ID" readonly  type="text" class="form-control" value="<?php echo $row_ticket_details['circuit_id'] ?>" >
														 
													</div>													
 





												</div>	 


<div class="kt-separator kt-separator--border-dashed kt-separator--space-lg kt-separator--portlet-fit"></div>
										<div class="form-group row form-group-marginless kt-margin-t-20">

												<label class="col-lg-1 col-form-label">Assigned To:</label>
													<div class="col-lg-2">
														 
									                <input readonly required name="ticket_subject" type="text" class="form-control" placeholder="Subject" value="<?php echo $row_ticket_details['assigned_to'] ?>">														 
													</div>

													<label class="col-lg-1 col-form-label">Incident Description:</label>
													<div class="col-lg-3">
														 
									                <input readonly required name="ticket_subject" type="text" class="form-control" placeholder="Subject" value="<?php echo $row_ticket_details['impact_description'] ?>">														 
													</div>



													<label class="col-lg-1 col-form-label">Ticket Description:</label>
													<div class="col-lg-3">
														 
														<textarea readonly  name="ticket_details" required class="form-control" id="exampleTextarea" rows="3"><?php echo $row_ticket_details['ticket_details'] ?>	</textarea>	

													</div>





											</div>


			<div class="kt-separator kt-separator--border-dashed kt-separator--space-lg kt-separator--portlet-fit"></div>
			<div class="form-group row form-group-marginless kt-margin-t-20">

													<label class="col-lg-1 col-form-label">Ticket Status:</label>
													<div class="col-lg-2">
														 
									                <input readonly required name="ticket_subject" type="text" class="form-control" placeholder="Subject" value="<?php echo $row_ticket_details['assigned_to'] ?>">													 
													</div>

													<label class="col-lg-1 col-form-label">Ticket Due Date:</label>
													<div class="col-lg-2">
														<input readonly required name="ticket_due_date" readonly  type="text" class="form-control" value="<?php echo $row_ticket_details['ticket_due_date'] ?>" >
														 
													</div>

												<label class="col-lg-1 col-form-label">Attachment</label>
													<div class="col-lg-3">
														 
													<div class="form-group form-group-last row">
												 
													 
													<button onclick="location.href='download.php?file=<?php echo $row_ticket_details['attachment'] ?>'"  type="button" class="btn btn-focus btn-icon"><i class="fa fa-download"></i></button>

												</div>

													</div>





				</div>



																 
															 
															</div>


														</div>


														<div class="kt-separator kt-separator--space-lg kt-separator--border-dashed"></div>
														<div class="form-group row form-group-marginless kt-margin-t-20"> 

													<label class="col-lg-1 col-form-label">Ticket Last Update:</label>
													<div class="col-lg-2">
														<input required name="ticket_last_update" readonly  type="text" class="form-control" value="<?php echo $row_ticket_details['ticket_last_update'] ?>" >
														 
													</div>

													<label class="col-lg-1 col-form-label">Ticket Status:</label>
													<div class="col-lg-2">
														<input required name="ticket_last_update" readonly  type="text" class="form-control" value="<?php echo $row_ticket_details['ticket_status'] ?>" >
														 
													</div>													

														</div>
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


											</div>

											<!--end: Tab-->
 
<?php 

//this is for inserting  the comments to the DB
if(isset($_POST['add_remark'])) { 

//getting POST variables

$comment = stripslashes($_POST['comment']);
$comment = mysqli_real_escape_string($con,$comment); 
$commenter = $_SESSION['NCE_TT_vendor'];

 // Insert values to comment table

 $sql_add_comment = "INSERT INTO `comment`(`ticket_id`, `commenter`, `comment`) VALUES ";
 $sql_add_comment.= " ( '$ticket_id','$commenter',  '$comment' ) ";
 $result_add_comment = mysqli_query($con,$sql_add_comment);

// selecting last update time for the ticket from comment table

$sql_commen_LastUpdate = " SELECT `comment_datetime` FROM `comment` WHERE `ticket_id`='$ticket_id' order by `comment_datetime` DESC limit 1; ";
$result_commen_LastUpdate = mysqli_query($con, $sql_commen_LastUpdate);
$row_commen_LastUpdate = mysqli_fetch_assoc($result_commen_LastUpdate);
$last_update_time=$row_commen_LastUpdate['comment_datetime'];


// update tickets table to set last update time =
$sql_update_lastUpdated_tickets ="update `tickets` set `ticket_last_update`='$last_update_time' Where `ticket_id` = '$ticket_id' " ;
$result = mysqli_query($con,$sql_update_lastUpdated_tickets);

 echo "<script>alert('Done');</script>" ;
echo "<meta http-equiv='refresh' content='0'>";



} // for  isset


 ?> 

											 

											<!--begin: Tab-->
											<div class="tab-pane" id="kt_users_edit_tab_5" role="tabpanel">
												<div class="row">
													<div class="col-lg-2"></div>
													<div class="col-lg-8">
														<form action="" method="POST" >
															<div class="form-group">
																<textarea class="form-control"  name="comment" id="comment" rows="3" placeholder="Type remark"></textarea>
															</div>
															<div class="row">
																<div class="col">
																	<button value="Update_ticket" name="add_remark" type="Submit" class="btn btn-brand">Add Remark</button>
																	<a href="#" class="btn btn-clean btn-bold">Cancel</a>
																</div>
															</div>
														</form>
														<div class="kt-separator kt-separator--space-lg kt-separator--border-dashed"></div>
														 <div class="kt-notes">
															<div class="kt-notes__items">
																<?php 

$sql_comments = " SELECT * FROM `comment` where `ticket_id` = '$ticket_id' ";
$result_comments = $con->query($sql_comments);
while($row_comments = $result_comments->fetch_assoc()){


																 ?>
																<div class="kt-notes__item">
																	<div class="kt-notes__media">
																		<span class="kt-notes__icon">
																			<i class="fas fa-comment"></i>
																		</span>
																	</div>
																	<div class="kt-notes__content">
																		<div class="kt-notes__section">
																			<div class="kt-notes__info">
																				<a  class="kt-notes__title">
																					<?php echo $row_comments['commenter']; ?>
																				</a>
																				<span class="kt-notes__desc">
																					<?php echo $row_comments['comment_datetime']; ?>
																				</span>
																			</div>
																			 
																		</div>
																		<span class="kt-notes__body">
																			<?php echo $row_comments['comment']; ?>
																		</span>
																	</div>
																</div>
																
																<?php } ?>
																
																
																
																
																
																
															</div>
														</div>
													</div>
													<div class="col-lg-2"></div>
												</div>
											</div>

											<!--end: Tab-->
										</div>


										<!--end: Tab Content-->
									</form>
								</div>
							</div>
						</div>

						<!-- end:: Content -->
					</div>

							<!--end::Row-->

							<!--end::Dashboard 2-->
						</div>

						<!-- end:: Content -->
					</div>



    <script type="text/javascript">

		var optionValues =[];
		$('#severity option').each(function(){
		   if($.inArray(this.value, optionValues) >-1){
		      $(this).remove()
		   }else{
		      optionValues.push(this.value);
		   }
		});
    </script>



		<!--begin::Page Scripts(used by this page) -->
		<script src="assets/js/pages/custom/users/edit.js" type="text/javascript"></script>
<?php include('includes/footer.php') ?>