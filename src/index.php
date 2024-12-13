
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
        rel="shortcut icon"
        href="./assets/images/logo.png"
        type="image/x-icon"
    />
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/output.css">
    <link rel="stylesheet" href="./assets/css/input.css">
    <title>Africa Géo Junior</title>
</head>
<body class="relative top-0 left-0">
    <header class="fixed z-20 bg-yellow-100 bg-opacity-70 w-full h-[4rem] flex justify-between items-center px-3">
        <a class="h-full" href="index.php">
            <img class="h-full md:hidden " src="./assets/images/logo-Mobil.png" alt="logo de site">
            <img class="hidden h-full md:block " src="./assets/images/logo-Descktop.png" alt="logo de site">
        </a>
        <div class="w-[50%] md:w-[25vw] flex justify-end gap-2 items-center">
            <button id="Loginbtn" class="w-auto h-auto bg-blue-600 text-white rounded-md px-4 py-1 ">Login</button>
            
        </div>
    </header>
    <section id="About" class="relative w-full h-[100vh]">

        <?php
            $conmySql = mysqli_connect("localhost", "root", "", "geojunior");
            if (isset($_POST['submit'])) {
                $email = $_POST['emaillogin'];
                $password = $_POST['passwordlogin'];
                $res = mysqli_query($conmySql,"select * from login");
                $res = $res->fetch_all(MYSQLI_ASSOC);
                foreach($res as $el){
                    if ($el['email'] == $email && $el['password'] == $password) {
                        echo '<script>location.replace("./pages/service.php")</script>';
                        // header("location: ./pages/service.php");
                    } else if ($el['email'] == $email ||  $el['password'] != $password) {
                        echo '<div id="ModulErreur" class="fixed z-30 w-full h-full bg-black bg-opacity-50 flex justify-center items-center">
                                <div class="bg-white w-[60%] h-[50vh] md:w-[40%] md:h-[40vh] rounded-md flex flex-col justify-center items-center gap-y-3">
                                    <span class="w-[90%] text-red-500 text-center">Adress email ou Mot de passe incorrect. Veuillez vérifier vos informations et réessayer.</span>
                                    <button id="OK" class="bg-blue-700 text-white p-1 px-2 rounded-sm">OK</button>
                                </div>
                            </div>';
                    };
                };
            };
        ?>

        <div id="ModulLogin" class="fixed w-full h-full bg-black bg-opacity-50 flex justify-center items-center">
            <form action="index.php" method="post" class="bg-white w-[60%] h-[50vh] rounded-md flex flex-wrap justify-center md:justify-end px-[2vw] md:px-[5vw] place-content-center gap-y-[2vh]">
                
                <label class="md:w-[40%]"  for="#emaillogin">Email</label>
                <input id="emaillogin" class="w-[95%] md:w-[60%] h-[2.5rem] border-solid border-2 px-2 rounded-sm" name="emaillogin" type="email" placeholder="exemple@gmail.com" required>
                <label class="md:w-[40%]" for="#passwordlogin">Mot de passe</label>
                <input id="passwordlogin" class="w-[95%] md:w-[60%] h-[2.5rem] border-solid border-2 px-2 rounded-sm" name="passwordlogin" type="password" min="8" placeholder="********" required>
                <input id="conferme" class="bg-blue-600 px-2 py-1 rounded-[3px] mt-4" name="submit" type="submit" value="Conferme">
            </form>
        </div>
        <div class="absolute bg-black w-full h-full -z-10 flex overflow-x-auto">
            <img class="w-[100%] h-full opacity-60" src="./assets/images/backround-page.jpg" alt="iamge About">
            <!-- <img class="w-[100%] h-full opacity-70" src="./assets/images/backround-page1.jpg" alt="iamge About">
            <img class="w-[100%] h-full opacity-60" src="./assets/images/backround-page3.webp" alt="iamge About">
            <img class="w-[100%] h-full opacity-60" src="./assets/images/backround-page4.jpg" alt="iamge About"> -->
        </div>
        <div class="w-full h-full flex flex-col-reverse md:flex-row justify-center md:justify-evenly items-center text-white pt-[5rem] md:py-2">
            <div class="w-[90%] h-[90%] md:w-[50%]  flex flex-col justify-evenly items-center ">
                <h1 class="text-[5vw] md:text-5xl md:self-start pt-2">Africa Géo Junior</h1>
                <span class="w-[90%] md:w-[80%] text-center">L'Afrique est le deuxième plus grand continent du monde, 
                    tant en termes de superficie que de population. Elle couvre 
                    environ 30,37 millions de km², soit environ 20,4 % de la surface 
                    terrestre, et abrite plus de 1,4 milliard de personnes, réparties 
                    sur 54 pays. Ce continent est extrêmement diversifié, tant 
                    culturellement que géographiquement, avec une variété de paysages 
                    allant des vastes déserts aux forêts tropicales, des savanes aux 
                    montagnes enneigées.</span>
                    <a class="md:self-end md:mr-10" href="./pages/géographie.php">
                        <button class="w-auto h-auto bg-yellow-600 bg-opacity-70 text-white md:text-lg rounded-md px-5 py-1 ">Voir Plus</button>
                    </a>
            </div>
            <div class="w-[20rem] hidden md:flex justify-center items-center">
                <img class="w-[100%]" src="./assets/images/imageDesc.png" alt="image descreption de Africa">
            </div>
        </div>
    </section>

    <script type="module" src="./assets/js/script.js"></script>
    <script type="module" src="./assets/js/erreur.js"></script>
</body>
</html>



