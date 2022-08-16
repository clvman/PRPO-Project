<?php 


if (!empty($_GET['file'])) {

    // Security, down allow to pass ANY PATH in your server
    $fileName = basename($_GET['file']);
} else {
	
	echo "<script>alert('No attachment for this ticket !!');window.location = history.back();</script>" ;
    return;
}

$filePath = '../end_user/attachments/'. $fileName;
if (!file_exists($filePath)) {
    return;
}

header("Content-disposition: attachment; filename=" . $fileName);

readfile($filePath);



 ?>