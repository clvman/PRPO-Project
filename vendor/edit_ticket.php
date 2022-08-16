<?php include('includes/header.php') ;?>		
<script>
$(document).ready(function(){
	$('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
		localStorage.setItem('activeTab', $(e.target).attr('href'));
	});
	var activeTab = localStorage.getItem('activeTab');
	if(activeTab){
		$('#myTab a[href="' + activeTab + '"]').tab('show');
	}
});
</script>
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
<script src="https://code.jquery.com/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
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
										Edit Ticket
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
      $sql_ticket_details = " SELECT * FROM `tickets2` where `ticket_id` = '$ticket_id' ; ";
      $query_ticket_details = mysqli_query($con,$sql_ticket_details);
      $row_ticket_details = mysqli_fetch_assoc($query_ticket_details);
      $domain = $row_ticket_details['domain'];
      $service_impact = $row_ticket_details['service_impact'];
      $owner = $row_ticket_details['owner'];
      $screen=$row_ticket_details['screen'];
      $Scenario= $row_ticket_details['Scenario'];
      $description= $row_ticket_details['description'];
      $created_on=$row_ticket_details['created_on'];

      $attachment= $row_ticket_details['attachment'];
      $status= $row_ticket_details['status'];
      $severity=$row_ticket_details['severity'];
      $editor = $_SESSION['NCE_TT_vendor'];
      $commenter = $_SESSION['NCE_TT_vendor'];

 ?>



