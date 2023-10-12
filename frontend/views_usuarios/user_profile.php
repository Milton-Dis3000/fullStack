<?php
session_start();
if (isset($_SESSION['user'])) {
    $userData = $_SESSION['user'];
} else {
    header('Location: /index.php');
    exit();
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19" rel="stylesheet">
    <link href="/dist/output.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="/Js/main.js" defer></script>
    <link rel="stylesheet" href="/css/toggle.css">

</head>

<body>

    <!-- toglleBar -->
    <nav>
        <div id="isologotipo">
            <img src="/src/img/devchallenges.svg" alt="logo">
        </div>
        <ul>

            <div id="photoContainer1">
                <img src="/src/img/perfilvacio.png" alt="photo">

                <p><?= $userData['primer_nombre'] ?></p>

                <div id="toggleIcons">
                    <!-- <i class="fa-solid fa-caret-up"></i> -->
                    <i class="fa-solid fa-sort-down"></i>
                </div>

            </div>

            <div id="toggleBar">

                <div id="infeText">

                    <div id="profile">
                        <i class="fa-solid fa-circle-user"></i>

                        <a href="/views_usuarios/user_profile.php">My profile</a>
                    </div>

                    <div id="chat">
                        <i class="fa-solid fa-user-group"></i>
                        <p>Group chat</p>

                    </div>

                    <hr>
                    <div id="logout">
                        <i class="fa-solid fa-arrow-right-from-bracket"></i>

                        <a href="../index.php">Logout</a>

                    </div>
                </div>

            </div>

        </ul>

    </nav>


    <div class="textSuperior text-center mb-6">
        <h2 class="text-2xl font-bold">Personal info</h2>
        <p class="text-sm text-gray-500">Basic info, like your name and photo</p>
    </div>

    <main class="flex justify-center items-center">
        <section class="bg-white p-6 rounded-lg border border-gray-300 mx-auto" style="max-width: 500px; width: 100%;">

            <form action="" method="post" enctype="multipart/form-data">




                <div class="flex items-center justify-between mb-4 border-b pb-4">
                    <div>
                        <h2 class="text-lg font-bold">Profile</h2>
                        <p class="text-gray-500 text-sm">Some info may be visible to other people</p>
                    </div>

                    <a href="/views_usuarios/edit_profile.php" class="border border-gray-300 text-black px-3 py-2 rounded hover:bg-gray-100 hover:text-blue-700 cursor-pointer">Edit</a>
                </div>

                <div class="flex items-center mb-4 ">
                    <h2 class="text-lg font-bold mr-20 ">PHOTO</h2>
                    <img src="/src/img/perfilvacio.png" alt="photo" class='w-12 h-12 rounded-8px object-cover ml-2'>
                </div>

                <div class="flex mb-4 border-t border-gray-300 py-4 items-center justify-between">
                    <h2 class="text-lg font-bold">NOMBRE</h2>
                    <p class="text-gray-800 ml-2"><?= $userData['primer_nombre'] . ' ' . $userData['segundo_nombre'] ?></p>
                </div>

                <div class="flex mb-4 border-t border-gray-300 py-4 items-center justify-between">
                    <h2 class="text-lg font-bold">APELLIDO</h2>
                    <p class="text-gray-800 ml-2"><?= $userData['primer_apellido'] . ' ' . $userData['segundo_apellido'] ?></p>
                </div>

                <div class="flex mb-4 border-t border-gray-300 py-4 items-center justify-between">
                    <h2 class="text-lg font-bold">EMAIL</h2>
                    <p class="text-gray-800 ml-2"><?= $userData['usuario'] ?></p>
                </div>

                <div class="flex mb-4 border-t border-gray-300 py-4 items-center justify-between">
                    <h2 class="text-lg font-bold">CONTRASEÑA</h2>
                    <p class="text-gray-800 ml-2"><?= $userData['clave'] ?></p>
                </div>
            </form>
        </section>
    </main>

</body>

</html>