<html>
<head>
<title>Chat</title>
</head>
<body>

<?php
$dsn  = 'mysql:dbname=Logindb;host=127.0.0.1';
$user = 'root';
$pw   = 'H@chiouji1';

$sql = 'SELECT * FROM logintb';
//$sql = 'SELECT * FROM logintb WHERE loginid = $pid AND password = $ppas';

//SQLを実行
$dbh = new PDO($dsn, $user, $pw);  //接続
$sth = $dbh->prepare($sql);             //SQL準備
$sth->execute();                              //実行

$id = 0;
$lid = 0;
$pas = 'def';
$name = 'def';



//結果を取得
while( ($buff = $sth->fetch()) !== false ){
	if($_POST['id'] === '' || $_POST['pas'] === '')
	{	
		header("Location: ER001.php?error=1");
		exit;
	}
	if($_POST['id'] === $buff['loginid'])
	{
		$lid = $buff['loginid'];
	}
	if($_POST['pas'] === $buff['password'])
	{
		$pas = $buff['password'];
	}
}
if($lid === 0)
{
	if($pas === 'def')
	{
		header("Location: ER001.php?error=3");
		exit;
	}
	header("Location: ER001.php?error=2");
	exit;
}
else if($pas === 'def')
{
	header("Location: ER001.php?error=3");
	exit;
}

$sql = "SELECT * FROM logintb WHERE loginid = '$lid'";
$sth = $dbh->prepare($sql);             //SQL準備
$sth->execute();
while( ($buff = $sth->fetch()) !== false ){
	$name = $buff['dispname'];
}

print ("$name");
?>





</body>
</html>