<?php 

  


   if(isset($_POST['Update_ticket'])) { 


    //echo '222';	
    

    $ticket_id = stripslashes($_POST['ticket_id']);
    $domain = stripslashes($_POST['domain']);
     
    //$created_on = stripslashes($_POST['created_on']);
    $Status = stripslashes($_POST['Status']);
    $Service_Impact = stripslashes($_POST['Service_Impact']);

    $Owner = stripslashes($_POST['Owner']);
    $screen = stripslashes($_POST['Screen']);
    //echo 'screen '.$screen.'<br>';
    $Scenario = stripslashes($_POST['Scenario']);
    $Description = stripslashes($_POST['Description']);
    $Severity = stripslashes($_POST['severity']);

    //  getting the new MTTR (Initial SLA)
    //$query_initial_SLA= "SELECT `MTTR` FROM `sla_rules` WHERE `severity` = '{$severity}' AND `impact` = '{$impact}' ";
   //$result_initial_SLA = mysqli_query($con, $query_initial_SLA);
   //$row_initial_SLA = mysqli_fetch_assoc($result_initial_SLA);
   //$SLA_hour=$row_initial_SLA['MTTR'];
   //$SLA=((int)$row_initial_SLA['MTTR'])*60;
    
    // getting the customer travel Distance
    
    //$query_SLA = "SELECT `customer_distance` FROM `wholesales`.`wholesale_customers` WHERE `Circuit_ID` = '{$Circuit_ID}'";
    //$result_SLA = mysqli_query($con, $query_SLA);
    //$row_SLA = mysqli_fetch_assoc($result_SLA);
    //$total_SLA_minutes=$SLA+(float)$row_SLA['customer_distance'];    

   // calculations
   //$cust_distance=$row_SLA['customer_distance'];
   //$total_SLA_master= $SLA+$row_SLA['customer_distance'];


   // getting the new ticket due date

   //$ticket_due_date2=date('Y-m-d H:i:s',strtotime(''.(int)($SLA+$row_SLA['customer_distance']).' minutes',strtotime($created_on)));
   //echo 'OLD = '.$ticket_due_date_old.', the new ticket due date is :'.$ticket_due_date2.'<br>';


   // updating tickets table    

   $sql_tickets_update= "UPDATE `tickets2` SET  ";
    $sql_tickets_update .= " `status`= '{$Status}', ";
   $sql_tickets_update .= " `service_impact`='{$Service_Impact}', ";
   $sql_tickets_update .= " `screen`='{$screen}', ";
   $sql_tickets_update .= " `Scenario`='{$Scenario}', ";
   $sql_tickets_update .= " `description`='{$Description}' , ";
   $sql_tickets_update .= " `severity`='{$Severity}'  , ";
   $sql_tickets_update .= " `last_updated_on`= now() ";

   $sql_tickets_update .=  " WHERE `ticket_id` ='{$ticket_id}' ";
   // echo $sql_tickets_update;
   $result_tickets_update = mysqli_query($con,$sql_tickets_update);

// logging logs


    	$sql_logging="INSERT INTO `tickets2_logs`(`ticket_id`, `by_`, `type`) VALUES  ('{$ticket_id}','$editor','Ticket Update') ";
        $result_logging = mysqli_query($con,$sql_logging);

//$Owner= $_SESSION['NCE_TT_vendor'];
$sql_owner_teams ="Select * from `users` WHERE username='$owner' ";
//echo $sql_owner_teams.'<br>';
$query__owner_teams= mysqli_query($con,$sql_owner_teams);
$row_owner_teams = mysqli_fetch_assoc($query__owner_teams);
$owners_team= $row_owner_teams['team'];
$owners_email= $row_owner_teams['email'];


// getting email address from teams table

$sql_team_address ="Select * from `teams` WHERE team_name='$owners_team' ";
$query_team_address= mysqli_query($con,$sql_team_address);
$row_team_address = mysqli_fetch_assoc($query_team_address);
$teams_address= $row_team_address['team_email'];


// getting vendor email

$sql_vendor_address ="Select * from `teams` WHERE role='Vendor' limit 1 ";
$query_vendor_address= mysqli_query($con,$sql_vendor_address);
$row_vendor_address = mysqli_fetch_assoc($query_vendor_address);
$vendor_address= $row_vendor_address['team_email'];


// getting Admins email
$sql_admin_address ="Select * from `teams` WHERE role='Admin' limit 1 ";
$query_admin_address= mysqli_query($con,$sql_admin_address);
$row_admin_address = mysqli_fetch_assoc($query_admin_address);
$admin_address= $row_admin_address['team_email'];

//echo 'Requester email is '.$owners_email.'<br>';
//echo 'Requesters team email is '.$teams_address.'<br>';
//echo 'vendor   email is '.$vendor_address.'<br>';
//echo 'Admins  email is '.$admin_address.'<br>';


// Sending Email to all above email addresess 

$total_html='<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>

<p>Dears,</p>
<p><b>Ticket ID</b> '.$ticket_id.' has been updated by<b> '.$editor.'</b> with below details:</p>

<p><b>Product Domain</b> : '.$domain.'</p>
<p><b>Ticket Status</b> : '.$Status.'</p>
<p><b>Service Impact</b> : '.$Service_Impact.' </p>
<p>Click on below link to view more details</p>
<p><a href="http://192.168.7.6/NCE/vendor/login.php">Vendor Portal</a></p>
<p><a href="http://192.168.7.6/NCE/end_user/login.php">End User Portal</a></p>

<p>Best Regards,</p>
<p>Procurement System</p></a>



';
         $subject ='New Update on Ticket '.$ticket_id;
         $to =$vendor_address;
         $message =$total_html;
         $headers = "MIME-Version: 1.0" . "\r\n";
         $headers .= 'Cc:'.$owners_email.','.$teams_address.','.$admin_address."\r\n";
         $headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
         $headers .= 'From:  NCE Trouble Ticketing<NCE.Trouble.Ticketing@jo.zain.com>' . "\r\n";
         $headers .=  "\r\n";
         // echo 'TO : '.$vendor_address.'<br>'; 
         //mail($to,$subject,$message,$headers);


  $fp=fopen('update_ticket_email.php','w');

// fwrite($fp, '<?php $total_html=\' ');
// fwrite($fp, $total_html);
// fwrite($fp,'\';');


fwrite($fp, ' <?php $subject=\' ');
fwrite($fp, $subject);
fwrite($fp,'\';');

fwrite($fp, ' $to=\' ');
fwrite($fp, $to);
fwrite($fp,'\';');

fwrite($fp, ' $message=\' ');
fwrite($fp, $message);
fwrite($fp,'\';');

fwrite($fp, ' $headers=\'');
fwrite($fp, $headers);
fwrite($fp,'\';');


 
fwrite($fp, 'mail($to,$subject,$message,$headers)' );
fwrite($fp,' ?>');
fclose($fp);

pclose(popen("start /B C:/xampp/php/php.exe C:/xampp/htdocs/NCE/vendor/update_ticket_email.php","w"));


echo "<script>alert('Done');</script>" ;
echo "<meta http-equiv='refresh' content='0'>";

   // getting the Team Leader Esclations


	//$sql_esclate_after_minutes ="Select Escalate_After from `escalation_rules` WHERE severity='$severity' AND Impact='$impact' AND Management_Role ='Team Leader' ";
	//$query__esclate_after_minutes = mysqli_query($con,$sql_esclate_after_minutes);
	//$row_esclate_after_minutes = mysqli_fetch_assoc($query__esclate_after_minutes);
	//$minutes= (int)$row_esclate_after_minutes['Escalate_After'];                

	//$next_reminder_team_leader=date('Y-m-d H:i:s',strtotime(''.(int)$minutes.' minutes',strtotime($ticket_due_date2)));



	//$sql_team_leader_escalation_logs="UPDATE `team_leader_escalation_logs` SET ";
	//$sql_team_leader_escalation_logs .= "`ticket_due_date`='{$ticket_due_date2}',";
	//$sql_team_leader_escalation_logs .= "`team_leader_reminder`='{$next_reminder_team_leader}' WHERE `ticket_id` ='{$ticket_id}'";
	//$result = mysqli_query($con,$sql_team_leader_escalation_logs);  


   // Team Manager Escalation

	//$sql_esclate_after_minutes ="Select Escalate_After from `escalation_rules` WHERE severity='$severity' AND Impact='$impact' AND Management_Role ='Team Manager' ";
	//$query__esclate_after_minutes = mysqli_query($con,$sql_esclate_after_minutes);
	//$row_esclate_after_minutes = mysqli_fetch_assoc($query__esclate_after_minutes);
	//$minutes= (int)$row_esclate_after_minutes['Escalate_After'];                

	//$next_reminder_team_manager=date('Y-m-d H:i:s',strtotime(''.(int)$minutes.' minutes',strtotime($ticket_due_date2)));

	//$sql_team_manager_escalation_logs="UPDATE `team_manager_escalation_logs` SET ";
	//$sql_team_manager_escalation_logs .= "`ticket_due_date`='{$ticket_due_date2}',";
	//$sql_team_manager_escalation_logs .= "`team_manager_reminder`='{$next_reminder_team_manager}' WHERE `ticket_id` ='{$ticket_id}'";
	//$result = mysqli_query($con,$sql_team_manager_escalation_logs);  


    // resolution Part 
    if(isset($_POST['resolved_code'])) { 

$target = "attachments/";
$target = $target . basename( $_FILES['res_attachment']['name']);
//This gets all the other information from the form
$Filename=basename( $_FILES['res_attachment']['name']);

//Writes the Filename to the server
if(move_uploaded_file($_FILES['res_attachment']['tmp_name'], $target)) {
    //Tells you if its all ok
    $nothing='nothing';
    
} else {
    //Gives and error if its not
    $nothing='nothing';
}



 
     


     }  // for the Isset of resolved_code 
    

	


   } // for the if isset

      if(isset($_POST['resolved_text'])) { 


      $target = "attachments/";
$target = $target . basename( $_FILES['res_attachment']['name']);
//This gets all the other information from the form
$Filename=basename( $_FILES['res_attachment']['name']);

//Writes the Filename to the server
if(move_uploaded_file($_FILES['res_attachment']['tmp_name'], $target)) {
    //Tells you if its all ok
    $nothing='nothing';
    
} else {
    //Gives and error if its not
    $nothing='nothing';
}


    	$resolved_reason = stripslashes($_POST['resolved_text']);
    	$sql_resolved_code="INSERT INTO `resolved_tickets`(`ticket_id`,`resolve_text`,`Attachment`) VALUES ('$ticket_id','$resolved_reason','{$_FILES['res_attachment']['name']}') ";
        $result_resolved_code = mysqli_query($con,$sql_resolved_code);

   $sql_tickets_update= "UPDATE `tickets2` SET  ";
   $sql_tickets_update .= " `status`= 'Resolved', ";
   $sql_tickets_update .= " `last_updated_on`= now() , ";
    $sql_tickets_update .= " `resolution_date`= now() ";
   $sql_tickets_update .=  " WHERE `ticket_id` ='{$ticket_id}' ";
   $result_tickets_update = mysqli_query($con,$sql_tickets_update);


    	$sql_logging="INSERT INTO `tickets2_logs`(`ticket_id`, `by_`, `type`) VALUES  ('{$ticket_id}','$editor','Ticket Resolved') ";
        $result_logging = mysqli_query($con,$sql_logging);

 $sql_add_comment = "INSERT INTO `comment`( `ticket_id`, `commenter`, `comment`, `attachment`) VALUES ";
 $resolution_comment = 'Resolution: '.$resolved_reason;
 $sql_add_comment.= " ( '$ticket_id','$commenter', '$resolution_comment '  ,'{$_FILES['res_attachment']['name']}') ";
 $result_add_comment = mysqli_query($con,$sql_add_comment);


//$Owner= $_SESSION['NCE_TT_vendor'];
$sql_owner_teams ="Select * from `users` WHERE username='$owner' ";
//echo $sql_owner_teams.'<br>';
$query__owner_teams= mysqli_query($con,$sql_owner_teams);
$row_owner_teams = mysqli_fetch_assoc($query__owner_teams);
$owners_team= $row_owner_teams['team'];
$owners_email= $row_owner_teams['email'];


// getting email address from teams table

$sql_team_address ="Select * from `teams` WHERE team_name='$owners_team' ";
$query_team_address= mysqli_query($con,$sql_team_address);
$row_team_address = mysqli_fetch_assoc($query_team_address);
$teams_address= $row_team_address['team_email'];


// getting vendor email

$sql_vendor_address ="Select * from `teams` WHERE role='Vendor' limit 1 ";
$query_vendor_address= mysqli_query($con,$sql_vendor_address);
$row_vendor_address = mysqli_fetch_assoc($query_vendor_address);
$vendor_address= $row_vendor_address['team_email'];


// getting Admins email
$sql_admin_address ="Select * from `teams` WHERE role='Admin' limit 1 ";
$query_admin_address= mysqli_query($con,$sql_admin_address);
$row_admin_address = mysqli_fetch_assoc($query_admin_address);
$admin_address= $row_admin_address['team_email'];

//echo 'Requester email is '.$owners_email.'<br>';
//echo 'Requesters team email is '.$teams_address.'<br>';
//echo 'vendor   email is '.$vendor_address.'<br>';
//echo 'Admins  email is '.$admin_address.'<br>';


// Sending Email to all above email addresess 

$total_html='<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>

<p>Dears,</p>
<p><b>Ticket ID</b> '.$ticket_id.' has been Resolved by<b> '.$editor.'</b> 
<p>Click on below link to view more details</p>
<p><a href="http://192.168.7.6/NCE/vendor/login.php">Vendor Portal</a></p>
<p><a href="http://192.168.7.6/NCE/end_user/login.php">End User Portal</a></p>

<p>Best Regards,</p>
<p>Procurement System</p></a>



';
         $subject ='Ticket '.$ticket_id.' has been Resolved';
         $to =$vendor_address;
         $message =$total_html;
         $headers = "MIME-Version: 1.0" . "\r\n";
         $headers .= 'Cc:'.$owners_email.','.$teams_address.','.$admin_address."\r\n";
         $headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
         $headers .= 'From:  NCE Trouble Ticketing<NCE.Trouble.Ticketing@jo.zain.com>' . "\r\n";
         $headers .=  "\r\n";
         // echo 'TO : '.$vendor_address.'<br>'; 
         //mail($to,$subject,$message,$headers);


  $fp=fopen('resolve_ticket_email.php','w');

// fwrite($fp, '<?php $total_html=\' ');
// fwrite($fp, $total_html);
// fwrite($fp,'\';');


fwrite($fp, ' <?php $subject=\' ');
fwrite($fp, $subject);
fwrite($fp,'\';');

fwrite($fp, ' $to=\' ');
fwrite($fp, $to);
fwrite($fp,'\';');

fwrite($fp, ' $message=\' ');
fwrite($fp, $message);
fwrite($fp,'\';');

fwrite($fp, ' $headers=\'');
fwrite($fp, $headers);
fwrite($fp,'\';');


 
fwrite($fp, 'mail($to,$subject,$message,$headers)' );
fwrite($fp,' ?>');
fclose($fp);

pclose(popen("start /B C:/xampp/php/php.exe C:/xampp/htdocs/NCE/vendor/resolve_ticket_email.php","w"));



echo "<script>alert('Done');</script>" ;
echo "<meta http-equiv='refresh' content='0'>";
   // echo $sql_tickets_update;

    }
 ?>
							<div class="kt-portlet kt-portlet--tabs">

								 
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
													<div class="col-lg-3">
														<input required name="ticket_id" readonly  type="text" class="form-control" value="<?php echo $_GET['ticket_id'] ?>" >
														 
													</div>
													<label class="col-lg-1 col-form-label">Created On:</label>
													<div class="col-lg-3">
														<input required name="created_on" readonly  type="text" class="form-control" value="<?php echo $created_on ?>" >
														 
													</div>													

													<!--Ticket ID end created_on --> 

													<!--Ticket Subject start -->
  		
													<label class="col-lg-1 col-form-label">Domain:</label>
													<div class="col-lg-3">
				<input readonly required name="domain" type="text" class="form-control"  value="<?php echo $row_ticket_details['domain'] ?>">
														 
													</div>







												</div>
															

