<?php  

$localhost = 'localhost';
$username = 'wd52130899';
$password = 'wd52130899';
$database = 'wd52130899';

$conn = mysqli_connect($localhost,$username,$password,$database);
mysqli_query($conn,'set names utf8');
if(!conn){
	die('数据库连接失败！');
}

$delNum = htmlspecialchars($_POST['delNum']);
$maxNum=0;
$sql = 'select * from msg';
$max = mysqli_query($conn,$sql);
while($rows = mysqli_fetch_assoc($max)){
	$maxNum++;
}

if($delNum>$maxNum){
	echo '超出范围！';
}else{
	$sql = 'delete from msg where id='.$delNum;
	mysqli_query($conn,$sql);
	echo '删除完成！';
}

/*重新排序*/
$sql = 'SET @i=0;';
mysqli_query($conn,$sql);
$sql = 'UPDATE msg SET id=(@i:=@i+1);';
mysqli_query($conn,$sql);
$sql = 'ALTER TABLE  tablename  AUTO_INCREMENT=0;';
mysqli_query($conn,$sql);


?>