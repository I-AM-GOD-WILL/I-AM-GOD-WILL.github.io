<?PHP
    header("Content-Type: text/jsonl; charset=utf8");
   // if(!isset($_POST["submit"])){
   //     exit("错误执行");
   // }//检测是否有submit操作 
    $server="localhost";//主机
    $db_username="ashinz_xyz";//你的数据库用户名
    $db_password="xz181115";//你的数据库密码
    $logid=$_POST['id'];
    $logpasswd=$_POST['passwd'];
    $con = mysqli_connect($server,"root",$db_password,$db_username);//链接数据库
    if(!$con){
        die("can't connect".mysqli_error());//如果链接失败输出错误
    }
    
    if ($logid && $logpasswd){//如果用户名和密码都不为空
             $sql = "select * from user where id = '$logid' and passwd='$logpasswd'";//检测数据库是否有对应的username和password的sql
             $result = mysqli_query($con,$sql);//执行sql
             $rows=mysqli_num_rows($result);//返回一个数值
             if($rows){//0 false 1 true
		echo"成功登入";
                   header("refresh:0;url=welcome.html");//如果成功跳转至welcome.html页面
                   exit;
             }else{
                echo "用户名或密码错误";
		echo($logid);
		echo($logpasswd);
                echo"
                    <script>
                            setTimeout(function(){window.location.href='index.html';},1000);
                    </script>
		"
                ;//如果错误使用js 1秒后跳转到登录页面重试;
             }
             

    }else{//如果用户名或密码有空
                echo "表单填写不完整";
                echo "
                      <script>
                            setTimeout(function(){window.location.href='login.html';},1000);
                      </script>";

                        //如果错误使用js 1秒后跳转到登录页面重试;
    }

    mysqli_close($con);//关闭数据库
?>