<div class="kt-separator kt-separator--border-dashed kt-separator--space-lg kt-separator--portlet-fit"></div>
										<div class="form-group row form-group-marginless kt-margin-t-20">
													
 
													<!--2nd ROW -->


													<label class="col-lg-1 col-form-label"> Status:</label>

													<div class="col-lg-3">
													
									                <select  required name="Status" id="Status" class="form-control">
									                   
														<option selected value="<?php echo $row_ticket_details['status'] ?>" ><?php echo $row_ticket_details['status'] ?>  </option>

														<option value="Pending">Pending</option>
														<option value="Suspended">Suspended</option>
														<option value="Resolved">Resolved</option>


									                </select>												 
													</div>


													<label class="col-lg-1 col-form-label"> Service Impact:</label>

													<div class="col-lg-3">
													
									                <select  required name="Service_Impact" id="Service_Impact" class="form-control">
									                   
														<option selected value="<?php echo $row_ticket_details['service_impact'] ?>" ><?php echo $row_ticket_details['service_impact'] ?>  </option>

									                    <option value="Yes">Yes</option>
														<option value="No">No</option>


									                </select>												 
													</div>
  															<label class="col-lg-1 col-form-label">Last Updated:</label>
													<div class="col-lg-3">

														
														<input required name="created_on" readonly  type="text" class="form-control" value="<?php echo $row_ticket_details['last_updated_on'] ?>" >
														 
													</div>	

 
											
 





												</div>	 

