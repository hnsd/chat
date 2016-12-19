<html>
<head>
<title>Chat-Error</title>
</head>
<body>

<h1>Chat</h1>
<font size="5" color="red">ERROR</font></br>
<?php
if($_GET['error'] === '1')
{
	echo "<font color = 'red'> Plese input your id and password. </font>";
}
else if($_GET['error'] === '2')
{
	echo "<font color = 'red'> Notfound id. </font>";
}
else if($_GET['error'] === '3')
{
	echo "<font color = 'red'> ID or Password is incorrect. </font>";
}
?>
</br>
<button type="button" onclick="history.back()">戻る</button>

</body>
</html>
