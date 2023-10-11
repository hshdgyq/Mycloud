
<?php
session_start();
header('Content-Type:text/html;charset=utf-8');
$username=$_SESSION['username'];

$conn=mysqli_connect('localhost','root','123456','Mydisk');
if(!$conn)
{
    echo"<script type='text/javascript'>alert('数据库连接失败');location='ctrl_file.html'; </script>";
}
$sql="SELECT `filename`,`filetype`,`uploadtime` FROM `file` WHERE `username`='$username'";

$result=mysqli_query($conn,$sql);
if(!$result){
    echo"<script type='text/javascript'>alert('查询失败');location='ctrl_file.html'; </script>";
}

while($row=mysqli_fetch_array($result))
{
    echo "文件名：".$row['filename']."文件格式：".$row['filetype']."文件上传时间：".$row['uploadtime']."<br>";
}
echo "<a href='ctrl_file.html'><input type='button' value='返回'></a>";
?>
