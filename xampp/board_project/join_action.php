<?php
    $connect = mysqli_connect("localhost", "root", "1234", "board_project") or die("fail");

    $id = $_GET['id'];
    $pw = $_GET['pw'];
    $email = $_GET['email'];

    $date = date('Y-m-d H:i:s');

    $query = "insert into member (id, pw, mail, date, permit) values ('$id', '$pw', '$email', '$date', 0)";
    //id 중복체크
    $query_idcheck = "select * from member where id='$id'";
    $idcheck_result = mysqli_query($connect, $query_idcheck);
    $count = mysqli_num_rows($idcheck_result); //총 레코드 수 반환 함수 사용
    if($count == 0){
        $result = mysqli_query($connect, $query); //$connect->query($query);
    }
    else{
?>      <script>
            alert("이미 다른 아이디가 있습니다.");
            history.back();
        </script>
<?php
    }
    if($result){ //저장이 됐다면 result는 True -> 가입완료
?>      <script>
            alert("가입 되었습니다.");
            location.replace("login.php");
        </script>
<?php
    }
    else{
?>      <script>
            alert("fail");
        </script>
<?php
    }
    mysqli_close($connect);
?>