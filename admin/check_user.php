<?php
header('Content-Type:text/html;charset=utf-8');
$conn=mysqli_connect('localhost','root','123456','Mydisk');
if(!$conn)
{
    "<script type='text/javascript'>alert('数据库连接失败');location='admin.html'; </script>";
}
$sql="SELECT `username` FROM `login`";
$result=mysqli_query($conn,$sql);
if(!$result)
{
    echo"<script type='text/javascript'>alert('查看失败');location='admin.html'; </script>";
}
echo "所有用户如下：<br>";
while($row=mysqli_fetch_array($result))
{
    echo $row['username']."<br>";
}
echo "<a href='admin.html'><input type='button' value='返回'></a>";