<div class="kt-separator kt-separator--border-dashed kt-separator--space-lg kt-separator--portlet-fit"></div>
										<div class="form-group row form-group-marginless kt-margin-t-20">


													<label class="col-lg-1 col-form-label">Owner:</label>
													<div class="col-lg-3">
														<input required name="Owner" readonly  type="text" class="form-control" value="<?php echo $row_ticket_details['owner'] ?>" >
														 
													</div>



													<label class="col-lg-1 col-form-label"> Severity:</label>

													<div class="col-lg-3">
													
									                <select  required name="severity" id="severity" class="form-control">
									                   
														<option selected value="<?php echo $row_ticket_details['severity'] ?>" ><?php echo $row_ticket_details['severity'] ?>  </option>

														<option value="Critical">Critical</option>
														<option value="Major">Major</option>
														<option value="Minor">Minor</option>


									                </select>												 
													</div>	


											</div>	 
<div class="kt-separator kt-separator--border-dashed kt-separator--space-lg kt-separator--portlet-fit"></div>
										<div class="form-group row form-group-marginless kt-margin-t-20">

												

													



													<label class="col-lg-1 col-form-label">  Screen:</label>
													<div class="col-lg-3">
														 
														<textarea name="Screen" required class="form-control" id="Screen" rows="3"><?php echo $row_ticket_details['screen'] ?>	</textarea>	

													</div>

													<label class="col-lg-1 col-form-label">  Scenario:</label>
													<div class="col-lg-3">
														 
														<textarea name="Scenario" required class="form-control" id="Scenario" rows="3"><?php echo $row_ticket_details['Scenario'] ?>	</textarea>	

													</div>

													<label class="col-lg-1 col-form-label">  Description:</label>
													<div class="col-lg-3">
														 
														<textarea name="Description" required class="form-control" id="Description" rows="3"><?php echo $row_ticket_details['description'] ?>	</textarea>	

													</div>


											</div>


			<div class="kt-separator kt-separator--border-dashed kt-separator--space-lg kt-separator--portlet-fit"></div>
			<div class="form-group row form-group-marginless kt-margin-t-20">

													

 	
												<div><label class="col-lg-1 col-form-label" >Attachment</label></div>
													<div class="col-lg-2">
														 
													<div class="form-group form-group-last row">
												 
													 
													<button onclick="location.href='download.php?file=<?php echo $row_ticket_details['attachment'] ?>'"  type="button" class="btn btn-focus btn-icon"><i class="fa fa-download"></i></button>

												</div>

													</div>


