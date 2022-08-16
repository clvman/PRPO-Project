<?php include('includes/header.php') ;?>		
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<!-- begin::Body -->
	<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--fixed kt-subheader--enabled kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">


<style>
  
table.dataTable tbody th, table.dataTable tbody td {
    padding: 8px 8px; /* e.g. change 8x to 4px here */
}


table#dataTable tbody tr:hover {
  background-color: #ffa;
}

table#dataTable tbody tr:hover > .sorting_1 {f
  background-color: #ffa;
}

table#dataTable thead:hover {
  background-color: #ffa;
}



</style>		

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


								
							
						 
									<div class="kt-portlet">
										<div class="kt-portlet__head">
											<div class="kt-portlet__head-label">
												<h3 class="kt-portlet__head-title">Create Escalations</h3>
											</div>
										</div>

										<!--begin::Form-->
<?php
require('includes/db.php');
if (isset($_POST['Management_Role'])){

    $Management_Role = stripslashes($_POST['Management_Role']);
    $severity = stripslashes($_POST['severity']);
    $Impact = stripslashes($_POST['Impact']);
    $Escalate_After = stripslashes($_POST['Escalate_After']);



    $Management_Role = mysqli_real_escape_string($con,$Management_Role);
    $severity = mysqli_real_escape_string($con,$severity); 
    $Impact = mysqli_real_escape_string($con,$Impact); 
    $Escalate_After = mysqli_real_escape_string($con,$Escalate_After);  

 
    $resultset_1 = mysqli_query($con,"select * from escalation_rules where  Management_Role='".$Management_Role."' AND severity='".$severity."' AND  impact='".$Impact."' ") or die(mysqli_error($con));

    $count = mysqli_num_rows($resultset_1);
   
    if($count == 0)
      {
         $query = "INSERT INTO `escalation_rules`(`Management_Role`, `severity`, `Impact`, `Escalate_After`) VALUES ('$Management_Role','$severity','$Impact','$Escalate_After')";

           $result = mysqli_query($con,$query);
            if($result){
            
                                                                ?>
													<div class="alert alert-success fade show" role="alert">
														<div class="alert-icon"><i class="flaticon2-check-mark"></i></div>
														<div class="alert-text">Done!</div>
														<div class="alert-close">
															<button type="button" class="close" data-dismiss="alert" aria-label="Close">
																<span aria-hidden="true"><i class="la la-close"></i></span>
															</button>
														</div></div>
													 <?php

                        }

      } 
 


     else
     {
          echo "<script>alert('This Escalation Rule is already present in Database, try to add another one');window.location = 'add_escalations.php';</script>" ;

?>

           
      <?php
     }
          


        
         
        
        
    }?>
										 
										<form class="kt-form kt-form--label-right" method="POST">
											<div class="kt-portlet__body">
												<div class="form-group row form-group-marginless kt-margin-t-20">
													



													<!--Ticket status start -->
  		
													<label class="col-lg-1 col-form-label">Management Role :</label>
													<div class="col-lg-2">
														
													<select required name="Management_Role"  class="form-control" id="Management_Role">
														<option   value="">--- Select ---</option>
														<option value="Team Leader">Team Leader</option>
														<option value="Team Manager">Team Manager</option>
														<option value="Department Head">Department Head</option>
									                    
													 
													</select>
														 
													</div>

  		
													<label class="col-lg-1 col-form-label">Severity:</label>
													<div class="col-lg-2">
														
													<select required name="severity"  class="form-control" id="severity">
														<option   value="">--- Select Severity ---</option>
									                    <?php
									                        //$mysqli=mysqli_connect('localhost','root','','nce_tt');
									                        $sql_Severity = "SELECT `severity_name`  FROM severities"; 
									                        $result_Severity = $con->query($sql_Severity);
									                        while($row_Severity = $result_Severity->fetch_assoc()){
									                            echo "<option  value='".$row_Severity['severity_name']."'>".$row_Severity['severity_name']."</option>";
									                        }
									                    ?>
													 
													</select>
														 
													</div>


													

													<label class="col-lg-1 col-form-label">Impact:</label>
													<div class="col-lg-2">
														
													<select required name="Impact"  class="form-control" id="Impact">
														<option   value="">--- Select Impact ---</option>
									                    <?php
									                        //$mysqli=mysqli_connect('localhost','root','','nce_tt');
									                        $sql_Impact = "SELECT `impact_name`  FROM impacts"; 
									                        $result_Impact = $con->query($sql_Impact);
									                        while($row_Impact = $result_Impact->fetch_assoc()){
									                            echo "<option  value='".$row_Impact['impact_name']."'>".$row_Impact['impact_name']."</option>";
									                        }
									                    ?>
													 
													</select>
														 
													</div>



													<label class="col-lg-1 col-form-label"> Escalate After Ticket Due Date:</label>
													<div class="col-lg-1">
														<input required name="Escalate_After" type="number" class="form-control" placeholder="Minutes">
														 
													</div>
													
													
												</div>
												<div class="kt-separator kt-separator--border-dashed kt-separator--space-lg kt-separator--portlet-fit"></div>
												 <center>
														<div class="col-lg-3">				
															<button type="Submit" class="btn btn-brand">Submit</button>
															<button type="reset" class="btn btn-secondary">Cancel</button>
																</div></center>		
													

												<div class="form-group row form-group-marginless">











												
													
												
												</div>


										 

										
											</div>

										</form>
<div class="kt-portlet__body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th width="1%">Management Role</th>
                      <th width="1%">Severity</th>
                      <th width="1%">Impact</th>
                      <th width="1%">Escalate After(Minutes)</th>
                      <th width="2%">Delete</th>
                  
                

                     
                     
                      
                    
                    </tr>
                  </thead>

                  <tbody>

                    <tr>

<?php
include('includes/db.php') ;
        $query="Select * from escalation_rules"; 
        $result=mysqli_query($con,$query);
        while($row=mysqli_fetch_assoc($result)){


                              ?>

                      <td><?php echo $row['Management_Role']; ?></td>
                      <td><?php echo $row['severity']; ?></td>
                      <td><?php echo $row['Impact']; ?></td>
                      <td><?php echo $row['Escalate_After']; ?></td>
                    
                     
                      

                      <td><a href="javascript:delete_escalation_rule('<?php echo $row['id'] ?>')"><i class="fas fa-trash"></i></a></td>
            <script type="text/javascript">
function delete_escalation_rule(id)

{
     if(confirm('Sure To Remove This Record ?'))
     {
        window.location.href='delete_escalation_rule.php?id='+id;
     }
}
</script>    
                     
                    </tr>
                <?php  } ?>
        
 
                  </tbody>
                </table>
              </div> </div>

									</div>
							 
							 
							 
							 
								 
					 

							<!--end::Row-->

							<!--end::Dashboard 2-->
						 

						<!-- end:: Content -->
					 
<script>
  
  $(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#dataTable thead tr').clone(true).appendTo( '#dataTable thead' );
    $('#dataTable thead tr:eq(1) th').each( function (i) {
        var title = $(this).text();
        if (title !=='Edit' && title !=='Delete') {
        $(this).html( '<input type="text" placeholder="Search " />' );
 
        $( 'input', this ).on( 'keyup change', function () {
            if ( table.column(i).search() !== this.value ) {
                table
                    .column(i)
                    .search( this.value )
                    .draw();
            }
        } );
    }} );
 
    var table = $('#dataTable').DataTable( {
        orderCellsTop: true,
        fixedHeader: true,
        lengthMenu: [5,10, 20],
    } );
} );
</script>

<?php include('includes/footer.php') ?>