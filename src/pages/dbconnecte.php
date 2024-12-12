<?php 
    $conmySql = mysqli_connect("localhost", "root", "", "geojunior");
    $email = $_POST['emaillogin'];
    $password = $_POST['passwordlogin'];
    $sql = "select * from login";
    $res = $conmySql->query($sql);
    $res = $res->fetch_all(MYSQLI_ASSOC);
    foreach($res as $el){
        if ($el['email'] == $email && $el['password'] == $password) {
            echo '<script>location.replace("service.php")</script>';
            // header("location: service.php");

        }
        //  else if ($el['email'] == $email && $el['password'] != $password) {
        //     # code...
        // }
    }
?>