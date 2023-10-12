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
    $usuarioId = $userData['id_usuario'];
    $usuarioData = [
        'id_usuario' => $usuarioId,
        'primer_nombre' => $_POST['primer_nombre'],
        'segundo_nombre' => $_POST['segundo_nombre'],
        'primer_apellido' => $_POST['primer_apellido'],
        'segundo_apellido' => $_POST['segundo_apellido'],
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
        // Éxito: Los datos se actualizaron correctamente
        echo "Cambios guardados correctamente";
    } else {
        // Error: Hubo un problema al actualizar los datos
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

                <p>value="<?php isset($userData['id_persona']) ? print($userData['primer_nombre']) : print('') ?>"</p>

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

            <form action="http://127.0.0.1:8000/api/usuarios" method="post" enctype="multipart/form-data" id="editForm">
                <input type="hidden" id="usuarioId" name="usuarioId" value="<?php echo $userData['id_persona']; ?>">
                <input type="hidden" name="habilitado" value="<?php echo $userData['habilitado']; ?>">
                <input type="hidden" name="fecha" value="<?php echo $userData['fecha']; ?>">
                <input type="hidden" name="id_persona" value="<?php echo $userData['id_persona']; ?>">
                <input type="hidden" name="id_rol" value="<?php echo $userData['id_rol']; ?>">


                <div class="flex items-center justify-between mb-4 border-b pb-4">
                    <div>
                        <h2 class="text-lg font-bold">Change Info</h2>
                        <p class="text-gray-500 text-sm">Changes will be reflected to every service</p>
                    </div>
                </div>

                <div class="flex items-center space-y-4">
                    <img src="/src/img/perfilvacio.png" alt="photo" class="w-12 h-12 rounded-8px object-cover ml-2 mr-6">
                    <h2 class="text-lg font-bold ">CHANGE PHOTO</h2>
                </div>


                <div class="changeName mb-4">
                    <p>Primer Nombre</p>
                    <input type="text" id="primer_nombre" name="primer_nombre" value="<?php echo $userData['primer_nombre']; ?>" placeholder="Enter your name..." class="border border-gray-300 p-2 rounded-md w-full">
                </div>

                <div class="changeName mb-4">
                    <p>Segundo Nombre</p>
                    <input type="text" id="segundo_nombre" name="segundo_nombre" value="<?php echo $userData['segundo_nombre']; ?>" placeholder="Enter your name..." class="border border-gray-300 p-2 rounded-md w-full">
                </div>

                <div class="changeName mb-4">
                    <p>Primer Apellido</p>
                    <input type="text" id="primer_nombre" name="primer_nombre" value="<?php echo $userData['primer_apellido']; ?>" placeholder="Enter yourl lastname..." class="border border-gray-300 p-2 rounded-md w-full">
                </div>

                <div class="changeName mb-4">
                    <p>Segundo Apellido</p>
                    <input type="text" id="segundo_nombre" name="segundo_nombre" value="<?php echo $userData['segundo_apellido']; ?>" placeholder="Enter your lastname..." class="border border-gray-300 p-2 rounded-md w-full">
                </div>

                <div class="changeName mb-4">
                    <p>Email</p>
                    <input type="email" id="usuario" name="usuario" value="<?php echo $userData['usuario']; ?>" placeholder="Enter your email..." class="border border-gray-300 p-2 rounded-md w-full">
                </div>

                <div class="changeName mb-4">
                    <p>Password</p>
                    <input type="password" id="clave" name="clave" value="<?php echo $userData['clave']; ?>" placeholder="Enter your password..." class="border border-gray-300 p-2 rounded-md w-full">
                </div>


                <div id="saveButton">
                    <button type="submit" class="bg-blue-500 text-white font-bold py-2 px-4 rounded">Save</button>
                </div>

            </form>
        </section>
    </main>

</body>

</html>