<?php
ob_clean();
session_start();
header('Content-Type:text/html;charset=utf-8');
$username=$_SESSION['username'];
$filename=$_GET['filename'];
$download_path="../upload/$username/".$filename;

if(!file_exists($download_path))
{
    echo"下载失败";
    exit;
}
$fp=fopen($download_path,"rb");
$file_size=filesize($download_path);

//http下载需要的响应头 
header("Content-Type: application/octet-stream"); //返回的文件 
header("Accept-Ranges: bytes");   //按照字节大小返回
header("Accept-Length: $file_size"); //返回文件大小
header("Content-Disposition: attachment; filename=".$filename);//这里客户端的弹出对话框，对应的文件名

$buffer=1024; //每次只读1024防止图片过大造成错误
//$buffer_count=0; //保证下载安全性
while(!feof($fp)){
    $file_data=fread($fp,$buffer);
    //$buffer_count+=$buffer;
    echo $file_data;
}

flush();

fclose($fp);

