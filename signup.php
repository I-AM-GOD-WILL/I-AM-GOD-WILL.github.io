<?php 
    header("Content-Type:text/jsonl; charset=utf8");

 //   if(!isset($_POST['submit'])){
  //      exit("错误执行");
   // }//判断是否有submit操作

    $server="localhost";//主机
    $db_username="ashinz_xyz";//你的数据库用户名
    $db_password="xz181115";//你的数据库密码
    $regid=$_POST['id'];
       $regpasswd=$_POST[passwd];
       $regname=$_POST[name];
    $con = mysqli_connect($server,"root",$db_password,$db_username);//链接数据库
    if(!$con){
        die("can't connect".mysqli_error());//如果链接失败输出错误
    }
    
  //  mysql_select_db('ashinz_xyz',$con);//选择数据库
    $q="insert into user(id,passwd,name) values ('$regid','$regpasswd','$regname')";//向数据库插入表单传来的值的sql
    $reslut=mysqli_query($con,$q);//执行sql
    if (!$reslut)
	{
        die('Error: ' . mysqli_error($con));//如果sql执行失败输出错误
    } else
	{
        echo json_encode(200);//成功输出注册成功
    }
    mysqli_close($con);//关闭数据库
?>