<?php
    $conmySql = mysqli_connect("localhost", "root", "", "geojunior");

    if (!$conmySql) {
    die("Connection failed: " . mysqli_connect_error());
    };

    // fonction de rechercher le src du pays
    $JsonPays = file_get_contents('../assets/data/PaysAfrica.json');
    $JsonPays = json_decode($JsonPays, true);
    function FILTRENAME($JsonPays,$name){
        foreach($JsonPays as $Element){
            if ($Element['name'] == $name) {
                return $Element['img_src'];
            }
        };
    };
?>