<?php 
    include('dbconnecte.php');
    $email = $_POST['emaillogin'];
    $password = $_POST['passwordlogin'];
    $res = mysqli_query($conmySql,"select * from login");
    $res = $res->fetch_all(MYSQLI_ASSOC);
    foreach($res as $el){
        if ($el['email'] == $email && $el['password'] == $password) {
            echo '<script>location.replace("service.php")</script>';
            // header("location: ../index.php");
        } else if ($el['email'] == $email &&  $el['password'] != $password) {
            echo "L'adresse email n'est pas valide.";
            exit();
        } else {
            echo "L'adresse email n'exeste pas.";
            exit();
        }
    }
?>