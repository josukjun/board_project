<?php
    $connect = mysqli_connect("localhost", "", "", "board_project") or die("fail");

    $id = $_GET['name'];
    $pw = $_GET['pw'];
    $title = $_GET['title'];
    $content = $_GET['content'];
    $date = date('Y-m-d H:i:s');

    $URL = './index.php';

    $query = "insert into board (number,title, content, date, hit, id, password) 
            values(null,'$title', '$content', '$date',0, '$id', '$pw')";
    
    $result = $connect -> query($query);
    if($result){
?>      <script>
            alert("<?php echo "글이 등록되었습니다."?>");
        </script>
<?php
    }

    else{
        echo "fail";
    }
    mysqli_close($connect);
    
?>