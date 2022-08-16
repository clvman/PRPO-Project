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
      $searchQuery = " (team_name like '%" . $searchValue . "%') OR (role like '%" . $searchValue . "%') ";
   }   

   // Total number of records without filtering
   $query="Select count(*) as allcount from teams"; 
   $result=mysqli_query($con,$query);
   while($row=mysqli_fetch_assoc($result)){
    $totalRecords = $row['allcount'];
   }

   // Total number of records with filtering
   if($searchQuery == " ") {
      $query="Select count(*) as allcount from teams";
   } else {
      $query="Select count(*) as allcount from teams where ".$searchQuery;
   }
     
   // print_r($query);
   $result=mysqli_query($con,$query);
   while($row=mysqli_fetch_assoc($result)){
    $totalRecordwithFilter = $row['allcount'];
   }

   if($searchValue != "") {
      $query = "SELECT * FROM teams where " . $searchQuery . " Order by " . $columnName . " " . $columnSortOrder . " LIMIT " . $rowperpage .  " offset " . $start;
   } else {
      $query = "SELECT * FROM teams Order by " . $columnName . " " . $columnSortOrder . " LIMIT " . $rowperpage .  " offset " . $start;
   }

   $array = array();
   $result=mysqli_query($con,$query);
   while($row=mysqli_fetch_assoc($result)){
      $array[] = array(
      "team_name" => $row['team_name'],
      "role" => $row['role'],
      "edit" => '<a href="edit_team.php?id=' . $row['team_id'] . '"><i class="fas fa-edit"></i></a>',
      "delete" => '<a href="#" class="trigger_btn" data-index="' . $row['team_id'] . '" ><i class="fas fa-trash"></i></a>'
    );
   }

   $response = array(
      "draw" => intval($draw),
      "iTotalRecords" => $totalRecords,
      "iTotalDisplayRecords" => $totalRecordwithFilter,
      "aaData" => $array
   );

   echo json_encode($response);

