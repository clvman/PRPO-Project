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
 
						
							
						 
									<div class="kt-portlet">
										<div class="kt-portlet__head">
											<div class="kt-portlet__head-label">
												<h3 class="kt-portlet__head-title">Users</h3>
											</div>
										</div>

										<!--begin::Form-->
									 
								 
											<div class="kt-portlet__body">
											 

  							
 								  <div class="container box">
  
   <br />
   <div class="table-responsive">
    <br />
    <div align="right">
     <button type="button" id="add_button" data-toggle="modal" data-target="#userModal" class="btn btn-primary">Add</button>
    </div>
    <br /><br />
    <table id="user_data" class="table table-bordered table-striped">
     <thead>
      <tr>
      
       <th>Username</th>
       <th>Team</th>     
       <th>Email</th>
       <th>Role</th>
      
     


       <th>Edit</th>
       <th>Delete</th>
      </tr>
     </thead>
    </table>
    
   </div>
  </div>


<div id="userModal" class="modal fade">
 <div class="modal-dialog">
  <form method="post" id="user_form" enctype="multipart/form-data">
   <div class="modal-content">
    <div class="modal-header">
     <button type="button" class="close" data-dismiss="modal">&times;</button>
     <h4 class="modal-title">Add User</h4>
    </div>
    <div class="modal-body">
     <label>Enter User Name</label>
     <input  required  type="text" name="username" id="username" class="form-control" />
     <br />
    
     <label>Enter password</label>
     <input  required type="password" name="password" id="password" class="form-control" />
     <br />
     <label>Enter Email</label>
     <input  required type="email" name="email" id="email" class="form-control" />
     <br />
 
    

     <label>Select Role</label>
  <select required  name="role"  id="role" class="form-control">
<option   value="">--- Select Team ---</option> 
<option value="Admin">Admin</option> 
<option value="Vendor">Vendor</option> 
<option value="End User">End User</option> 
     <br />
</select>
 <br />
<label class="col-lg-1 col-form-label">Team:</label>


<select required  name="team" class="form-control">
<option   value="">--- Select Team ---</option>


<?php
$con1=mysqli_connect('localhost','root','','nce_tt');
$sql1 = "SELECT `team_name`  FROM teams"; 
$result1 = $con1->query($sql1);
while($row1 = $result1->fetch_assoc()){
echo "<option value='".$row1['team_name']."'>".$row1['team_name']."</option>";
}
?>


</select>													 



     <br />

     <br />
    </div>
    <div class="modal-footer">
     <input type="hidden" name="user_id" id="user_id" />
     <input type="hidden" name="operation" id="operation" />
     <input type="submit" name="action" id="action" class="btn btn-primary" value="Add" />
     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
   </div>
  </form>
 </div>
</div>				

 




										
											</div>
										 
									 

										<!--end::Form-->
									</div>
							 
							 
		                       
								 
	

							<!--end::Row-->

							<!--end::Dashboard 2-->
						 

						<!-- end:: Content -->
					 




<script type="text/javascript" language="javascript" >
$(document).ready(function(){
 $('#add_button').click(function(){
  $('#user_form')[0].reset();
  $('.modal-title').text("Add User");
  $('#action').val("Add");
  $('#operation').val("Add");

 });
 
 var dataTable = $('#user_data').DataTable({
  responsive : true,
  "processing":true,
  "serverSide":true,
  "order":[],
  "ajax":{
   url:"datatables_crud/users/fetch.php",
   type:"POST"
  },
 

 });

 $(document).on('submit', '#user_form', function(event){
  event.preventDefault();
  var username = $('#username').val();
  var password = $('#password').val();
  var role = $('#role').val();

  var email = $('#email').val();
  var team = $('#team').val();


   $.ajax({
    url:"datatables_crud/users/insert.php",
    method:'POST',
    data:new FormData(this),
    contentType:false,
    processData:false,
    success:function(data)
    {
     alert(data);
     $('#user_form')[0].reset();
     $('#userModal').modal('hide');
     dataTable.ajax.reload();
    }
   });

 
 });
 
 $(document).on('click', '.update', function(){
  var user_id = $(this).attr("id");
  $.ajax({
   url:"datatables_crud/users/fetch_single.php",
   method:"POST",
   data:{user_id:user_id},
   dataType:"json",
   success:function(data)
   {
    $('#userModal').modal('show');

    $('#username').val(data.username);
  $('#role').val(data.role);
    $('#password').val(data.password);

    $('#email').val(data.email);
    $('#team').val(data.team);
     
    
    $('.modal-title').text("Edit User");
    $('#user_id').val(user_id);
 
    $('#action').val("Edit");
    $('#operation').val("Edit");
   }
  })
 });
 
 $(document).on('click', '.delete', function(){
  var user_id = $(this).attr("id");
  if(confirm("Are you sure you want to delete this?"))
  {
   $.ajax({
    url:"datatables_crud/users/delete.php",
    method:"POST",
    data:{user_id:user_id},
    success:function(data)
    {
     alert(data);
     dataTable.ajax.reload();
    }
   });
  }
  else
  {
   return false; 
  }
 });
 
 
});
</script>










 


 

<?php include('includes/footer.php') ?>
