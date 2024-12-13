<?php
    $conmySql = mysqli_connect("localhost", "root", "", "geojunior");
    if (!empty($_POST['modifierpays'])) {
        $nounom = $_POST['paysname'];
        $noupopulation = $_POST['payspopulation'];
        $noulangues = $_POST['payslangues'];
        $cont = $_POST['payscontinent'];
        $paysid = $_POST['paysid'];
        $noucontient = mysqli_query($conmySql, "SELECT id_continent FROM continent WHERE nom = '$cont'");
        $noucontient = mysqli_fetch_assoc($noucontient);
        $nouidcontient = $noucontient['id_continent'];
        $modifier = "UPDATE pays SET nom = '$nounom', population = $noupopulation, langues = '$noulangues', id_continent = $nouidcontient WHERE id_pays =". $paysid;
        if (mysqli_query($conmySql, $modifier)) {
            header("location: service.php");
        }
    } else if (!empty($_POST['modifierville'])) {
        $nounomv = $_POST['villename'];
        $noutype = $_POST['villetype'];
        $noudescription = $_POST['villedescreption'];
        $pay = $_POST['villepays'];
        $villeid = $_POST['villeid'];
        $nouvcontient = mysqli_query($conmySql, "SELECT id_pays FROM pays WHERE nom = '$pay'");
        $nouvcontient = mysqli_fetch_assoc($nouvcontient);
        $nouvidcontient = $nouvcontient['id_pays'];
        $modifierv = "UPDATE ville SET nom = '$nounomv', type = '$noutype', description = '$noudescription', id_pays = $nouvidcontient WHERE id_ville =". $villeid;
        if (mysqli_query($conmySql, $modifierv)) {
            header("location: service.php");
        }
    };

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
        rel="shortcut icon"
        href="../assets/images/logo.png"
        type="image/x-icon"
    />
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/output.css">
    <link rel="stylesheet" href="../assets/css/input.css">
    <title>Africa Géo Junior</title>
