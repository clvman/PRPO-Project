<?php include('includes/header.php') ;?>		
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
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
   include("includes/db.php");
date_default_timezone_set('Asia/Amman'); 

   if(isset($_POST['ticket_id'])) {


    $ticket_id = stripslashes($_POST['ticket_id']);
    $domain = stripslashes($_POST['domain']);
    $created_on = stripslashes($_POST['created_on']);
    $Status = stripslashes($_POST['Status']);
    $Service_Impact = stripslashes($_POST['Service_Impact']);
    $Owner = stripslashes($_POST['Owner']);
    $screen = stripslashes($_POST['screen']);
    $Scenario = stripslashes($_POST['Scenario']);
    $Description = stripslashes($_POST['Description']);
    $Severity = stripslashes($_POST['Severity']);
    //$SLA=stripslashes($_POST['SLA']);
    //$impact=stripslashes($_POST['impact']);








    //$requester= $_SESSION['PRPO_Current_User'];
    //$ticket_last_update='0000-00-00 00:00:00';
    //$ticket_first_responce='0000-00-00 00:00:00';
    //$ticket_status='Assigned';
   
    //$ticket_due_date=date('Y-m-d H:i:s',strtotime(''.(int)($SLA+$row_SLA['customer_distance']).' minutes',strtotime($created_on)));
    //echo $created_on.'   created_on <br>';
    //echo $ticket_due_date.'   ticket_due_date <br>';
    

//$SLA_TOTAL_BY_HOURS= ((int)($SLA+$row_SLA['customer_distance']))/60;


$target = "attachments/";
$target = $target . basename( $_FILES['attachment']['name']);
//This gets all the other information from the form
$Filename=basename( $_FILES['attachment']['name']);

//Writes the Filename to the server
if(move_uploaded_file($_FILES['attachment']['tmp_name'], $target)) {
    //Tells you if its all ok
    $nothing='nothing';
    
} else {
    //Gives and error if its not
    $nothing='nothing';
}





    $ticket_id = mysqli_real_escape_string($con,$ticket_id); 
    $domain = mysqli_real_escape_string($con,$domain); 
    $created_on = mysqli_real_escape_string($con,$created_on); 
    $Status = mysqli_real_escape_string($con,$Status); 
    $Service_Impact = mysqli_real_escape_string($con,$Service_Impact); 
    $Owner = mysqli_real_escape_string($con,$Owner); 
    $screen = mysqli_real_escape_string($con,$screen); 
    $Scenario = mysqli_real_escape_string($con,$Scenario); 
    $Description = mysqli_real_escape_string($con,$Description); 
    $Severity = mysqli_real_escape_string($con,$Severity); 

          $sql_0="Select * from `tickets` where  `ticket_id` = '$ticket_id' " ;
          //echo $sql_0;
          $query_0 = mysqli_query($con,$sql_0);
          if(mysqli_num_rows($query_0) > 0){
                         $row_0=mysqli_fetch_assoc($query_0);

                          ?>

                          <script type="text/javascript">
                          $(window).load(function(){        
                          $('#Error').modal('show');
                          }); 

                          </script>



                          <?php 
             
          } // for checking reserved table if a row there have same area, site name and type 
  else {
  $sql = "INSERT INTO `tickets2`( `ticket_id`, `domain`, `service_impact`, `owner`, `screen`, `Scenario`, `description`, `attachment`,  `status` , `severity`,`last_updated_on`) VALUES ";

  $sql .= "( '{$ticket_id}' , '{$domain}','{$Service_Impact}','{$Owner}','{$screen}','{$Scenario}', '{$Description}','{$_FILES['attachment']['name']}' ,'Open','{$Severity}',now());";
 

$result = mysqli_query($con,$sql);

    	$sql_logging="INSERT INTO `tickets2_logs`(`ticket_id`, `by_`, `type`) VALUES  ('{$ticket_id}','$Owner','Ticket Creation') ";
        $result_logging = mysqli_query($con,$sql_logging);

//getting the defined reminder time in minutes
//$sql_minutes ="Select * from `reminders_base`";
//$query_minutes = mysqli_query($con,$sql_minutes);
//$row = mysqli_fetch_assoc($query_minutes);
//$minutes= (int)$row['update_every'];
//
//$next_reminder=date('Y-m-d H:i:s',strtotime(''.(int)$minutes.' minutes',strtotime($created_on)));
//echo '<br>minutes    '.$minutes.'   minutes   <br>';   

//$sql_reminders_logs="INSERT INTO `reminders_logs`(`ticket_id`, `created_on`, `next_reminder`, `ticket_due_date`) VALUES ";
//$sql_reminders_logs .= " ('{$ticket_id}' , '{$created_on}','{$next_reminder}' ,'{$ticket_due_date}');";
//$result = mysqli_query($con,$sql_reminders_logs);    




// ESCALATIONS  TEAM LEADER///

//$sql_esclate_after_minutes ="Select Escalate_After from `escalation_rules` WHERE severity='$severity' AND Impact='$impact' AND Management_Role ='Team Leader' ";
//$query__esclate_after_minutes = mysqli_query($con,$sql_esclate_after_minutes);
//$row_esclate_after_minutes = mysqli_fetch_assoc($query__esclate_after_minutes);
//$minutes= (int)$row_esclate_after_minutes['Escalate_After'];                

//$next_reminder_team_leader=date('Y-m-d H:i:s',strtotime(''.(int)$minutes.' minutes',strtotime($ticket_due_date)));



//$sql_team_leader_escalation_logs="INSERT INTO `team_leader_escalation_logs`(`ticket_id`, `ticket_due_date`, `team_leader_reminder`) VALUES ";
//$sql_team_leader_escalation_logs .= " ('{$ticket_id}' , '{$ticket_due_date}','{$next_reminder_team_leader}' );";
//$result = mysqli_query($con,$sql_team_leader_escalation_logs);  



// ESCALATIONS  TEAM Manager///

//$sql_esclate_after_minutes ="Select Escalate_After from `escalation_rules` WHERE severity='$severity' AND Impact='$impact' AND Management_Role ='Team Manager' ";
//$query__esclate_after_minutes = mysqli_query($con,$sql_esclate_after_minutes);
//$row_esclate_after_minutes = mysqli_fetch_assoc($query__esclate_after_minutes);
//$minutes= (int)$row_esclate_after_minutes['Escalate_After'];                

//$next_reminder_team_manager=date('Y-m-d H:i:s',strtotime(''.(int)$minutes.' minutes',strtotime($ticket_due_date)));



//$sql_team_manager_escalation_logs="INSERT INTO `team_manager_escalation_logs`(`ticket_id`, `ticket_due_date`, `team_manager_reminder`) VALUES ";
//$sql_team_manager_escalation_logs .= " ('{$ticket_id}' , '{$ticket_due_date}','{$next_reminder_team_manager}' );";
//$result = mysqli_query($con,$sql_team_manager_escalation_logs);  



 // email when creating  the ticketing 2020


// getting requesters' team email
    
$sql_owner_teams ="Select * from `users` WHERE username='$Owner' ";
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
<p><b>Ticket ID</b> '.$ticket_id.' has been created by<b> '.$Owner.'</b> with below details:</p>

<p><b>Product Domain</b> : '.$domain.'</p>
<p><b>Ticket Status</b> : '.$Status.'</p>
<p><b>Service Impact</b> : '.$Service_Impact.' </p>

<p>Click on below link to view more details</p>
<p><a href="http://192.168.7.6/NCE/vendor/login.php">Vendor Portal</a></p>
<p><a href="http://192.168.7.6/NCE/end_user/login.php">End User Portal</a></p>

<p>Best Regards,</p>
<p>Procurement System</p></a>


';
         $subject ='New Ticket Alert '.$ticket_id;
         $to =$vendor_address;
         $message =$total_html;
         $headers = "MIME-Version: 1.0" . "\r\n";
         $headers .= 'Cc:'.$owners_email.','.$teams_address.','.$admin_address."\r\n";
         $headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
         $headers .= 'From:  NCE Trouble Ticketing<NCE.Trouble.Ticketing@jo.zain.com>' . "\r\n";
         $headers .=  "\r\n";
         // echo 'TO : '.$vendor_address.'<br>'; 
         //mail($to,$subject,$message,$headers);


  $fp=fopen('add_ticket_email.php','w');

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

pclose(popen("start /B C:/xampp/php/php.exe C:/xampp/htdocs/NCE/add_ticket_email.php","w"));       

 //echo 'TO : '.$vendor_address.'<br>';  
 //echo 'Cc:'.$owners_email.';'.$teams_address.';'.$admin_address. "\r\n".'<br>';
 



//echo 'Requester email is '.$owners_email.'<br>';
//echo 'Requesters team email is '.$teams_address.'<br>';
//echo 'vendor   email is '.$vendor_address.'<br>';
//echo 'Admins  email is '.$admin_address.'<br>';






                        ?>

                          <script type="text/javascript">
                          $(window).load(function(){        
                          $('#Done').modal('show');
                          }); 

                          </script>



                          <?php 



  }}
    

    
    
