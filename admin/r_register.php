<?php
session_start();
header('Content-Type:text/html;charset=utf-8');
$username=$_POST['username'];
$password=$_POST['password'];
$key=$_POST['key'];
$conn=mysqli_connect('localhost','root','123456','Mydisk');
if(!$conn){
    echo"<script type='text/javascript'>alert('数据库连接失败');location='register.html'; </script>";
}


$sql="INSERT INTO root (`username`,`password`) VALUES ('$username', '$password')";
if($key=="SSBsb3ZlIGhzaA==")
{
    $result=mysqli_query($conn,$sql);
    if(!$result){
        echo"<script type='text/javascript'>alert('创建用户失败');location='r_register.html'; </script>";
    }
    echo"<script type='text/javascript'>alert('创建管理员成功');location='../login.html'; </script>";
}else{
    echo"<script type='text/javascript'>alert('许可密钥错误');location='r_register.html'; </script>";
}