<div class="col-lg-7">
															<button value="Update_ticket" name="Update_ticket" type="Submit" class="btn btn-brand">Update</button>
															<button  onclick = "clear_inputs()" type="reset" class="btn btn-secondary">Cancel</button>
														</div>


				</div>



																 
															 
															</div>


														</div>


														 
														 <br>
													</div>
												</div>

												<div class="kt-separator kt-separator--space-lg kt-separator--border-dashed"></div>	 

											
												</form> 

<div class="row">
	<?php 

//this is for inserting  the comments to the DB
if(isset($_POST['add_remark'])) { 

//getting POST variables
// echo "<script>document.getElementById('remarks').click();</script>";

	//remark_attachment
$target = "attachments/";
$target = $target . basename( $_FILES['remark_attachment']['name']);
//This gets all the other information from the form
$Filename=basename( $_FILES['remark_attachment']['name']);

//Writes the Filename to the server
if(move_uploaded_file($_FILES['remark_attachment']['tmp_name'], $target)) {
    //Tells you if its all ok
    $nothing='nothing';
    
} else {
    //Gives and error if its not
    $nothing='nothing';
}





$comment = stripslashes($_POST['comment']);
$comment = mysqli_real_escape_string($con,$comment); 
// $comment = nl2br($comment);
$comment=str_replace("\r\n", "", $comment);
$commenter = $_SESSION['NCE_TT_vendor'];

 // Insert values to comment table

 $sql_add_comment = "INSERT INTO `comment`( `ticket_id`, `commenter`, `comment`, `attachment`) VALUES ";
 $sql_add_comment.= " ( '$ticket_id','$commenter',  '$comment' ,'{$_FILES['remark_attachment']['name']}') ";
 $result_add_comment = mysqli_query($con,$sql_add_comment);

// selecting last update time for the ticket from comment table

$sql_commen_LastUpdate = " SELECT `comment_datetime` FROM `comment` WHERE `ticket_id`='$ticket_id' order by `comment_datetime` DESC limit 1; ";
$result_commen_LastUpdate = mysqli_query($con, $sql_commen_LastUpdate);
$row_commen_LastUpdate = mysqli_fetch_assoc($result_commen_LastUpdate);
$last_update_time=$row_commen_LastUpdate['comment_datetime'];


// update tickets table to set last update time =
$sql_update_lastUpdated_tickets ="update `tickets` set `ticket_last_update`='$last_update_time' Where `ticket_id` = '$ticket_id' " ;
$result = mysqli_query($con,$sql_update_lastUpdated_tickets);






   $sql_tickets_last_update= "UPDATE `tickets2` SET  ";
  
   $sql_tickets_last_update .= " `last_updated_on`= now() ";

   $sql_tickets_last_update .=  " WHERE `ticket_id` ='{$ticket_id}' ";
   // echo $sql_tickets_last_update;
   $result_tickets_update_last = mysqli_query($con,$sql_tickets_last_update);


// getting requesters' team email
//$Owner=$_SESSION['NCE_TT_vendor'] ; 
$sql_owner_teams ="Select * from `users` WHERE username='$owner' ";
//echo $sql_owner_teams.'<br>';
$query__owner_teams= mysqli_query($con,$sql_owner_teams);
$row_owner_teams = mysqli_fetch_assoc($query__owner_teams);
$owners_team= $row_owner_teams['team'];
$owners_email= $row_owner_teams['email'];


// getting email address from teams table

$sql_team_address ="Select * from `teams` WHERE team_name='$owners_team' ";
$query_team_address= mysqli_query($con,$sql_team_address);
$row_team_address = mysqli_fetch_assoc($query_team_address);
$teams_address= $row_team_address['team_email'];


// getting vendor email

$sql_vendor_address ="Select * from `teams` WHERE role='Vendor' limit 1 ";
$query_vendor_address= mysqli_query($con,$sql_vendor_address);
$row_vendor_address = mysqli_fetch_assoc($query_vendor_address);
$vendor_address= $row_vendor_address['team_email'];


// getting Admins email
$sql_admin_address ="Select * from `teams` WHERE role='Admin' limit 1 ";
$query_admin_address= mysqli_query($con,$sql_admin_address);
$row_admin_address = mysqli_fetch_assoc($query_admin_address);
$admin_address= $row_admin_address['team_email'];

//echo 'Requester email is '.$owners_email.'<br>';
//echo 'Requesters team email is '.$teams_address.'<br>';
//echo 'vendor   email is '.$vendor_address.'<br>';
//echo 'Admins  email is '.$admin_address.'<br>';


// Sending Email to all above email addresess 

$total_html='<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>

<p>Dears,</p>

<p>Ticket ID <b>'.$ticket_id.'</b> has a new Remark  by<b> '.$commenter.'</b> with below details:</p>

<p><b>Remark</b> : '.$comment.'</p>
<p>Click on below link to view more details</p>
<p><a href="http://192.168.7.6/NCE/vendor/login.php">Vendor Portal</a></p>
<p><a href="http://192.168.7.6/NCE/end_user/login.php">End User Portal</a></p>

<p>Best Regards,</p>
<p>Procurement System</p></a>




';
         $subject ='New Remark on Ticket '.$ticket_id;
         $to =$vendor_address;
         $message =$total_html;
         $headers = "MIME-Version: 1.0" . "\r\n";
         $headers .= 'Cc:'.$owners_email.','.$teams_address.','.$admin_address."\r\n";
         $headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
         $headers .= 'From:  NCE Trouble Ticketing<NCE.Trouble.Ticketing@jo.zain.com> ';
         $headers .=  "\r\n";
         // echo 'TO : '.$vendor_address.'<br>'; 
           //mail($to,$subject,$message,$headers);


$fp=fopen('remark_email.php','w');

// fwrite($fp, '<?php $total_html=\' ');
// fwrite($fp, $total_html);
// fwrite($fp,'\';');


fwrite($fp, ' <?php $subject=\' ');
fwrite($fp, $subject);
fwrite($fp,'\';');

fwrite($fp, ' $to=\' ');
fwrite($fp, $to);
fwrite($fp,'\';');

fwrite($fp, ' $message=\' ');
fwrite($fp, $message);
fwrite($fp,'\';');

fwrite($fp, ' $headers=\'');
fwrite($fp, $headers);
fwrite($fp,'\';');


 
fwrite($fp, 'mail($to,$subject,$message,$headers)' );
fwrite($fp,' ?>');
fclose($fp);

pclose(popen("start /B C:/xampp/php/php.exe C:/xampp/htdocs/NCE/vendor/remark_email.php","w"));


echo "<script>alert('Done');</script>" ;
echo "<meta http-equiv='refresh' content='0'>";


} // for  isset


 ?> 
													 
			<div class="col-lg-12">
				<h4 class="kt-subheader__title">Remarks</h4>
				<form  action="" method="POST" enctype="multipart/form-data"> 
					<div class="form-group">
						<input type="text" required class="form-control"  name="comment" id="comment" placeholder="Type remark"> 
					</div>
					<div class="form-group">
			<label class="col-lg-1 col-form-label">Remark Attachment</label>
			
				 
			 
			<input  class="form-control" name="remark_attachment" type="file"  >
		</div>
	 


															<div class="row">
																<div class="col">
					<button  value="Update_ticket" name="add_remark" type="Submit" class="btn btn-brand">Add Remark</button>
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
													<br><br>
