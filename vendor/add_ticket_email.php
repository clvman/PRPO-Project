 <?php $subject=' New Ticket Alert INC2020053100078'; $to=' amer.alsarayrah@jo.zain.com'; $message=' <!DOCTYPE html>
<html>
<head>
<style>

</head>
<body>

<p>Dears,</p>
<p><b>Ticket ID</b> INC2020053100078 has been created by<b> vendor_user1</b> with below details:</p>

<p><b>Product Domain</b> : FAN</p>
<p><b>Ticket Status</b> : Pending</p>
<p><b>Service Impact</b> : Yes </p>

<p>Click on below link to view more details</p>


'; $headers='MIME-Version: 1.0
Cc:amer.alsarayrah@jo.zain.com,amer.alsarayrah@jo.zain.com,amer.alsarayrah@jo.zain.com
Content-type:text/html;charset=iso-8859-1
From:  NCE Trouble Ticketing<NCE.Trouble.Ticketing@jo.zain.com>

';mail($to,$subject,$message,$headers) ?>