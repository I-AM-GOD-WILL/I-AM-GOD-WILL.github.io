<?PHP
    header("Content-Type: text/jsonl; charset=utf8");
   // if(!isset($_POST["submit"])){
   //     exit("����ִ��");
   // }//����Ƿ���submit���� 
    $server="localhost";//����
    $db_username="ashinz_xyz";//������ݿ��û���
    $db_password="xz181115";//������ݿ�����
    $logid=$_POST['id'];
    $logpasswd=$_POST['passwd'];
    $con = mysqli_connect($server,"root",$db_password,$db_username);//�������ݿ�
    if(!$con){
        die("can't connect".mysqli_error());//�������ʧ���������
    }
    
    if ($logid && $logpasswd){//����û��������붼��Ϊ��
             $sql = "select * from user where id = '$logid' and passwd='$logpasswd'";//������ݿ��Ƿ��ж�Ӧ��username��password��sql
             $result = mysqli_query($con,$sql);//ִ��sql
             $rows=mysqli_num_rows($result);//����һ����ֵ
             if($rows){//0 false 1 true
		echo"�ɹ�����";
                   header("refresh:0;url=welcome.html");//����ɹ���ת��welcome.htmlҳ��
                   exit;
             }else{
                echo "�û������������";
		echo($logid);
		echo($logpasswd);
                echo"
                    <script>
                            setTimeout(function(){window.location.href='index.html';},1000);
                    </script>
		"
                ;//�������ʹ��js 1�����ת����¼ҳ������;
             }
             

    }else{//����û����������п�
                echo "����д������";
                echo "
                      <script>
                            setTimeout(function(){window.location.href='login.html';},1000);
                      </script>";

                        //�������ʹ��js 1�����ת����¼ҳ������;
    }

    mysqli_close($con);//�ر����ݿ�
?>