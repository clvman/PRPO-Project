 <?php $subject=' New Ticket Alert INC2020082600178'; $to=' obaida.masarweh@huawei.com,mohammad.omoush@huawei.com'; $message=' <!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>

<p>Dears,</p>
<p><b>Ticket ID</b> INC2020082600178 has been created by<b> Amer.AlSarayrah</b> with below details:</p>

<p><b>Product Domain</b> : NCE-FAN</p>
<p><b>Ticket Status</b> : Open</p>
<p><b>Service Impact</b> : No </p>
<p>Click on below link to view more details</p>
<p><a href="http://192.168.7.6/NCE/vendor/login.php">Vendor Portal</a></p>
<p><a href="http://192.168.7.6/NCE/end_user/login.php">End User Portal</a></p>

<p>Best Regards,</p>
<p>Procurement System</p></a>



'; $headers='MIME-Version: 1.0
Cc:Amer.AlSarayrah@jo.zain.com,noc.jo@jo.zain.com,Amer.AlSarayrah@jo.zain.com
Content-type:text/html;charset=iso-8859-1
From:  NCE Trouble Ticketing<NCE.Trouble.Ticketing@jo.zain.com>

';mail($to,$subject,$message,$headers) ?>