?>								
							
						 
									<div class="kt-portlet">
										<div class="kt-portlet__head">
											<div class="kt-portlet__head-label">
												<h3 class="kt-portlet__head-title">Create New Ticket</h3>
											</div>
										</div>

										<!--begin::Form-->


										 
										<form class="kt-form kt-form--label-right" method="POST" enctype="multipart/form-data">

											<div class="kt-portlet__body">
												<div class="form-group row form-group-marginless kt-margin-t-20">
													

													<!--Ticket ID start -->
													<label class="col-lg-1 col-form-label">Ticket ID:</label>
													<div class="col-lg-3">
														<input required name="ticket_id" readonly  type="text" class="form-control" value="<?php require_once('ticket_id_generator.php')?>" >
														 
													</div>

													<!--Ticket ID end -->

													<!--Ticket Subject start -->
  		
													<label  class="col-lg-1 col-form-label"> Domain:</label>
													<div class="col-lg-3">
														
														 <select  required name="domain" id="domain" class="form-control">
									                   
														<option   value="">--- Select ---</option>
														<option value="NCE-TX">NCE TX</option>
														<option value="NCE-FAN">NCE-FAN</option>
													</select>
														 
													</div>


													<label  class="col-lg-1 col-form-label"> Status:</label>
													<div class="col-lg-3">
														
														 <select   required name="Status" id="Status" class="form-control">
									                   
														<option   value="">--- Select ---</option>
														<option selected="" value="Open">Open</option>
														 <!-- <option value="Pending">Pending</option>
														<option value="Suspended">Suspended</option>  -->
													-->
														<!-- <option value="Resolved">Resolved</option> -->
													</select>
														 
													</div>													

													<!--Ticket Subject ends -->


													<!--Ticket start datetime START Hidden -->									
													<input hidden name="created_on" type="text" class="form-control"   value="<?php echo date("Y-m-d H:i:s"); ?>">
													<!--Ticket start datetime END -->

													<!--Ticket status START -->
													




												</div>

												<div class="kt-separator kt-separator--border-dashed kt-separator--space-lg kt-separator--portlet-fit"></div>

									<div class="form-group row form-group-marginless kt-margin-t-20">

													<label class="col-lg-1 col-form-label">Service Impact:</label>

													<div class="col-lg-3">
													
									                <select  required name="Service_Impact" id="Service_Impact" class="form-control">
									                   
														<option   value="">---Select---</option>
														<option value="Yes">Yes</option>
														<option value="No">No</option>									                  


									                </select>												 
													</div>

													<label class="col-lg-1 col-form-label">Owner:</label>
													<div class="col-lg-3">
											<input required name="Owner" readonly  type="text" class="form-control" value="<?php echo $_SESSION['PRPO_Current_User'] ?>" >
														 
													</div>



													<label class="col-lg-1 col-form-label">  Severity:</label>

													<div class="col-lg-3">
													
									                <select  required name="Severity" id="Severity" class="form-control">
									                   
														<option   value="">---Select---</option>
														<option value="Critical">Critical</option>
														<option value="Major">Major</option>
														<option value="Minor">Minor</option>									                  


									                </select>												 
													</div>
													
													 



													
													
												</div> 


												<div class="kt-separator kt-separator--border-dashed kt-separator--space-lg kt-separator--portlet-fit"></div>
												<div class="form-group row form-group-marginless kt-margin-t-20">


													<label class="col-lg-1 col-form-label">Screen:</label>
													<div class="col-lg-3">
											
											<textarea name="screen" required class="form-control" id="exampleTextarea" rows="3"></textarea>
														 
													</div>

													<label class="col-lg-1 col-form-label">Scenario:</label>
													<div class="col-lg-3">
											 
											<textarea name="Scenario" required class="form-control" id="exampleTextarea" rows="3"></textarea>
														 
													</div>


													