<?php 
//cheking if there attachment for the comments


if(empty($row_comments['attachment'])){
    // echo 'This line is printed, because the $var1 is empty.';
    $nothing_to_do='';
}
else{
	 ?>
<button onclick="location.href='download.php?file=<?php echo $row_comments['attachment'] ?>'"  type="button" class="btn btn-focus btn-icon"><i class="fa fa-download"></i></button>
<?php 
}
 ?>

													
																		</span>
																	</div>
																</div>
																
																<?php } ?>
																
																
																
																
																
																
															</div>
														</div>
													</div>
													
												</div>
											</div>

											<!--end: Tab-->
 <script>
function myFunction() {
  document.getElementById('remarks').click();
}
</script>


											 

											<!--begin: Tab-->
											<div class="tab-pane" id="kt_users_edit_tab_5" role="tabpanel">
												
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

<!-- Modal -->
<div class="modal fade" id="exampleModalBackdropStatic" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalBackdropStatic" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalCenterTitle">Enter Reason:
</h5>

<form class="kt-form kt-form--label-right" method="POST" enctype="multipart/form-data">

				<button  	 type="button" class="close" data-dismiss="modal" aria-label="Close" onclick = "gfg_Run2()">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<textarea required class="form-control"  name="resolved_text" id="resolved_text" rows="3" placeholder="Type Here"></textarea>
																	<label class="col-lg-1 col-form-label">Attachment</label>
													<div class="col-lg-3">
														 
													<div class="form-group form-group-last row">
												 
													<input  class="form-control" name="res_attachment" type="file"  >
												</div>

													</div>
				
				
			</div>
			<div class="modal-footer">
				<button onclick = "gfg_Run()" id="resolved_Close_modal" type="button" class="btn btn-outline-brand" data-dismiss="modal">Close</button>
				<button  type="Submit" class="btn btn-outline-brand">Confirm</button>
			</div>
		</div>
		 </form>
	</div>
