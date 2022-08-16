<?php

   include ('includes/db.php') ;

   // Reading value
   $draw = $_POST['draw'];
   $start = $_POST['start'];
   $rowperpage = $_POST['length']; // Rows display per page
   $columnIndex = $_POST['order'][0]['column']; // Column index
   $columnName = $_POST['columns'][$columnIndex]['data']; // Column name
   $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
   $searchValue = $_POST['search']['value']; // Search value

   $searchArray = array();

   // Search
   $searchQuery = " ";
   if($searchValue != ''){
      $searchQuery = " (supplier_name like '%" . $searchValue . "%') OR (country like '%" . $searchValue . "%') OR (telephone_number like '%" . $searchValue . "%')  OR (fax like '%" . $searchValue . "%')  OR (address like '%" . $searchValue . "%')  OR (email like '%" . $searchValue . "%') ";
   }   

   // Total number of records without filtering
   $query="Select count(*) as allcount from supplier"; 
   $result=mysqli_query($con,$query);
   while($row=mysqli_fetch_assoc($result)){
    $totalRecords = $row['allcount'];
   }

   // Total number of records with filtering
   if($searchQuery == " ") {
      $query="Select count(*) as allcount from supplier";
   } else {
      $query="Select count(*) as allcount from supplier where ".$searchQuery;
   }
     

   $result=mysqli_query($con,$query);
   while($row=mysqli_fetch_assoc($result)){
    $totalRecordwithFilter = $row['allcount'];
   }
   
   if($searchValue != "") {
      $query = "SELECT * FROM supplier where " . $searchQuery . " Order by " . $columnName . " " . $columnSortOrder . " LIMIT " . $rowperpage .  " offset " . $start;
   } else {
      $query = "SELECT * FROM supplier Order by " . $columnName . " " . $columnSortOrder . " LIMIT " . $rowperpage .  " offset " . $start;
   }
   

   $array = array();
   $result=mysqli_query($con,$query);
   while($row=mysqli_fetch_assoc($result)){
      $array[] = array(
      "supplier_name" => $row['supplier_name'],
      "country" => $row['country'],
      "telephone_number" => $row['telephone_number'],
      "fax" => $row['fax'],
      "address" => $row['address'],
      "email" => $row['email'],
      "edit" => '<a href="edit_supplier.php?id=' . $row['id'] . '"><i class="fas fa-edit"></i></a>',
      "delete" => '<a href="#" class="trigger_btn" data-index="' . $row['id'] . '" ><i class="fas fa-trash"></i></a>'
    );
   }

   $response = array(
      "draw" => intval($draw),
      "iTotalRecords" => $totalRecords,
      "iTotalDisplayRecords" => $totalRecordwithFilter,
      "aaData" => $array
   );

   echo json_encode($response);

