<?php
$conn=mysqli_connect('localhost','root','123456','prpo');
 $result_array = array();
if($_POST["query"] != '') {
	$searchData = explode(",", $_POST["query"]);
	$searchValues = "'" . implode("', '", $searchData) . "'";
	$queryQuery = "
		SELECT *
		FROM items 
		WHERE material_code IN (".$searchValues.")";

	$resultset = mysqli_query($conn, $queryQuery) or die("database error:". mysqli_error($conn));
	while( $developer = mysqli_fetch_assoc($resultset) ) {
		$result_array[] = $developer;
	}

}


// $htmlRows = '';
// if($totalRecord) {
//  while( $developer = mysqli_fetch_assoc($resultset) ) {
//  	$total_amount=0;

//   $htmlRows .= '
// 	  <tr>
// 	   <td>'.$developer["material_code"].'</td>
// 	   <td>'.$developer["item_description"].'</td>
	   
// 	   <td id="QTY">  <input required type="number" class="form-control col-4" id="Amount_id" min="1"  name="Amount_id" value="1"></td>
 
//  	   	   <td id="loop" >'.$developer["Amount"].'</td>
//  	   	    <td>'.$developer["Amount"].'</td>
//   </tr>';
//   //$total_amount = $total_amount+$developer["Amount"];
//  }
// //echo $total_amount;
 
// } else {
// 	$htmlRows .= '
// 		<tr>
// 			<td colspan="5" align="center">No record found.</td>
// 		</tr>';
// }
// $data = array(
// 	"html" => $htmlRows		
// );
echo json_encode($result_array);	
?>