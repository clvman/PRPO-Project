 <?php $subject=' Ticket INC2020053100109 has been Resolved'; $to=' amer.alsarayrah@jo.zain.com'; $message=' <!DOCTYPE html>
<html>
<head>
<style>

</head>
<body>

<p>Dears,</p>
<p><b>Ticket ID</b> INC2020053100109 has been Resolved by<b> mousa.abualtayeb</b> 
<p>Click on below link to view more details</p>
<p><a href="http://192.168.7.6/NCE/vendor/login.php">Vendor Portal</a></p>
<p><a href="http://192.168.7.6/NCE/end_user/login.php">End User Portal</a></p>

<p>Best Regards,</p>
<p>Procurement System</p></a>



'; $headers='MIME-Version: 1.0
Cc:amer.alsarayrah@jo.zain.com,amer.alsarayrah@jo.zain.com,amer.alsarayrah@jo.zain.com
Content-type:text/html;charset=iso-8859-1
From:  NCE Trouble Ticketing<NCE.Trouble.Ticketing@jo.zain.com>

';mail($to,$subject,$message,$headers) ?>