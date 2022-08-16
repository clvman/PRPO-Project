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
    $ticket_subject = stripslashes($_POST['ticket_subject']);
    $created_on = stripslashes($_POST['created_on']);
    $severity = stripslashes($_POST['severity']);
    $assigned_to = stripslashes($_POST['assigned_to']);
    $customer_name = stripslashes($_POST['customer_name']);
    $Circuit_ID = stripslashes($_POST['Circuit_ID']);
    $ticket_details = stripslashes($_POST['ticket_details']);
    //$SLA=stripslashes($_POST['SLA']);
    $impact=stripslashes($_POST['impact']);


 
$query_SLA = "SELECT * FROM severities WHERE `severity_name` = '{$severity}' and `impact` = '{$impact}' ";
$result_SLA = mysqli_query($con, $query_SLA);
$row_SLA = mysqli_fetch_assoc($result_SLA);
$SLA=$row_SLA['SLA_Hour'];
 

    $requester= $_SESSION['NCE_TT_end_user'];
    $ticket_last_update='0000-00-00 00:00:00';
    $ticket_first_responce='0000-00-00 00:00:00';
    $ticket_status='Assigned';
   
    $ticket_due_date=date('Y-m-d H:i:s',strtotime(''.$SLA.' hour',strtotime($created_on)));
    




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
    $ticket_subject = mysqli_real_escape_string($con,$ticket_subject); 
    $created_on = mysqli_real_escape_string($con,$created_on); 
    $severity = mysqli_real_escape_string($con,$severity); 
    $assigned_to = mysqli_real_escape_string($con,$assigned_to); 
    $customer_name = mysqli_real_escape_string($con,$customer_name); 
    $Circuit_ID = mysqli_real_escape_string($con,$Circuit_ID); 
    $ticket_details = mysqli_real_escape_string($con,$ticket_details); 
    $impact = mysqli_real_escape_string($con,$impact); 

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
  $sql = "INSERT INTO `tickets`(`ticket_id`, `created_on`, `ticket_subject`, `ticket_details`, `ticket_severity`, `ticket_status`, `ticket_requester`, `assigned_to`, `customer_name`, `ticket_last_update`, `ticket_first_responce`, `SLA_Hour`, `ticket_due_date`, `attachment`, `circuit_id`, `customer_impact`) VALUES ";

  $sql .= "( '{$ticket_id}' ,'{$created_on}',   '{$ticket_subject}','{$ticket_details}','{$severity}','{$ticket_status}','{$requester}', '{$assigned_to}','{$customer_name}' ,'{$ticket_last_update}' ,'{$ticket_first_responce}',{$SLA} ,'{$ticket_due_date}','{$_FILES['attachment']['name']}' , '{$Circuit_ID}', '{$impact}'   )";
 

$result = mysqli_query($con,$sql);


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
													<div class="col-lg-2">
														<input required name="ticket_id" readonly  type="text" class="form-control" value="<?php require_once('ticket_id_generator.php')?>" >
														 
													</div>

													<!--Ticket ID end -->

													<!--Ticket Subject start -->
  		
													<label class="col-lg-1 col-form-label">Ticket Subject:</label>
													<div class="col-lg-2">
														<input required name="ticket_subject" type="text" class="form-control" placeholder="Subject">
														 
													</div>

													<!--Ticket Subject ends -->


													<!--Ticket start datetime START Hidden -->									
													<input hidden name="created_on" type="text" class="form-control"   value="<?php echo date("Y-m-d H:i:s"); ?>">
													<!--Ticket start datetime END -->

													<!--Ticket status START -->

             
												

													<div class="col-lg-2">
														 
									                <select onchange="severity_function(this)" required name="severity" id="severity" class="form-control">
									                   
														<option   value="">--- Select Severity ---</option>

									                    <?php
									                        //$mysqli=mysqli_connect('localhost','root','','nce_tt');
									                        $sql_severity = "SELECT `severity_name`  FROM severities"; 
									                        $result_severity = $con->query($sql_severity);
									                        while($row_severity = $result_severity->fetch_assoc()){
									                            echo "<option  value='".$row_severity['severity_name']."'>".$row_severity['severity_name']."</option>";
									                        }
									                    ?>


									                </select>												 
													</div>


													<div class="col-lg-2">
														 
									                <select onchange="impact_function(this)" id="impact"  required name="impact" class="form-control">
									                   
														<option   value="">--- Select Impact ---</option>
									                </select>												 
													</div></div>

												<div class="kt-separator kt-separator--border-dashed kt-separator--space-lg kt-separator--portlet-fit"></div>

												<div class="form-group row form-group-marginless">



													<label class="col-lg-1 col-form-label">Customer Name:</label>
													<div class="col-lg-3">
														 
									                <select required  name="customer_name" class="form-control">
									                    <option   value="">--- Select Customer ---</option>


									                    <?php
									                        include('./includes/db_config.php');
									                        $sql = "SELECT `customer_name`  FROM customers"; 
									                        $result = $mysqli->query($sql);
									                        while($row = $result->fetch_assoc()){
									                            echo "<option value='".$row['customer_name']."'>".$row['customer_name']."</option>";
									                        }
									                    ?>


									                </select>													 
													</div>


													
													<div class="col-lg-3">
														 
             
									                <select required  name="Circuit_ID" class="form-control"  >
									                	<option   value="">--- Select Circuit ID ---</option>

									                </select>												 
													</div>
													
													<div id='SLA' class="col-lg-3">
														 
														 
													</div>



													
													
												</div> 


												<div class="kt-separator kt-separator--border-dashed kt-separator--space-lg kt-separator--portlet-fit"></div>
												<div class="form-group row form-group-marginless">






													<label class="col-lg-1 col-form-label">Assign To:</label>
													<div class="col-lg-3">
														 
									                <select required  name="assigned_to" class="form-control">
									                    <option   value="">--- Select Team ---</option>


									                    <?php
									                        //$mysqli=mysqli_connect('localhost','root','','nce_tt');
									                        $sql1 = "SELECT *  FROM `teams`"; 
									                        echo $sql1;
									                        $result1 = $con->query($sql1);
									                        while($row = $result1->fetch_assoc()){
									                            echo "<option value='".$row['team_name']."'>".$row['team_name']."</option>";
									                        }
									                    ?>


									                </select>													 
													</div>






													
												
												</div>


												<div class="kt-separator kt-separator--border-dashed kt-separator--space-lg kt-separator--portlet-fit"></div>

											<div class="form-group row form-group-marginless">
	


													<label class="col-lg-1 col-form-label">Ticket Description:</label>
													<div class="col-lg-3">
														 
														<textarea name="ticket_details" required class="form-control" id="exampleTextarea" rows="3"></textarea>												 
													</div>




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
$("select[name='severity']").change(function () {
    var severity = $(this).val();


    if(severity) {


        $.ajax({
            url: "ajax/ajax_severity_impact.php",
            dataType: 'Json',
            data: {'severity':severity},
            success: function(data) {
                $('select[name="impact"]').empty();
                $('select[name="impact"]').append('<option   value="">--- Select Impact  ---</option>');
                $.each(data, function(key, value) {
                    $('select[name="impact"]').append('<option value="'+ key +'">'+ value +'</option>');
                });
            }
        });


    }else{
        $('select[name="impact"]').empty();
         $('select[name="impact"]').append('<option   value="">--- Select Impact  ---</option>');
    }
});


</script>








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
                                  <p>Ticket ID: <?php echo  $ticket_id;?> has been created successfully </p>

                                  
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
	            function myFunction() {
               window.location.href = "add_ticket.php" ;
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