</div>
 
<script> 
       
// if on modal , clicked on Close Button to return for the 1st selection in the ticket status     
function gfg_Run() { 
    
        $("#Status").prop("selectedIndex", 0).val(); 
}          
</script>  
<script> 
       
// if on modal , clicked on Close Button to return for the 1st selection in the ticket status     
function gfg_Run2() { 
    
        $("#Status").prop("selectedIndex", 0).val(); 
}          
</script>  

<!-- <script>
// if on modal , clicked on Confrim Button append Resolution Reason
$(document).ready(function(){
  $("#resolved_Confirm").click(function(){
  	 $("label[for='resolved_code']").text("Resolution Reason");
  	$("#resolved_code").empty();
  	
    $("#resolved_code").append('<input required name="resolved_code"   type="text" class="form-control" value="'+$('#resolved_text').val()+'" >');
    $("#resolved_code_lable").val("Resolve Reason");
     $('#exampleModalBackdropStatic').modal('toggle');

  });


});
</script> -->



<script type="text/javascript">

// removing duplicates from drop down list

var optionValues =[];
$('#Status option').each(function(){
   if($.inArray(this.value, optionValues) >-1){
      $(this).remove()
   }else{
      optionValues.push(this.value);
   }
});

//Service_Impact


</script>
<script type="text/javascript">

