<?php
    include '../core/db.php';
    include '../core/write_session.php';
    session_start();
    
    $num = $_REQUEST['num'];
    $sql = "SELECT * FROM riple WHERE num='$num'";
    $res = mysqli_query($conn,$sql) or die(mysqli_error($conn));
    $rows = mysqli_fetch_array($res);
    $delete = "DELETE FROM riple WHERE num = '$num'";
    if($rows['id'] !=$_SESSION['username']){
    ?>
        <script>
            alert("권한이 없습니다.");
            history.back();
        </script>
<?php   } else {
        mysqli_query($conn,$delete);
?>      <script>
            alert("삭제되었습니다.");
            history.back();
        </script>    
<?php   }
?>
