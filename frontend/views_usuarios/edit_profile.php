<?php
session_start();
if (isset($_SESSION['user'])) {
    $userData = $_SESSION['user'];
} else {
    header('Location: /index.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Procesar los datos del formulario y enviarlos a la API
    $usuarioId = $userData['id_persona'];
    $usuarioData = [
        'id_persona' => $usuarioId,
        'habilitado' => $_POST['habilitado'],
        'fecha' => $_POST['fecha'],
        'usuario' => $_POST['usuario'],
        'clave' => $_POST['clave']
    ];

    // Usar cURL para enviar la petición PUT a la API
    $url = "http://127.0.0.1:8000/api/usuarios/{$usuarioId}";
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($usuarioData));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    // Verificar la respuesta de la API
    if ($httpCode == 200) {
        echo "Cambios guardados correctamente";
    } else {
        echo "Hubo un error al guardar los cambios";
    }
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

                <p>value="<?php isset($userData['id_persona']) ? print($userData['id_persona']) : print('') ?>"</p>

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

    <main class="flex justify-center items-center">
        <section class="bg-white p-6 rounded-lg border border-gray-300 mx-auto" style="max-width: 500px; width: 100%;">

            <form action="http://localhost:3000/views_usuarios/user_profile.php" method="post" enctype="multipart/form-data" id="editForm">
                <input type="hidden" id="id_persona" name="id_persona" value="<?= $userData['id_persona'] ?>">
                <input type="hidden" id="id_rol" name="id_rol" value="<?= $userData['id_rol'] ?>">


                <div class="flex items-center justify-between mb-4 border-b pb-4">
                    <div>
                        <h2 class="text-lg font-bold">Change Inf</h2>
                        <p class="text-gray-500 text-sm">Changes will be reflected to every services</p>
                    </div>

                </div>

                <div class="flex items-center space-y-4">
                    <img src="/src/img/perfilvacio.png" alt="photo" class="w-12 h-12 rounded-8px object-cover ml-2 mr-6">
                    <h2 class="text-lg font-bold ">CHANGE PHOTO</h2>
                </div>

                <div class="changeName mb-4">
                    <p>Name</p>
                    <input type="text" id="id_persona" name="id_persona" value="<?php isset($userData['id_persona']) ? print($userData['id_persona']) : print('') ?>" placeholder="Enter your name..." class="border border-gray-300 p-2 rounded-md w-full">
                </div>

                <div class="changeName mb-4">
                    <p>Rol</p>
                    <input type="text" id="id_rol" name="id_rol" value="<?php isset($userData['id_rol']) ? print($userData['id_rol']) : print('') ?>" placeholder="Enter your name..." class="border border-gray-300 p-2 rounded-md w-full">
                </div>

                <div class="changeBio mb-4">
                    <p>Estado</p>
                    <input type="text" id="habilitado" name="habilitado" value="<?php isset($userData['habilitado']) ? print($userData['habilitado']) : print('') ?>" placeholder="Enter your esta..." class="border border-gray-300 p-2 rounded-md w-full">
                </div>

                <div class="changePhone mb-4">
                    <p>Fecha</p>
                    <input type="text" id="fecha" name="fecha" value="<?php isset($userData['fecha']) ? print($userData['fecha']) : print('') ?>" placeholder="Enter your date..." class="border border-gray-300 p-2 rounded-md w-full">
                </div>

                <div class="changeEmail mb-4">
                    <p>Email</p>
                    <input type="email" id="usuario" name="usuario" value="<?php isset($userData['usuario']) ? print($userData['usuario']) : print('') ?>" placeholder="Enter your Email..." class="border border-gray-300 p-2 rounded-md w-full">
                </div>

                <div class="changePhone mb-4">
                    <p>Password</p>
                    <input type="password" id="password" name="clave" value="<?php isset($userData['clave']) ? print($userData['clave']) : print('') ?>" placeholder=placeholder="Enter your password..." class="border border-gray-300 p-2 rounded-md w-full">
                </div>

                <div id="saveButton">
                    <button type="submit" class="bg-blue-500 text-white font-bold py-2 px-4 rounded">Save</button>
                </div>

            </form>
        </section>
    </main>

</body>

</html>