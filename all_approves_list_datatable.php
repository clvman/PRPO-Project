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
   $team = $_SESSION['team_name'];
   $level = $_SESSION['level'];
   $subTeam = explode(" - ", $team);
   
   // Total number of records without filtering
   if($level == 2) {
      $query = "SELECT COUNT(*) AS allcount FROM submitted_pr WHERE pr_step >= " . $level . " AND user_report_to like '%" . $subTeam[0] . "%'";
      // $query = "SELECT COUNT(*) AS allcount FROM submitted_pr WHERE pr_step >= " . $level . " AND ";
   } else {
      $query = "SELECT COUNT(*) AS allcount FROM submitted_pr WHERE pr_step >= " . $level;
   }
   $result = mysqli_query($con, $query);
   $row = mysqli_fetch_assoc($result);
   $totalRecords = $row['allcount'];
   
   // Total number of records with filtering
   if($level == 2) {
      $query = "SELECT COUNT(*) AS allcount_filter FROM submitted_pr WHERE pr_step >= " . $level . " AND " . $searchQuery . " AND user_report_to like '%" . $subTeam[0] . "%'";
   } else {
      $query = "SELECT COUNT(*) AS allcount_filter FROM submitted_pr WHERE pr_step >= " . $level . " AND " . $searchQuery;
   }
   $result = mysqli_query($con, $query);
   $row = mysqli_fetch_assoc($result);
   $totalRecordwithFilter = $row['allcount_filter'];
   
   // Get data
   if($level == 2) {
      $query = "SELECT * FROM submitted_pr WHERE pr_step >= " . $level . " AND " . $searchQuery . " AND user_report_to like '%" . $subTeam[0] . "%'" . " Order by " . $columnName . " " . $columnSortOrder . " LIMIT " . $rowperpage .  " offset " . $start;
   } else {
      $query = "SELECT * FROM submitted_pr WHERE pr_step >= " . $level . " AND " . $searchQuery . " Order by " . $columnName . " " . $columnSortOrder . " LIMIT " . $rowperpage .  " offset " . $start;
   }
    
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
      if($row['pr_step'] == $level && $row['pr_status'] == 0) {
         $edit = '<a href="pr_approve.php?id=' . $row['id'] . '"><i class="fas fa-eye"></i></a>';
      } else {
         $edit = '<a href="view_purchase.php?id=' . $row['id'] . '"><i class="fas fa-eye"></i></a>';
      }
      $array[] = array(
         "pr_code" => $row['pr_code'],
         "requester" => $row['requester'],
         "request_date" => $row['request_date'],
         // "currency" => $row['currency'],
         // "require_company" => $row['require_company'],
         // "supplier" => $row['supplier'],
         "status" => $row['status'],
         "pr_step" => $row['pr_reporting_to'],
         "pr_status" => $status,
         "edit" => $edit,
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

