<?php
session_start();
header('Content-Type:text/html;charset=utf-8');
$username=$_POST['username'];
$password=$_POST['password'];
$_SESSION['username']=$username;
$conn=mysqli_connect('localhost','root','123456');
if(!$conn){
    echo"<script type='text/javascript'>alert('数据库连接失败');location='login.html'; </script>";
}

if($username==""){
    echo"<script type='text/javascript'>alert('用户名不能为空');location='login.html'; </script>";
}

if($password==""){
    echo"<script type='text/javascript'>alert('密码不能为空');location='login.html'; </script>";
}


mysqli_select_db($conn,'Mydisk');
$sql="SELECT * FROM login";
$r_sql="SELECT * FROM root";
$result=mysqli_query($conn,$sql);
$r_result=mysqli_query($conn,$r_sql);
while($r_row=mysqli_fetch_array($r_result))
{
    if($username==$r_row['username']&&$password==$r_row['password'])
    {
        echo"<script type='text/javascript'>alert('管理员，欢迎您！');location='../admin/admin.html'; </script>";
    }
}
while($row=mysqli_fetch_array($result))
{
    if($username==$row['username']&&$password==$row['password'])
    {
        echo"<script type='text/javascript'>alert('登录成功,欢迎你！');location='home.php'; </script>";
    }
}
mysqli_close($conn);
echo"<script type='text/javascript'>alert('用户名或密码错误');location='login.html'; </script>";