<label class="col-lg-1 col-form-label">  Description:</label>
													<div class="col-lg-3">
														 
														<textarea name="Description" required class="form-control" id="exampleTextarea" rows="3"></textarea>												 
													</div>


													



													
												
												</div>


												<div class="kt-separator kt-separator--border-dashed kt-separator--space-lg kt-separator--portlet-fit"></div>

											<div class="form-group row form-group-marginless">
	


													




													<label class="col-lg-1 col-form-label">Attachment</label>
													<div class="col-lg-3">
														 
													<div class="form-group form-group-last row">
												 
													<input  class="form-control" name="attachment" type="file"  >
												</div>

													</div>







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
					 












                        <div class="modal fade" id="Done" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="Done" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalCenterTitle">Done</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <p><b> Ticket ID: </b> <?php echo  $ticket_id;?> </p>
                                   
 
                                  
                                </div>
                                <div class="modal-footer">
                                 <button type="button" class="btn btn-outline-brand" onclick="myFunction()">Close</button>
                                   
                                </div>
                              </div>
                            </div>
                          </div>
    


                        <div class="modal fade" id="Error" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="Error" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalCenterTitle">Error</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <p>Ticket ID: <?php echo  $ticket_id;?> is already created </p>

                                  
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-outline-brand" onclick="myFunction()">Close</button>

                                  
                                </div>
                              </div>
                            </div>
                          </div>





