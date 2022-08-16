<html>
 <head>
  <title>Webslesson Demo - PHP PDO Ajax CRUD with Data Tables and Bootstrap Modals</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>  
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <style>
   body
   {
    margin:0;
    padding:0;
    background-color:#f1f1f1;
   }
   .box
   {
    width:1270px;
    padding:20px;
    background-color:#fff;
    border:1px solid #ccc;
    border-radius:5px;
    margin-top:25px;
   }
  </style>
 </head>
 <body>
  <div class="container box">
   <h1 align="center">PHP PDO Ajax CRUD with Data Tables and Bootstrap Modals</h1>
   <br />
   <div class="table-responsive">
    <br />
    <div align="right">
     <button type="button" id="add_button" data-toggle="modal" data-target="#userModal" class="btn btn-info btn-lg">Add</button>
    </div>
    <br /><br />
    <table id="user_data" class="table table-bordered table-striped">
     <thead>
      <tr>
      
       <th width="35%">Department Name</th>
       <th width="35%">Department Email</th>
       <th width="35%">Department Head</th>
       <th width="35%">Department Head Email</th>
       <th width="10%">Edit</th>
       <th width="10%">Delete</th>
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
     <h4 class="modal-title">Add Department</h4>
    </div>
    <div class="modal-body">
     <label>Enter Department Name</label>
     <input type="text" name="Department_name" id="Department_name" class="form-control" />
     <br />
     <label>Enter Department Email</label>
     <input type="email" name="Department_email" id="Department_email" class="form-control" />
     <br />
     <label>Enter Department Head</label>
     <input type="text" name="Department_head" id="Department_head" class="form-control" />
     <br />
     <label>Enter Department Head Email</label>
     <input type="email" name="Department_head_email" id="Department_head_email" class="form-control" />
     <br />
    </div>
    <div class="modal-footer">
     <input type="hidden" name="department_id" id="department_id" />
     <input type="hidden" name="operation" id="operation" />
     <input type="submit" name="action" id="action" class="btn btn-success" value="Add" />
     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
   </div>
  </form>
 </div>
</div>


 </body>
</html>
<script type="text/javascript" language="javascript" >
$(document).ready(function(){
 $('#add_button').click(function(){
  $('#user_form')[0].reset();
  $('.modal-title').text("Add Department");
  $('#action').val("Add");
  $('#operation').val("Add");

 });
 
 var dataTable = $('#user_data').DataTable({
  "processing":true,
  "serverSide":true,
  "order":[],
  "ajax":{
   url:"datatables_crud/fetch.php",
   type:"POST"
  },
 
"columnDefs":[
   {
    "targets":[0,2,3,4,5],
    "orderable":false,
   },
  ],
 });

 $(document).on('submit', '#user_form', function(event){
  event.preventDefault();
  var Department_name = $('#Department_name').val();
  var Department_email = $('#Department_email').val();
   var Department_head = $('#Department_head').val();
  var Department_head_email = $('#Department_head_email').val();

   $.ajax({
    url:"datatables_crud/insert.php",
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
  var department_id = $(this).attr("id");
  $.ajax({
   url:"datatables_crud/fetch_single.php",
   method:"POST",
   data:{department_id:department_id},
   dataType:"json",
   success:function(data)
   {
    $('#userModal').modal('show');

    $('#Department_name').val(data.Department_name);
    $('#Department_email').val(data.Department_email);
    $('#Department_head').val(data.Department_head);
    $('#Department_head_email').val(data.Department_head_email);

    $('.modal-title').text("Edit User");
    $('#department_id').val(department_id);
 
    $('#action').val("Edit");
    $('#operation').val("Edit");
   }
  })
 });
 
 $(document).on('click', '.delete', function(){
  var department_id = $(this).attr("id");
  if(confirm("Are you sure you want to delete this?"))
  {
   $.ajax({
    url:"datatables_crud/delete.php",
    method:"POST",
    data:{department_id:department_id},
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