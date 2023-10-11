<?php
header('Content-Type:text/html;charset=utf-8');
$conn=mysqli_connect('localhost','root','123456','Mydisk');
if(!$conn){
    die("数据库连接失败：".mysqli_connect_error());
}

$sql="CREATE TABLE `file`(
    username VARCHAR(30) NOT NULL,
    filename VARCHAR(30) NOT NULL,
    filetype VARCHAR(30) NOT NULL,
    uploadtime VARCHAR(30) NOT NULL)ENGINE=InnoDB DEFAULT CHARSET=utf8 ";
// $sql="INSERT INTO login (`username`,`password`,`phone`) VALUES ('tom', '12345','139988876661')";
$query1=mysqli_query($conn,$sql);
if(!$query1){
    die('创建失败'.$conn->error);
}

echo "创建成功！";
