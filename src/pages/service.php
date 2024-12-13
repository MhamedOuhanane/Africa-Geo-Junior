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

        $verification = mysqli_query($conmySql, "SELECT * FROM pays WHERE nom = '$villename'");
        $verification = $verification -> fetch_all(MYSQLI_ASSOC);
        var_dump($verification);

        if ($verification == '{}') {
            $insertville = "INSERT INTO ville(nom, description, type, id_pays) VALUES ('$villename', '$villedescreption', '$villetype', $id_pays)";
            if (mysqli_query($conmySql,$insertville)) {
                "Location: service.php?message=L'ajout du Ville ".$villename." à la liste a été validé avec succès et enregistré dans la liste des villes";
            } else{
                $ERRUE = mysqli_error($conmySql);
                echo '<script>location.replace("service.php?Erreur='. $ERRUE . '")</script>';
            };
        } else {
            $ERRUE = "La ville " . $villename . " déjà existe dans la listes des villes.";
            echo '<script>location.replace("service.php?Erreur='. $ERRUE . '")</script>';
        };

    } else if (!empty($_POST['submitpays'])) {

        $paysname = $_POST['paysname'];
        $payspopulation = $_POST['payspopulation'];
        $payslnagues = $_POST['payslnagues'];
        $payscontinent = $_POST['payscontinent'];

        $forigncontinent = mysqli_query($conmySql, "SELECT id_continent FROM continent WHERE nom = '$payscontinent'");
        $forigncontinent = mysqli_fetch_assoc($forigncontinent);
        $id_continent = $forigncontinent['id_continent'];

        $verification = mysqli_query($conmySql, "SELECT * FROM pays WHERE nom = '$paysname'");
        $verification = mysqli_fetch_array($verification);

        if ($verification[0] == 0 ) {
            $insertpays = "INSERT INTO pays(nom, population, langues, id_continent) VALUES ('$paysname', $payspopulation, '$payslnagues', $id_continent)";
            if (mysqli_query($conmySql,$insertpays)) {
                header("Location: service.php?message=L'ajout du pays ".$paysname." à la liste a été validé avec succès et enregistré dans la liste des pays");
            }   else{
                $ERRUE = mysqli_error($conmySql);
                echo '<script>location.replace("service.php?Erreur='. $ERRUE . '")</script>';
            };
        } else {
            $ERRUE = "Le pays " . $nom_pays . " existe déjà dans la listes des pays.";
            echo '<script>location.replace("service.php?Erreur='. $ERRUE . '")</script>';
        };
    } else if (isset($_GET['continentname'])) {
        $Continent = $_GET['continentname'];

        $verification = mysqli_query($conmySql, "SELECT * FROM continent WHERE nom = '$Continent'");
        $verification = mysqli_fetch_array($verification);
        
        if ($verification[0] == 0) {
            $nouvcont = mysqli_query($conmySql, "INSERT INTO continent(nom) VALUES ('$Continent')");
            if (mysqli_query($conmySql,$insertpays)) {
                header("Location: service.php?message=L'ajout du Continent ". $Continent ." à la liste a été validé avec succès et enregistré dans la liste des continent");
            }   else{
                $ERRUE = mysqli_error($conmySql);
                echo '<script>location.replace("service.php?Erreur='. $ERRUE . '")</script>';
            };
        } else {
            $ERRUE = "Le Continent " . $Continent . " existe déjà dans la listes des continent.";
            echo '<script>location.replace("service.php?Erreur='. $ERRUE . '")</script>';
        };
    }

    if (isset($_GET['Supp'])) {
        $Supp = $_GET['Supp'];

        if ($Supp > 0) {
            $supprimer = "DELETE FROM pays WHERE id_pays = $Supp";
            if (mysqli_query($conmySql, $supprimer)){
                header("Location: service.php?message=Le pays a été supprimé avec succès de la liste.");
            };
        } else if ($Supp < 0) {
            $Supp *= (-1);
            $supprimer = "DELETE FROM ville WHERE id_ville = $Supp";
            if (mysqli_query($conmySql, $supprimer)){
                header("Location: service.php?message=La ville a été supprimé avec succès de la liste.");
            };
        }
    } else if (isset($_GET['dell'])) {
        $dell = $_GET['Supp'];
        $supprimer = "DELETE FROM continent WHERE id_continent = $dell";
        if (mysqli_query($conmySql, $supprimer)){
            header("Location: service.php?message=Le Continent a été supprimé avec succès de la liste.");
        };
    }
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
    <header class="fixed z-10 bg-yellow-100 bg-opacity-70 w-full h-[4rem] flex justify-between items-center px-3">
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
    <section id="service" class="relative w-full h-[100vh]">


        <?php 
            if (isset($_GET['Erreur'])) {
                echo '<div id="ModulErreur" class="fixed z-30 w-full h-full bg-black bg-opacity-50 flex justify-center items-center">
                            <div class="bg-white w-[60%] h-[50vh] md:w-[40%] md:h-[40vh] rounded-md flex flex-col justify-center items-center gap-y-3">
                                <span class="w-[90%] text-red-500 text-center">' .$_GET['Erreur'] .'</span>
                                <a href="service.php">
                                    <button id="OK" class="bg-blue-700 text-white p-1 px-2 rounded-sm">OK</button>
                                </a>
                            </div>
                        </div>';
            } else if (isset($_GET['message'])) {
                echo '<div id="ModulErreur" class="fixed z-30 w-full h-full bg-black bg-opacity-50 flex justify-center items-center">
                            <div class="bg-white w-[60%] h-[50vh] md:w-[40%] md:h-[40vh] rounded-md flex flex-col justify-center items-center gap-y-3">
                                <span class="w-[90%] text-green-500 text-center">' .$_GET['message'] .'</span>
                                <a href="service.php">
                                    <button id="OK" class="bg-blue-700 text-white p-1 px-2 rounded-sm">OK</button>
                                </a>
                            </div>
                        </div>';
            } ;
        ?>

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

                <!-- Continent -->
                <div id="ADDContinent" class=" w-full h-full md:px-[10vw] gap-3 p-2">
                    <form action="service.php" id="continent-form" class=" w-full h-[30%] flex flex-wrap md:justify-between place-content-evenly ">
                        <label class="md:text-[1.2rem] font-bold" for="#continentname">Nom du continent</label>
                        <select class="w-[90%] md:w-[60%] h-[6.5vh] rounded-none px-2" id="continentname" name="continentname">
                            <option value="Africa">Africa</option>
                            <option value="Asia">Asia</option>
                            <option value="Europe">Europe</option>
                            <option value="North Amirica">North Amirica</option>
                            <option value="Oceania">Oceania</option>
                            <option value="South Amirica">South Amirica</option>
                        </select>
                        <div class="w-full flex justify-center md:justify-end gap-2">
                            <input id="Affichercontinentbtn" class="bg-yellow-200 px-2 rounded-sm p-1" type="button" value="Afficher">
                            <input class="bg-blue-200 px-2 rounded-sm p-1" type="submit" value="Ajouter">
                        </div>
                    </form>

                    <!-- Affichage des contnient -->
                    <div id="AffContinents" class="w-full h-[65%] gap-y-2 py-1 hidden">
                        <div class="bg-gray-200 w-full h-[2.5rem] border-gray-500 border-[1px] grid grid-cols-[10%_50%_20%_10%_10%] items-center justify-items-center">
                            <span class=" font-bold">Id</span>
                            <span class=" font-bold">Continent</span>
                            <span class=" font-bold">Logo</span>
                        </div>
                        <div class="w-full h-[95%] overflow-y-auto">
                            <!-- return les donné des continent à partir de base de donné -->
                            <?php 
                                include("dbconnecte.php");
                                $Pays = mysqli_query($conmySql, "SELECT * FROM continent");
                                $Pays = $Pays -> fetch_all(MYSQLI_ASSOC);
                                foreach($Pays as $Element){
                            ?> 
                                <div class="bg-white w-full h-[2.5rem] border-gray-500 border-[1px] grid grid-cols-[10%_50%_20%_10%_10%] items-center justify-items-center">
                                    <span><?php $Element['id_continent'] ?></span>
                                    <span  class="text-[1vw] md:text-[1.6vw] text-center"><?php $Element['nom'] ?></span>
                                    <img class="w-[35%] md:w-[30%]" src="../assets/images/icone-Africa.jpg" alt="Icone De contnient">
                                    <button class="ModifierContinent w-[35%] md:w-[30%]">
                                        <img class="w-full" src="../assets/images/Modi.png" alt="bouton de modification">
                                    </button>
                                    <button  class="DeleteContnient w-[35%] md:w-[30%]">
                                        <a <?php echo "href=service.php?dell=" . $Element['id_continent'] ?>>
                                            <img class="w-full" src="../assets/images/x-button.png" alt="bouton de suppression">
                                        </a>
                                        </button>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>

                <!-- Pays -->
                <div id="ADDPays" class="w-full h-full  gap-3 p-2 md:px-10 hidden">

                    <form action="service.php" method="Post" id="Pays-form" class=" w-full h-full flex flex-wrap md:justify-between place-content-evenly">
                        <label class="w-[28%] text-center md:text-start md:text-[1.2rem] font-bold" for="#Paysname">Nom du Pays</label>
                        <input class="w-[90%] md:w-[70%] h-[6.5vh] rounded-none px-2" id="Paysname" name="paysname" type="text" placeholder="Pays" required>

                        <label class="w-[25%] text-center md:text-start md:text-[1.2rem] font-bold" for="#Payspopulation">Population</label>
                        <input class="w-[90%] md:w-[20%] h-[6.5vh] rounded-none px-2" id="Payspopulation" name="payspopulation" type="number" placeholder="Population" required>
                        
                        <label class="w-[20%] text-center md:text-start md:text-[1.2rem] font-bold" for="#Payscontinent">Continent</label>
                        <input class="w-[90%] md:w-[20%] h-[6.5vh] rounded-none px-2" id="Payscontinent" name="payscontinent" type="text" placeholder="Continent" required>
                        
                        <label class="w-[28%] text-center md:text-start md:text-[1.2rem] font-bold" for="#Payslnagues">Langues</label>
                        <input class="w-[90%] md:w-[70%] h-[6.5vh] rounded-none px-2" id="Payslnagues" name="payslnagues" type="text" placeholder="Langues" required>
                        
                        <div class="w-full flex justify-center md:justify-end gap-2">
                            <input id="Afficherpaysbtn" class="bg-yellow-200 px-2 rounded-sm p-1" type="button" value="Afficher">
                            <input class="bg-blue-200 px-2 rounded-sm p-1" name="submitpays" type="submit" value="Ajouter">
                        </div>
                    </form>
                </div>
                
                <!-- Affichage des pays -->
                <div id="AffPays" class="w-full h-[96%] self-center p-3 hidden">
                    <div class="bg-gray-200 w-full h-[2.5rem] border-gray-500 border-[1px] grid grid-cols-[6%_20%_14%_20%_10%_10%_10%_10%] items-center justify-items-center">
                        <span class=" font-bold">Id</span>
                        <span class="text-xs md:text-sm font-bold">Pays</span>
                        <span class="text-xs md:text-sm font-bold">Population</span>
                        <span class="text-xs md:text-sm font-bold">Langues</span>
                    </div>

                    <div class="w-full h-[95%] overflow-y-auto">
                        <!-- return les donné des pays à partir de base de donné -->
                        <?php 
                            include("dbconnecte.php");
                            $Pays = mysqli_query($conmySql, "SELECT * FROM pays");
                            $Pays = $Pays -> fetch_all(MYSQLI_ASSOC);
                            foreach($Pays as $Ele){
                        ?> 

                        <div class="bg-white w-full h-auto border-gray-500 border-[1px] grid grid-cols-[6%_20%_14%_20%_10%_10%_10%_10%] items-center justify-items-center">
                            <span><?php echo $Ele['id_pays'] ?></span>
                            <span  class="text-[1vw] md:text-[1.6vw] text-center"><?php echo $Ele['nom'] ?></span>
                            <span class="text-xs md:text-sm"><?php echo $Ele['population'] ?></span>
                            <span class="text-xs md:text-sm text-center"><?php echo $Ele['langues'] ?></span>
                            <img class="w-[65%] md:w-[50%]" <?php echo "src =" . FILTRENAME($JsonPays,$Ele['nom']) ?> alt="Logo de Pays">
                            <img class="w-[65%] md:w-[45%]" src="../assets/images/icone-Africa.jpg" alt="Icone de Continent">
                            <button class="ModifierPays w-[25%]">
                                <a <?php echo "href=modifier.php?ModP=" . $Ele['id_pays']?>>
                                    <img class="w-full" src="../assets/images/Modi.png" alt="bouton de modification">
                                </a>
                            </button>
                            <button  class="DeletePays w-[25%]">
                                <a <?php echo "href=service.php?Supp=" . $Ele['id_pays'] ?>>
                                    <img class="w-full" src="../assets/images/x-button.png" alt="bouton de suppression">
                                </a>
                                </button>
                        </div>
                        <?php } ?>
                    </div>
                </div>

                <!-- Villes -->
                <div id="ADDVille" class="w-full h-full  gap-3 p-2 md:px-10 hidden">
                    <form action="service.php" method="Post" id="Pays-form" class=" w-full h-full flex flex-wrap md:justify-between place-content-evenly">
                        <label class="w-[28%] text-center md:text-start md:text-[1.2rem] font-bold" for="#Villename">Nom du Ville</label>
                        <input class="w-[90%] md:w-[70%] h-[6.5vh] rounded-none px-2" id="Villename" name="villename" type="text" placeholder="Ville" required>

                        <label class="w-[25%] text-center md:text-start md:text-[1.2rem] font-bold" for="#VilleType">Type</label>
                        <input class="w-[90%] md:w-[20%] h-[6.5vh] rounded-none px-2" id="VilleType" name="villetype" type="text" placeholder="Type" required>
                        
                        <label class="w-[20%] text-center md:text-start md:text-[1.2rem] font-bold" for="#VillePays">Pays</label>
                        <input class="w-[90%] md:w-[20%] h-[6.5vh] rounded-none px-2" id="VillePays" name="villepays" type="text" placeholder="Pays" required>
                        
                        <label class="w-[28%] text-center md:text-start md:text-[1.2rem] font-bold" for="#Villedesc">Descreption</label>
                        <input class="w-[90%] md:w-[70%] h-[6.5vh] rounded-none px-2" id="VilleDescreption" name="villedescreption" type="text" placeholder="Descreption" required>
                        
                        <div class="w-full flex justify-center md:justify-end gap-2">
                            <input id="Affichervillebtn" class="bg-yellow-200 px-2 rounded-sm p-1" type="button" value="Afficher">
                            <input class="bg-blue-200 px-2 rounded-sm p-1" name="submitville" type="submit" value="Ajouter">
                        </div>
                    </form>
                </div>

                <!-- Affichage des villes -->
                <div id="AffVilles" class="w-full h-[96%] p-3 hidden">
                    <div class="bg-gray-200 w-full h-[2.5rem] border-gray-500 border-[1px] grid grid-cols-[10%_15%_30%_15%_10%_10%_10%] items-center justify-items-center">
                        <span class=" font-bold">Id</span>
                        <span class="text-xs md:text-sm font-bold">Ville</span>
                        <span class="text-xs md:text-sm font-bold">Descreption</span>
                        <span class="text-xs md:text-sm font-bold">Type</span>
                    </div>

                    <div class="w-full h-[95%] overflow-y-auto ">
                        <!-- Affichier les donné des Villes à partir de base de donné -->
                        <?php 
                            $Villes = mysqli_query($conmySql, "SELECT * FROM ville");
                            $Villes = $Villes -> fetch_all(MYSQLI_ASSOC);
                            foreach($Villes as $Ville){
                                $id_pays = $Ville['id_pays'];
                                $nompays = mysqli_query($conmySql, "SELECT nom FROM pays WHERE id_pays = '$id_pays'");
                                $nompays = mysqli_fetch_assoc($nompays);
                        ?> 
                        <div class="bg-gray-100 w-full h-auto border-gray-500 border-[1px] grid grid-cols-[10%_15%_30%_15%_10%_10%_10%] items-center py-1 justify-items-center">
                            <span><?php echo $Ville['id_ville'] ?></span>
                            <span class="text-[1vw] md:text-[1.6vw]"><?php echo $Ville['nom'] ?></span>
                            <span class="text-xs md:text-sm text-center h-auto w-[96%]"><?php echo $Ville['description'] ?></span>
                            <span class="text-xs md:text-[0.9rem]"><?php echo $Ville['type'] ?></span>
                            <img class="w-[50%]" <?php echo "src =" . FILTRENAME($JsonPays,$nompays['nom']) ?> alt="Logo de Maroc">
                            <button class="MOdifierVille w-[30%]">
                                <a <?php echo "href=modifier.php?ModV=" . $Ville['id_ville'] ?>>
                                    <img class="w-full" src="../assets/images/Modi.png" alt="bouton de modification">
                                </a>
                            </button>
                            <button  class="DeleteVille w-[30%]">
                                <a <?php echo "href=service.php?Supp=" . $Ville['id_ville'] * (-1) ?>>
                                    <img class="w-full" src="../assets/images/x-button.png" alt="bouton de suppression">
                                </a>
                            </button>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script type="module" src="../assets/js/service.js"></script>
</body>
</html>
