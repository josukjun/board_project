<?php
    session_start();

    $ceonnect = mysqli_connect("localhost", "root", "1234", "board_project") or die("fail");

    $id=$_GET['id'];
    $pw=$_GET['pw'];

    $query = "select * from member where id='$id'";
    $result = $connect -> query($query);

    //아이디가 있다면 비밀번호 검사
    if(mysqli_num_rows($result)==1){
        $row = mysqli_fetch_assoc($result); //Array ( [seq] => 1 [name] => 홍길동 ) 이런식으로 값이 넘겨짐

        if($row['pw']==$pw){ //비밀번호가 맞다면 세션 생성
            $_SESSION['userid']=$id;
            if(isset($_SESSION['userid'])){ //세션이 세팅된 경우
                ?>
                <script>
                    alert("로그인 되었습니다.");
                    location.replace("./index.php");
                </script>
<?php       }else{  //세션이 세팅되지 않은 경우
                echo "session fail";
            }
        }
        else{                //비밀번호가 맞지 않다면
?>          <script>
                alert("아이디 혹은 비밀번호가 잘못되었습니다.");
                history.back();
            </script>
<?php
        }
    }
    //비밀번호가 없는 경우
    else{
?>      <script>
            alert("아이디 혹은 비밀번호가 잘못되었습니다.");
            history.back();
        </script>
<?php
        }

?>