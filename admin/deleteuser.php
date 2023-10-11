<?php

function deleteDirectory($dir) {
    if (!is_dir($dir)) {
        return false;
    }
    $files = array_diff(scandir($dir), array('.', '..'));
    foreach ($files as $file) {
        (is_dir("$dir/$file")) ? deleteDirectory("$dir/$file") : unlink("$dir/$file");
    }
    return rmdir($dir);
}

$username=$_POST['username'];
header('Content-Type:text/html;charset=utf-8');
$conn=mysqli_connect('localhost','root','123456','Mydisk');
if(!$conn){
    echo"<script type='text/javascript'>alert('数据库连接失败');location='admin.html'; </script>";
}

$dir_link="D:/software/Phpstudy/phpstudy_pro/WWW/Mydisk/upload/$username";
$is_rmdir=deleteDirectory($dir_link);
$sql1="DELETE FROM `login` WHERE username='$username'";
$sql2="DELETE FROM `file` WHERE username='$username'";
$result1=mysqli_query($conn,$sql1);
$result2=mysqli_query($conn,$sql2);
if($result1&&$result2&&$is_rmdir){
    echo"<script type='text/javascript'>alert('删除成功');location='admin.html'; </script>";
}else{
    echo"<script type='text/javascript'>alert('删除失败');location='admin.html'; </script>";
}