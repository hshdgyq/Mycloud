<?php
session_start();
header('Content-Type:text/html;charset=utf-8');
$username=$_SESSION['username'];
$filename=$_POST['filename'];

$conn=mysqli_connect('localhost','root','123456','Mydisk');
if(!$conn)
{
    echo"<script type='text/javascript'>alert('数据库连接失败');location='ctrl_file.html'; </script>";
}

$sql="DELETE FROM `file` WHERE `username`='$username'AND`filename`='$filename'";
$result=mysqli_query($conn,$sql);
if(!$result)
{
    echo"<script type='text/javascript'>alert('删除失败:请求失败');location='ctrl_file.html'; </script>";
}
$file_link="D:/software/Phpstudy/phpstudy_pro/WWW/Mydisk/upload/".$username."/".$filename;

$is_unlink=unlink($file_link);
if(!$is_unlink)
{
    echo "<script type='text/javascript'>alert('删除失败');location='ctrl_file.html'; </script>";
}
echo"<script type='text/javascript'>alert('删除成功');location='ctrl_file.html'; </script>";