</head>
<body class="relative top-0 left-0">
    <header class="fixed bg-yellow-100 bg-opacity-70 w-full h-[4rem] flex justify-between items-center px-3">
        <a class="h-full" href="../index.php">
            <img class="h-full md:hidden " src="../assets/images/logo-Mobil.png" alt="logo de site">
            <img class="hidden h-full md:block " src="../assets/images/logo-Descktop.png" alt="logo de site">
        </a>
        <div class="w-[50%] md:w-[25vw] flex justify-end gap-2 items-center">
            <a href="../index.php">
                <button class="w-auto h-auto bg-blue-600 text-white rounded-md px-4 py-1 ">Logout</button>
            </a>
            <a href="géographie.php">
                <button class="w-auto h-auto bg-green-500 text-white rounded-md px-4 py-1 ">Géographie</button>
            </a>
        </div>
    </header>
    <section id="service" class="w-full h-[100vh]">
        <div class="w-full h-full pt-[4rem] md:flex">
            <div class="bg-slate-200 w-full h-[8rem] md:w-[20rem] md:h-full flex flex-col items-center ">
                <button id="continentBTN" class="bg-none w-[60%] md:w-[90%] h-[2.6rem] border-solid border-b-[1px] border-black flex items-center gap-[1vw] pl-[8vw] md:pl-[1vw]">
                    <img class="h-[80%]" src="../assets/images/logo-continent.png" alt="logo de continent">
                    <span class="hover:scale-110">Ajouter un Continent</span>
                </button>
                <button id="paysBTN" class="bg-none w-[60%] md:w-[90%] h-[2.6rem] border-solid border-b-[1px] border-black flex items-center gap-[1vw] pl-[8vw] md:pl-[1vw]">
                    <img class="h-[80%]" src="../assets/images/logo-pays.png" alt="logo de pays">
                    <span class="hover:scale-110">Ajouter un Pays</span>
                </button>
                <button id="villeBTN" class="continentbtn bg-none w-[60%] md:w-[90%] h-[2.5rem] flex items-center gap-[1vw] pl-[8vw] md:pl-[1vw]">
                    <img class="h-[80%]" src="../assets/images/logo-ville.png" alt="logo de ville">
                    <span class="hover:scale-110">Ajouter une Ville</span>
                </button>
            </div>
            <div class=" relative w-full h-full">
                <div class="absolute bg-black w-full h-full -z-10 flex overflow-x-auto">
                    <img class="w-[100vw] h-full opacity-60" src="../assets/images/backround-map.jpg" alt="iamge About">
                </div>
            </div>
        </div>
    </section>
    <section class="fixed z-50 top-0 bg-black bg-opacity-50 w-full h-full flex justify-center items-center">
        <!-- Continent
        <div id="ADDContinent" class=" w-full h-full md:px-[10vw] gap-3 p-2">
            <form action="service.php" id="continent-form" class=" w-full h-[30%] flex flex-wrap md:justify-between place-content-evenly ">
                <label class="md:text-[1.2rem] font-bold" for="#continentname">Nom du continent</label>
                <input class="w-[90%] md:w-[60%] h-[6.5vh] rounded-none px-2" id="continentname" name="continentname" type="text" placeholder="Continent" required>
                <div class="w-full flex justify-center md:justify-end gap-2">
                    <input id="Affichercontinentbtn" class="bg-yellow-200 px-2 rounded-sm p-1" type="button" value="Afficher">
                    <input class="bg-blue-200 px-2 rounded-sm p-1" type="submit" value="Ajouter">
                </div>
            </form>
        </div> -->

        <!-- Pays -->
        <?php

            if (isset($_GET['ModP'])) {

                $id_pays = $_GET['ModP'];
                $infop = mysqli_query($conmySql, "SELECT * FROM pays WHERE id_pays = $id_pays");
                $infop = mysqli_fetch_assoc($infop);
                
                $terme = $infop['id_continent'];
                $continent = mysqli_query($conmySql , "SELECT nom FROM continent WHERE id_continent = '$terme'");
                $continent = mysqli_fetch_assoc($continent);
                $nomcontinent = $continent['nom'];
                
                echo '<div class="bg-gray-300 w-[70%] h-[70%] rounded-[0.2rem]  gap-3 py-2 md:px-10">
                        <form action="modifier.php" method="Post" id="Pays-form" class=" w-full h-full flex flex-wrap md:justify-between place-content-evenly">
                            <label class="w-[28%] text-center md:text-start md:text-[1.2rem] font-bold" for="#Paysname">Nom du Pays</label>
                            <input class="w-[90%] md:w-[70%] h-[6.5vh] rounded-none px-2" id="Paysname" name="paysname" type="text" placeholder="Pays" value= "'. $infop['nom'] .'" required>
                            
                            <label class="w-[25%] text-center md:text-start md:text-[1.2rem] font-bold" for="#Payspopulation">Population</label>
                            <input class="w-[90%] md:w-[20%] h-[6.5vh] rounded-none px-2" id="Payspopulation" name="payspopulation" type="number" placeholder="Population" value= '. $infop['population'] .' required>

                            <label class="w-[20%] text-center md:text-start md:text-[1.2rem] font-bold" for="#Payscontinent">Continent</label>
                            <input class="w-[90%] md:w-[20%] h-[6.5vh] rounded-none px-2" id="Payscontinent" name="payscontinent" type="text" placeholder="Continent" value=' .$nomcontinent .' required>

                            <label class="w-[28%] text-center md:text-start md:text-[1.2rem] font-bold" for="#Payslnagues">Langues</label>
                            <input class="w-[90%] md:w-[70%] h-[6.5vh] rounded-none px-2" id="Payslnagues" name="payslangues" type="text" placeholder="Langues" value= "'. $infop['langues'] .'" required>
                            <input class="hidden" name="paysid" type="number" value= "' . $id_pays .'">
                                
                            <div class="w-full flex justify-center md:justify-end gap-2">
                                <input class="bg-green-500 text-white px-2 rounded-sm p-1" name="modifierpays" type="submit" value="Modifier">
                            </div>
                        </form>
                    </div>';
            };

            
            if (isset($_GET['ModV'])) {

                $id_ville = $_GET['ModV'];
                $infov = mysqli_query($conmySql , "SELECT * FROM ville WHERE id_ville = $id_ville");
                $infov = mysqli_fetch_assoc($infov);
                
                $terme1 = $infov['id_pays'];
                $pays = mysqli_query($conmySql, "SELECT nom FROM pays WHERE id_pays = $terme1");
                $pays = mysqli_fetch_assoc($pays);
                $nompays = $pays['nom'];

                echo '<div class="bg-gray-300 w-[70%] h-[70%] rounded-[0.2rem]  gap-3 py-2 md:px-10">
                        <form action="modifier.php" method="Post" id="Pays-form" class=" w-full h-full flex flex-wrap md:justify-between place-content-evenly">
                            <label class="w-full md:w-[28%] text-center md:text-start md:text-[1.2rem] font-bold" for="#Villename">Nom du Ville</label>
                            <input class=" w-[90%] md:w-[70%] h-[6.5vh] rounded-none px-2" id="Villename" name="villename" type="text" placeholder="Ville" value= '. $infov['nom'] .' required>

                            <label class="w-[25%] text-center md:text-start md:text-[1.2rem] font-bold" for="#VilleType">Type</label>
                            <input class=" w-[90%] md:w-[20%] h-[6.5vh] rounded-none px-2" id="VilleType" name="villetype" type="text" placeholder="Type" value= '. $infov['type'] .' required>
                            
                            <label class="w-[20%] text-center md:text-start md:text-[1.2rem] font-bold" for="#VillePays">Pays</label>
                            <input class=" w-[90%] md:w-[20%] h-[6.5vh] rounded-none px-2" id="VillePays" name="villepays" type="text" placeholder="pays" value= '. $nompays .' required>
                            
                            <label class="w-[28%] text-center md:text-start md:text-[1.2rem] font-bold" for="#Villedesc">Descreption</label>
                            <input class=" w-[90%] md:w-[70%] h-[6.5vh] rounded-none px-2" id="VilleDescreption" name="villedescreption" type="text" placeholder="Descreption" value= "'. $infov['description'] .'" required>
                            <input class="hidden" name="villeid" type="number" value= "' . $id_ville .'">
                            
                            <div class="w-full flex justify-center md:justify-end gap-2">
                                <input class="bg-green-500 text-white px-2 rounded-sm p-1" name="modifierville" type="submit" value="Modifier">
                            </div>
                        </form>
                    </div>';
            };
        ?>
    </section>
    <script>
        document.body.classList.toggle("overflow-hidden");
    </script>
</body>
</html>