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

   session_start();  
   $searchQuery = " (pr_code like '%" . $searchValue . "%') ";
   $requester = $_SESSION['PRPO_Current_User'];
   
   // Total number of records without filtering
   $query = "SELECT count(*) as allcount FROM submitted_pr WHERE requester = '" . $requester . "'";
   $result = mysqli_query($con, $query);
   $row = mysqli_fetch_assoc($result);
   $totalRecords = $row['allcount'];
   
   // Total number of records without filtering
   $query = "SELECT count(*) as allcount_filter FROM submitted_pr WHERE " . $searchQuery. " AND requester = '" . $requester . "'";
   $result = mysqli_query($con, $query);
   $row = mysqli_fetch_assoc($result);
   $totalRecordwithFilter = $row['allcount_filter'];
   
   // Get data
   $query = "SELECT * FROM submitted_pr where " . $searchQuery . " AND requester = '" . $requester . "' Order by " . $columnName . " " . $columnSortOrder . " LIMIT " . $rowperpage .  " offset " . $start; 
   $array = array();
   $result = mysqli_query($con,$query);
   while($row=mysqli_fetch_assoc($result)){
      switch($row['pr_status']) {
         case 0: $status = "Pendding"; break;
         case 1: $status = "Approved"; break;
         case 2: $status = "Rejected"; break;
         case 3: $status = "Requested more infor"; break;
         default: $status = ""; break;
      }
      $array[] = array(
         "pr_code" => $row['pr_code'],
         "requester" => $row['requester'],
         "request_date" => $row['request_date'],
         "currency" => $row['currency'],
         "require_company" => $row['require_company'],
         "supplier" => $row['supplier'],
         "status" => $row['status'],
         "pr_step" => $row['pr_reporting_to'],
         "pr_status" => $status,
         "edit" => '<a href="view_purchase.php?id=' . $row['id'] . '"><i class="fas fa-eye"></i></a>',
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