// removing duplicates from drop down list

var optionValues =[];
$('#Service_Impact option').each(function(){
   if($.inArray(this.value, optionValues) >-1){
      $(this).remove()
   }else{
      optionValues.push(this.value);
   }
});

//Service_Impact


</script>

<script type="text/javascript">

// removing duplicates from drop down list

var optionValues =[];
$('#severity option').each(function(){
   if($.inArray(this.value, optionValues) >-1){
      $(this).remove()
   }else{
      optionValues.push(this.value);
   }
});

//Service_Impact


</script>


<script>	

// showing Modal for the resolved status

$("#Status").on("change", function () {        
$modal = $('#exampleModalBackdropStatic');
if($(this).val() === 'Resolved'){
$modal.modal('show');
}
else{
$("#resolved_code_lable").empty();	
$("#resolved_code").empty();
}
});

</script>


<script>	

// checking if ticket is closed to alert the user
       
if($("#ticket_status").val() === 'Closed'){
alert('This Ticket Is Closed ! Edit is not Allowed.');
window.location = 'my_tickets.php'
}



 

</script>

<script>

	function clear_inputs() { 
		
$("#resolved_code_lable").empty();	
$("#resolved_code").empty();	

	}

</script>

<script>document.getElementById('remarks').submit();	</script>


<!--begin::Page Scripts(used by this page) -->
<script src="assets/js/pages/custom/users/edit.js" type="text/javascript"></script>
<?php include('includes/footer.php') ?>