<?php

   include ('includes/db.php') ;

   // Reading value
   session_start();
   $id = $_POST['id'];
   $type = $_POST['type'];
   $level = $_SESSION['level'];


   switch($type) {
    case "approve":
        $next_step = $level + 1;
        $approves = $_SESSION['approvals'];
        $pr_reporting_to = "";
        foreach($approves as $value) {
         if($value['level'] == $next_step) {
             $pr_reporting_to = $value['team'];
             break;
         }
        }
        if($next_step == 8) {
            $query = "UPDATE submitted_pr SET status = 'Approve', pr_step = 8, pr_status = 1, level8_date = '" . date("Y-m-d h:i:sa") . "' WHERE id = " . $id;
        } else {
            $approve_date = "level" . $level . "_date = '" . date("Y-m-d h:i:sa") . "'";
            $query = "UPDATE submitted_pr SET pr_step = " . $next_step . ", pr_status = 0, pr_reporting_to = '" . $pr_reporting_to . "', " . $approve_date . " WHERE id = " . $id;
        }
        
        $result = mysqli_query($con, $query);
        if($result) {
            echo json_encode(1);
        } else {
            echo json_encode(0);
        }
        break;
    case "reject":
        if($_FILES["fileToUploadReject"]["name"]) {
            $target_dir = "upload/purchase/";
            $target_file_name = time() . '-' . basename($_FILES["fileToUploadReject"]["name"]);
            $target_file = $target_dir . $target_file_name;

            if (move_uploaded_file($_FILES["fileToUploadReject"]["tmp_name"], $target_file)) {
                $attach = stripslashes($target_file_name);
                $attach = mysqli_real_escape_string($con,$attach);
            } 
        } else {
            $attach = "";
        }        
        break;
    case "request":
        if($_FILES["fileToUploadRequest"]["name"]) {
            $target_dir = "upload/purchase/";
            $target_file_name = time() . '-' . basename($_FILES["fileToUploadRequest"]["name"]);
            $target_file = $target_dir . $target_file_name;

            if (move_uploaded_file($_FILES["fileToUploadRequest"]["tmp_name"], $target_file)) {
                $attach = stripslashes($target_file_name);
                $attach = mysqli_real_escape_string($con,$attach);
            } 
        } else {
            $attach = "";
        }
        break;
   }
//    $start = $_POST['start'];
//    $rowperpage = $_POST['length']; // Rows display per page
//    $columnIndex = $_POST['order'][0]['column']; // Column index
//    $columnName = $_POST['columns'][$columnIndex]['data']; // Column name
//    $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
//    $searchValue = $_POST['search']['value']; // Search value

//    session_start();  
//    $searchQuery = " (pr_code like '%" . $searchValue . "%') ";
//    $requester = $_SESSION['PRPO_Current_User'];
//    $team = $_SESSION['team_name'];
//    $level = $_SESSION['level'];
//    $subTeam = explode(" - ", $team);
   
//    // Total number of records without filtering
//    if($level == 2) {
//       $query = "SELECT COUNT(*) AS allcount FROM submitted_pr WHERE pr_step >= " . $level . " AND user_report_to like '%" . $subTeam[0] . "%'";
//       // $query = "SELECT COUNT(*) AS allcount FROM submitted_pr WHERE pr_step >= " . $level . " AND ";
//    } else {
//       $query = "SELECT COUNT(*) AS allcount FROM submitted_pr WHERE pr_step >= " . $level;
//    }
//    $result = mysqli_query($con, $query);
//    $row = mysqli_fetch_assoc($result);
//    $totalRecords = $row['allcount'];
   
//    // Total number of records with filtering
//    if($level == 2) {
//       $query = "SELECT COUNT(*) AS allcount_filter FROM submitted_pr WHERE pr_step >= " . $level . " AND " . $searchQuery . " AND user_report_to like '%" . $subTeam[0] . "%'";
//    } else {
//       $query = "SELECT COUNT(*) AS allcount_filter FROM submitted_pr WHERE pr_step >= " . $level . " AND " . $searchQuery;
//    }
//    $result = mysqli_query($con, $query);
//    $row = mysqli_fetch_assoc($result);
//    $totalRecordwithFilter = $row['allcount_filter'];
   
//    // Get data
//    if($level == 2) {
//       $query = "SELECT * FROM submitted_pr WHERE pr_step >= " . $level . " AND " . $searchQuery . " AND user_report_to like '%" . $subTeam[0] . "%'" . " Order by " . $columnName . " " . $columnSortOrder . " LIMIT " . $rowperpage .  " offset " . $start;
//    } else {
//       $query = "SELECT * FROM submitted_pr WHERE pr_step >= " . $level . " AND " . $searchQuery . " Order by " . $columnName . " " . $columnSortOrder . " LIMIT " . $rowperpage .  " offset " . $start;
//    }
    
//    $array = array();
//    $result = mysqli_query($con,$query);
//    while($row=mysqli_fetch_assoc($result)){
//       switch($row['pr_status']) {
//          case 0: $status = "Pendding"; break;
//          case 1: $status = "Approved"; break;
//          case 2: $status = "Rejected"; break;
//          case 3: $status = "Requested more infor"; break;
//          default: $status = ""; break;
//       }
//       if($row['pr_step'] == $level && $row['pr_status'] == 0) {
//          $edit = '<a href="pr_approve.php?id=' . $row['id'] . '"><i class="fas fa-eye"></i></a>';
//       } else {
//          $edit = '<a href="view_purchase.php?id=' . $row['id'] . '"><i class="fas fa-eye"></i></a>';
//       }
//       $array[] = array(
//          "pr_code" => $row['pr_code'],
//          "requester" => $row['requester'],
//          "request_date" => $row['request_date'],
//          // "currency" => $row['currency'],
//          // "require_company" => $row['require_company'],
//          // "supplier" => $row['supplier'],
//          "status" => $row['status'],
//          "pr_step" => $row['pr_reporting_to'],
//          "pr_status" => $status,
//          "edit" => $edit,
//          "delete" => '<a href="#" class="trigger_btn" data-index="' . $row['id'] . '" ><i class="fas fa-trash"></i></a>'
//       );
//    }

//    $response = array(
//       "draw" => intval($draw),
//       "iTotalRecords" => $totalRecords,
//       "iTotalDisplayRecords" => $totalRecordwithFilter,
//       "aaData" => $array
//    );

//    echo json_encode($id);

