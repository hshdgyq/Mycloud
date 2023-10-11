<?php
header('Content-Type:text/html;charset=utf-8');
$username=$_POST['username'];
$password=$_POST['password'];
$phone=$_POST['phone'];
$conn=mysqli_connect('localhost','root','123456','Mydisk');
if(!$conn){
    echo"<script type='text/javascript'>alert('数据库连接失败');location='register.html'; </script>";
}


$sql="INSERT INTO login (`username`,`password`,`phone`) VALUES ('$username', '$password','$phone')";

$result=mysqli_query($conn,$sql);
if(!$result){
    echo"<script type='text/javascript'>alert('创建用户失败');location='register.html'; </script>";
}
echo"<script type='text/javascript'>alert('创建用户成功');location='login.html'; </script>";

mkdir("../upload/$username",0777,true);