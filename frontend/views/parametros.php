<?php

// Obtener datos de la APIS
$usuariosResponse = json_decode(file_get_contents('http://127.0.0.1:8000/api/usuarios'), true);

$rolsResponse = json_decode(file_get_contents('http://127.0.0.1:8000/api/rols'), true);

$paginasResponse = json_decode(file_get_contents('http://127.0.0.1:8000/api/paginas'), true);

$enlacesResponse = json_decode(file_get_contents('http://127.0.0.1:8000/api/enlaces'), true);

// Procesar los datos
$usuarios = [];
foreach ($usuariosResponse as $usuario) {
    $usuarios[$usuario['id']] = $usuario;
}

$rols = [];
foreach ($rolsResponse as $rol) {
    $rols[$rol['id']] = $rol;
}

$paginas = [];
foreach ($paginasResponse as $pagina) {
    $paginas[$pagina['id']] = $pagina;
}

$enlaces = [];
foreach ($enlacesResponse as $enlace) {
    $enlaces[$enlace['id']] = $enlace;
}

// var_dump($usuarios);

// var_dump($rols);

// var_dump($paginas);

// var_dump($enlaces);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="/dist/output.css" rel="stylesheet">
    <!-- Data table plugin-->
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

    <script src="/Js/menu.js" defer></script>
    <link rel="stylesheet" href="/css/menu.css">
    <link rel="stylesheet" href="/css/toggle.css">

    <title>Usuarios</title>

</head>

<body>

    <div class="flex flex-col min-h-screen bg-gray-100">

        <main class="flex flex-col md:flex-row w-full">
            <section class="flex flex-col w-full h-auto md:w-1/5 bg-[#353A40] text-[#B2B2B2] flex-grow">
                <div class="p-4 mb-4">
                    <div class="menu-item">
                        <div class="menu-header">
                            <h2 class="text-xl">General y Seguridad</h2>
                            <span class="toggle-icon"><i class="fa-solid fa-user-gear fa fa-chevron-down"></i></span>
                        </div>
                        <div class="submenu hidden">

                            <div class="flex flex-row items-center border-b border-gray-600 pb-2 cursor-pointer hover:bg-gray-800">
                                <span class="cursor-pointer p-2"><i class="fa-solid fa-users-gear"></i></span>
                                <form action="/views/parametros.php" method="post">
                                    <button type="submit" class="text-xl">Parametros</button>
                                </form>
                            </div>


                            <div class="flex flex-row items-center border-b border-gray-600 pb-2 cursor-pointer hover:bg-gray-800">
                                <span class="cursor-pointer"><i class="fa-solid fa-user-gear mr-2"></i></span>
                                <form action="/views/roles.php" method="post">
                                    <button type="submit" class="text-xl">Roles</button>
                                </form>
                            </div>

                            <div class="flex flex-row items-center border-b border-gray-600 pb-2 cursor-pointer hover:bg-gray-800">
                                <span class="cursor-pointer"><i class="fa-solid fa-chalkboard-user mr-2"></i></span>
                                <form action="/views/usuarios.php" method="post">
                                    <button class="text-xl">Usuarios</button>
                                </form>
                            </div>

                            <div class="flex flex-row items-center border-b border-gray-600 pb-2 cursor-pointer hover:bg-gray-800">
                                <span class="cursor-pointer"><i class="fa-solid fa-laptop-code mr-2"></i></span>
                                <form action="/views/bitacoras.php" method="post">
                                    <button class="text-xl">Bitacoras</button>
                                </form>
                            </div>

                            <div class="flex flex-row items-center  border-gray-600 pb-2 cursor-pointer hover:bg-gray-800">
                                <span class="cursor-pointer"><i class="fa-solid fa-link"></i></span>
                                <form action="/views/enlaces.php" method="post">
                                    <button class="text-xl">Enlaces</button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>

            </section>

            <section class="w-full md:w-4/5 h-auto bg-[#F5F6FA] text-[#ADADAD] flex-grow">

                <!-- toglleBar -->
                <nav>
                    <div id="isologotipo" class="">
                        <span class="pl-4 pr-4 mr-2 cursor-pointer"><i class="fa-solid fa-arrow-right-from-bracket"></i></span>
                        <a href="../index.php">LOGOUT</a>
                    </div>


                </nav>

                <div class="p-3 flex justify-between items-center pt-10">
                    <h2 class="text-lg font-semibold">Parametros</h2>

                </div>

                <!-- TABLE XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX-->

                <div class="container">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="py-2">Nro.</th>
                                    <th class="py-2">Enlace</th>
                                    <th class="py-2">Ruta</th>
                                    <th class="py-2">Icono</th>
                                    <th class="py-2">Roles</th>
                                    <th class="py-2">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($usuarios as $usuario) {
                                    echo "<tr>";
                                    echo "<td>" . (isset($paginas[$usuario['id']]['id']) ? $paginas[$usuario['id']]['id'] : '') . "</td>";
                                    echo "<td>" . (isset($paginas[$usuario['id']]['url']) ? $paginas[$usuario['id']]['url'] : '') . "</td>";
                                    echo "<td>" . (isset($enlaces[$usuario['id']]['descripcion']) ? $enlaces[$usuario['id']]['descripcion'] : '') . "</td>";
                                    echo "<td>" . (isset($paginas[$usuario['id']]['icono']) ? $paginas[$usuario['id']]['icono'] : '') . "</td>";
                                    echo "<td>" . (isset($rols[$usuario['id_rol']]['rol']) ? $rols[$usuario['id_rol']]['rol'] : '') . "</td>";

                                    // Acciones
                                    echo "<td class='flex items-center'>
                                    <a href='/views/edit_parametros.php?id={$usuario['id']}'>
                                    <button class='text-gray-600 font-bold py-1 px-2 rounded text-xs'>
                                     <i class='far fa-pen-to-square text-blue-500 hover:text-blue-600'></i>
                                    </button>
                                    </a>
                                 </td>";
                                    echo "</tr>";
                                }


                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <script>
                    $(document).ready(function() {
                        $('#example').DataTable();
                    });
                </script>
            </section>

        </main>
    </div>
</body>

</html>