<?php 
    $conmySql = mysqli_connect("localhost", "root", "", "geojunior");
    if (isset($_POST['submitville'])) {

        $villename = $_POST['villename'];
        $villetype = $_POST['villetype'];
        $villedescreption = $_POST['villedescreption'];
        $villepays = $_POST['villepays'];

        $forignpays = mysqli_query($conmySql, "SELECT id_pays FROM pays WHERE nom = '$villepays'");
        $forignpays = mysqli_fetch_assoc($forignpays);
        $id_pays = $forignpays['id_pays'];

        $insertville = "INSERT INTO ville(nom, description, type, id_pays) VALUES ('$villename', '$villedescreption', '$villetype', $id_pays)";
        if (mysqli_query($conmySql,$insertville)) {
            header("location: service.php");
        };

    } else if (!empty($_POST['submitpays'])) {

        $paysname = $_POST['paysname'];
        $payspopulation = $_POST['payspopulation'];
        $payslnagues = $_POST['payslnagues'];
        $payscontinent = $_POST['payscontinent'];

        $forigncontinent = mysqli_query($conmySql, "SELECT id_continent FROM continent WHERE nom = '$payscontinent'");
        $forigncontinent = mysqli_fetch_assoc($forigncontinent);
        $id_continent = $forigncontinent['id_continent'];

        $insertpays = "INSERT INTO pays(nom, population, langues, id_continent) VALUES ('$paysname', $payspopulation, '$payslnagues', $id_continent)";
        if (mysqli_query($conmySql,$insertpays)) {
            header("location: service.php");
        }

    } else{
        echo "hello";
    };

?>