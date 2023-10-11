<?php
session_start();
header('Content-Type:text/html;charset=utf-8');
$username=$_SESSION['username'];
echo $username;
// 允许上传的图片后缀
$allowedExts = array("gif", "jpeg", "jpg", "png");
$temp = explode(".", $_FILES["file"]["name"]);
//echo $_FILES["file"]["size"];
$extension = end($temp);     // 获取文件后缀名
if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/jpg")
|| ($_FILES["file"]["type"] == "image/pjpeg")
|| ($_FILES["file"]["type"] == "image/x-png")
|| ($_FILES["file"]["type"] == "image/png"))
&& ($_FILES["file"]["size"] < 204800000)   // 小于 20 Mb
&& in_array($extension, $allowedExts))
{
    if ($_FILES["file"]["error"] > 0)
    {
        echo"<script type='text/javascript'>alert('文件上传失败');location='home.html'; </script>";
    }
    else
    {
        $name=$_FILES["file"]["name"];
        $type=$_FILES["file"]["type"];

        // 判断当前目录下的 upload 目录是否存在该文件
        // 如果没有 upload 目录，你需要创建它，upload 目录权限为 777
        if (file_exists("D:/software/Phpstudy/phpstudy_pro/WWW/Mydisk/upload/" . $username."/".$_FILES["file"]["name"]))
        {
            echo $_FILES["file"]["name"] . " 文件已经存在。 ";
        }
        else
        {
        // 如果 upload 目录不存在该文件则将文件上传到 upload 目录下
            
            $up_time=date("Y-m-d H:i:s");
            //$dest= "文件存储在: " . "upload/$username/". $_FILES["file"]["name"];
            $conn=mysqli_connect('localhost','root','123456','Mydisk');
            if(!$conn){
                echo"<script type='text/javascript'>alert('上传失败：数据库连接失败');location='upload_file.html'; </script>";
            }
            $sql="INSERT INTO `file` (`username`,`filename`,`filetype`,`uploadtime`) VALUES ('$username','$name','$type','$up_time')";
            $result=mysqli_query($conn,$sql);
            if(!$result){
                echo"<script type='text/javascript'>alert('上传失败：请求失败');location='upload_file.html'; </script>";
            }
            move_uploaded_file($_FILES["file"]["tmp_name"], "D:/software/Phpstudy/phpstudy_pro/WWW/Mydisk/upload/".$username."/".$_FILES["file"]["name"]);
            echo"<script type='text/javascript'>alert('上传成功');location='ctrl_file.html'; </script>";
        }
    }
}
else
{
    echo"<script type='text/javascript'>alert('非法文件！！');location='ctrl_file.html'; </script>";
}
?>
