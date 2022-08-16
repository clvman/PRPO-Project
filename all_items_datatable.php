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
      $searchQuery = " (material_code like '%" . $searchValue . "%') OR (item_description like '%" . $searchValue . "%') OR (unit like '%" . $searchValue . "%') OR (Qty like '%" . $searchValue . "%') OR (Rate like '%" . $searchValue . "%') OR (Amount like '%" . $searchValue . "%') OR (Currency like '%" . $searchValue . "%') OR (Agreement like '%" . $searchValue . "%')";
   }   

   // Total number of records without filtering
   $query="Select count(*) as allcount from items"; 
   $result=mysqli_query($con,$query);
   while($row=mysqli_fetch_assoc($result)){
    $totalRecords = $row['allcount'];
   }

   // Total number of records with filtering
   if($searchQuery == " ") {
      $query="Select count(*) as allcount from items";
   } else {
      $query="Select count(*) as allcount from items where ".$searchQuery;
   }
     
   $result=mysqli_query($con,$query);
   while($row=mysqli_fetch_assoc($result)){
    $totalRecordwithFilter = $row['allcount'];
   }

   if($searchValue != '') {
      $query = "SELECT * FROM items where " . $searchQuery . " Order by " . $columnName . " " . $columnSortOrder . " LIMIT " . $rowperpage .  " offset " . $start;
   } else {
      $query = "SELECT * FROM items Order by " . $columnName . " " . $columnSortOrder . " LIMIT " . $rowperpage .  " offset " . $start;
   }
   
   
   $array = array();
   $result=mysqli_query($con,$query);
   while($row=mysqli_fetch_assoc($result)){
      $array[] = array(
      "material_code" => $row['material_code'],
      "item_description" => $row['item_description'],
      "Agreement" => $row['Agreement'],
      "Currency" => $row['Currency'],
      "unit" => $row['unit'],
      "Rate" => $row['Rate'],
      "Qty" => $row['Qty'],
      "Amount" => $row['Amount'],
      "edit" => '<a href="edit_item.php?id=' . $row['id'] . '"><i class="fas fa-edit"></i></a>',
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
