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
    <header class="fixed z-20 bg-yellow-100 bg-opacity-70 w-full h-[4rem] flex justify-between items-center px-3">
        <a class="h-full" href="../index.php">
            <img class="h-full md:hidden " src="../assets/images/logo-Mobil.png" alt="logo de site">
            <img class="hidden h-full md:block " src="../assets/images/logo-Descktop.png" alt="logo de site">
        </a>
        <div class="w-[50%] md:w-[25vw] flex justify-end gap-2 items-center">
            <button id="Loginbtn" class="w-auto h-auto bg-blue-600 text-white rounded-md px-4 py-1 ">Login</button>
            <a href="../index.php">
                <button class="w-auto h-auto bg-green-500 text-white rounded-md px-4 py-1 ">About</button>
            </a>
        </div>
    </header>
    <section id="géographie" class="w-full h-[100vh]">
        <div class="relative w-full h-full pt-[4rem] md:flex">
            <?php 
                $conmySql = mysqli_connect("localhost", "root", "", "geojunior");
                if (isset($_POST['submit'])) {
                    $email = $_POST['emaillogin'];
                    $password = $_POST['passwordlogin'];
                    $res = mysqli_query($conmySql,"select * from login");
                    $res = $res->fetch_all(MYSQLI_ASSOC);
                    foreach($res as $el){
                        if ($el['email'] == $email && $el['password'] == $password) {
                            echo '<script>location.replace("service.php")</script>';
                            // header("location: service.php");
                        } else if ($el['email'] != $email ||  $el['password'] != $password) {
                            echo '<div id="ModulErreur" class="fixed z-30 w-full h-full bg-black bg-opacity-50 flex justify-center items-center">
                                    <div class="bg-white w-[40%] h-[40vh] rounded-md flex flex-col justify-center items-center gap-y-3">
                                        <span class="text-red-500 text-center">Adresse email ou mot de passe incorrect. Veuillez vérifier vos informations et réessayer.</span>
                                        <button id="OK" class="bg-blue-700 text-white p-1 px-2 rounded-sm">OK</button>
                                    </div>
                                </div>';
                        };
                    };
                };
            ?>
            <div id="ModulLogin" class="fixed w-full h-full bg-black bg-opacity-50 flex justify-center items-center">
                    

                <form action="géographie.php" method="Post" class="bg-white w-[60%] h-[50vh] rounded-md flex flex-wrap justify-center md:justify-end px-[2vw] md:px-[5vw] place-content-center gap-y-[2vh]">
                    <label class="md:w-[40%]"  for="#emaillogin">Email</label>
                    <input id="emaillogin" class="w-[95%] md:w-[60%] h-[2.5rem] border-solid border-2 px-2 rounded-sm" name="emaillogin" type="email" placeholder="exemple@gmail.com">
                    <label class="md:w-[40%]" for="#passwordlogin">Password</label>
                    <input id="passwordlogin" class="w-[95%] md:w-[60%] h-[2.5rem] border-solid border-2 px-2 rounded-sm" name="passwordlogin" type="password" min="8" placeholder="********">
                    <input id="conferme" class="bg-blue-600 px-2 py-1 rounded-[3px] mt-4" name="submit" type="submit" value="Conferme">
                </form>
            </div>
            <div class="bg-slate-200 w-full h-[8rem] md:w-[25%] md:h-full flex flex-col items-center ">
                <a class="w-[50%] md:w-[80%]" <?php echo "href=géographie.php"?>>
                    <button id="Continentbtn" class="continentbtn bg-none w-full  h-[2.6rem] border-solid border-b-[1px] border-black flex items-center gap-[3vw] pl-[10vw] md:pl-[3vw]">
                        <img class="h-[80%]" src="../assets/images/logo-continent.png" alt="logo de continent">
                        <span class="hover:scale-110">Continents</span>
                    </button>  
                </a>
                
                <a class="w-[50%] md:w-[80%]" <?php echo "href=géographie.php?Pays"?>>
                    <button id="Paysbtn" class="bg-none w-full h-[2.6rem] border-solid border-b-[1px] border-black flex items-center gap-[3vw] pl-[10vw] md:pl-[3vw]">
                        <img class="h-[80%]" src="../assets/images/logo-pays.png" alt="logo de pays">
                        <span class="hover:scale-110">Pays</span>
                    </button>
                </a>
                
                <a class="w-[50%] md:w-[80%]" <?php echo "href=géographie.php?Villes"?>>
                    <button id="Villebtn" class="bg-none w-full h-[2.5rem] flex items-center gap-[3vw] pl-[10vw] md:pl-[3vw]">
                        <img class="h-[80%]" src="../assets/images/logo-ville.png" alt="logo de ville">
                        <span class="hover:scale-110">Villes</span>
                    </button>
                </a>
            </div>
            <div class=" relative w-full md:w-[75%] h-full">
                <div class="absolute bg-black w-full h-full -z-10 flex overflow-x-auto">
                    <img class="w-[100vw] h-full opacity-60" src="../assets/images/backround-map.jpg" alt="iamge About">
                </div>

                <!-- Continents -->
                <div id="Continents" class="w-full h-full flex flex-wrap justify-evenly place-content-center <?php if (isset($_GET['Filtre']) || isset($_GET['Villes']) || isset($_GET['Pays'])) { echo "hidden";} ?>">
                    <img id="NorthAm" class="w-[35%] h-[40%]" src="../assets/images/NA-Map.png" alt="Map NA">
                    <img id="Europe" class="w-[20%] h-[30%] mt-4" src="../assets/images/Europe-Map.png" alt="Map Europe">
                    <img id="Asia" class="w-[40%] h-[40%]" src="../assets/images/Asia-Map.png" alt="Map Asia">
                    <img id="SouthAm" class="w-[15%] h-[40%]" src="../assets/images/SA-Map.png" alt="Map SA">
                    <img id="Africa" class="w-[30%] h-[45%] hover:scale-110" src="../assets/images/Africa-Map.png" alt="Map Africa">
                    <img id="Oceania" class="w-[15%] h-[20%]" src="../assets/images/Oceania-Map.png" alt="Map Oceania">
                </div>

                <!-- Pays -->
                <div id="Pays" class="w-full h-full flex flex-wrap justify-evenly gap-3 p-3 overflow-y-auto <?php if (!isset($_GET['Pays'])) { echo "hidden";} ?>">
                    <!-- Afficher les donné des pays à partir de base de donné -->
                    <?php 
                        include("dbconnecte.php");
                        $Pays = mysqli_query($conmySql, "SELECT * FROM pays");
                        $Pays = $Pays -> fetch_all(MYSQLI_ASSOC);
                        foreach($Pays as $element){
                    ?> 
                    <a <?php echo "href=géographie.php?Filtre=" . $element['nom']?>>
                        <div class="cartePays bg-orange-50 bg-opacity-80 rounded-sm w-[10rem] h-[11rem] md:w-[12rem] md:h-[13.5rem] flex flex-col items-center place-content-center hover:scale-[1.02]">
                            <img class="w-[60%]" <?php echo "src =" . FILTRENAME($JsonPays,$element['nom']) ?> alt="Logo de Maroc">
                            <span class="md:text-[2vw] text-center"><?php echo $element['nom'] ?></span>
                            <div>
                                <span class="text-xs md:text-sm">Population :</span>
                                <span class="text-xs md:text-sm font-bold"><?php echo $element['population'] ?></span>
                            </div>
                            <div class="text-center">
                                <span class="text-xs md:text-sm">Langes :</span>
                                <span class="text-xs md:text-sm text-center font-bold"><?php echo $element['langues'] ?></span>
                            </div>
                            <div>
                                <span class="text-xs md:text-sm">Continent :</span>
                                <span class="text-xs md:text-sm font-bold">Africa</span>
                            </div>
                        </div>
                    </a>
                    <?php } ?>
                </div>

                <!-- Villes -->
                <div id="Villes" class="w-full h-full flex flex-wrap justify-evenly gap-3 p-3 overflow-y-auto <?php if (!isset($_GET['Villes']) && (!isset($_GET['Filtre']))) { echo "hidden";}?>">
                    <!-- Affichier les donné des Villes à partir de base de donné -->
                    <?php 
                        $Villes = mysqli_query($conmySql, "SELECT * FROM ville");
                        $Villes = $Villes -> fetch_all(MYSQLI_ASSOC);
                        if (isset($_GET['Filtre'])) {
                            $Filtre = $_GET['Filtre'];
                            foreach($Villes as $Ville){
                                $id_pays = $Ville['id_pays'];
                                $nompays = mysqli_query($conmySql, "SELECT nom FROM pays WHERE id_pays = '$id_pays'");
                                $nompays = mysqli_fetch_assoc($nompays);
                                if ($Filtre == $nompays['nom']) {
                    ?> 

                                <div class="carteVille bg-blue-200 bg-opacity-80 rounded-sm w-[10rem] h-[11rem] md:w-[12rem] md:h-[15rem] grid grid-rows-[20%_45%_10%_15%] items-center justify-items-center gap-y-[2%] hover:scale-[1.02]">
                                    <span class="row-span-1 md:text-[1.4rem] font-bold"><?php echo $Ville['nom'] ?></span>
                                    <span class="text-xs md:text-sm text-center w-[96%]"><?php echo $Ville['description'] ?></span>
                                    <div class="row-span-1">
                                        <span class="text-xs md:text-sm">Type :</span>
                                        <span class="text-xs md:text-[0.9rem] font-bold"><?php echo $Ville['type'] ?></span>
                                    </div>
                                    <div class="row-span-1 flex justify-center gap-[10%] text-center">
                                        <span class="text-xs md:text-[0.9rem] font-bold"><?php echo $nompays['nom'] ?></span>
                                        <img class="w-[20%]" <?php echo "src =" . FILTRENAME($JsonPays,$nompays['nom']) ?> alt="Logo de Maroc">
                                    </div>
                                </div>
                    <?php       }
                            }
                        }else if (!isset($_GET['Filtre'])) {
                            foreach($Villes as $eleme){
                                $id_pays = $eleme['id_pays'];
                                $nompays = mysqli_query($conmySql, "SELECT nom FROM pays WHERE id_pays = '$id_pays'");
                                $nompays = mysqli_fetch_assoc($nompays);
                    ?>
                        <div class="carteVille bg-blue-200 bg-opacity-80 rounded-sm w-[10rem] h-[11rem] md:w-[12rem] md:h-[15rem] grid grid-rows-[20%_45%_10%_15%] items-center justify-items-center gap-y-[2%] hover:scale-[1.02]">
                            <span class="row-span-1 md:text-[1.4rem] font-bold"><?php echo $eleme['nom'] ?></span>
                            <span class="text-xs md:text-sm text-center w-[96%]"><?php echo $eleme['description'] ?></span>
                            <div class="row-span-1">
                                <span class="text-xs md:text-sm">Type :</span>
                                <span class="text-xs md:text-[0.9rem] font-bold"><?php echo $eleme['type'] ?></span>
                            </div>
                            <div class="row-span-1 flex justify-center gap-[10%]">
                                <span class="text-xs md:text-[0.9rem] font-bold"><?php echo $nompays['nom'] ?></span>
                                <img class="w-[20%]" <?php echo "src =" . FILTRENAME($JsonPays,$nompays['nom']) ?> alt="Logo de Maroc">
                            </div>
                        </div>
                    <?php }} ?>
                    <span id="LIENPAYS" class="hidden">Tous</span>

                </div>
            </div>
        </div>
    </section>

    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
    <script type="module" src="../assets/js/script.js"></script>
    <script type="module" src="../assets/js/erreur.js"></script>

</body>
</html>
