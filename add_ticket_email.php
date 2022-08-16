 <?php $subject=' New Ticket Alert INC2020060300124'; $to=' amer.alsarayrah@jo.zain.com,amer.alsarayrah@jo.zain.com'; $message=' <!DOCTYPE html>
<html>
<head>
<style>

</head>
<body>

<p>Dears,</p>
<p><b>Ticket ID</b> INC2020060300124 has been created by<b> noc_admin</b> with below details:</p>

<p><b>Product Domain</b> : NCE-TX</p>
<p><b>Ticket Status</b> : Open</p>
<p><b>Service Impact</b> : Yes </p>

<p>Click on below link to view more details</p>
<p><a href="http://192.168.7.6/NCE/vendor/login.php">Vendor Portal</a></p>
<p><a href="http://192.168.7.6/NCE/end_user/login.php">End User Portal</a></p>

<p>Best Regards,</p>
<p>Procurement System</p></a>


'; $headers='MIME-Version: 1.0
Cc:amer.alsarayrah@jo.zain.com
Content-type:text/html;charset=iso-8859-1
From:  NCE Trouble Ticketing<NCE.Trouble.Ticketing@jo.zain.com>

';mail($to,$subject,$message,$headers) ?>