<script>
$("select[name='customer_name']").change(function () {
    var customer_name = $(this).val();


    if(customer_name) {


        $.ajax({
            url: "ajax/ajax_customer_name_id.php",
            dataType: 'Json',
            data: {'customer_name':customer_name},
            success: function(data) {
                $('select[name="Circuit_ID"]').empty();
                $('select[name="Circuit_ID"]').append('<option   value="">--- Select '+customer_name+'\'s Circuit ID ---</option>');
                $.each(data, function(key, value) {
                    $('select[name="Circuit_ID"]').append('<option value="'+ key +'">'+ value +'</option>');
                });
            }
        });


    }else{
        $('select[name="Circuit_ID"]').empty();
    }
});
</script>


<script>
	            function myFunction() {
               window.location.href = "all_tickets.php" ;
            }

</script>
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

    <script type="text/javascript">

		var optionValues =[];
		$('#impact option').each(function(){
		   if($.inArray(this.value, optionValues) >-1){
		      $(this).remove()
		   }else{
		      optionValues.push(this.value);
		   }
		});
    </script>

<!--for components/forms/file-upload/uppy.html  (File Upload) -->
<script src="assets/js/pages/components/forms/file-upload/uppy.js" type="text/javascript"></script>

<?php include('includes/footer.php') ?>