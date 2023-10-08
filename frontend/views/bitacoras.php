<?php
$url = 'http://localhost:8000/api/bitacoras';
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);
$data = json_decode($response, true);
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

    <title>Bitacoras</title>

</head>

<body class="flex flex-col min-h-screen bg-gray-100">

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
                            <span class="cursor-pointer"><i class="fa-solid fa-user-gear mr-2"></i></span>
                            <form action="/views_Admin/permiso_crud.php" method="post">
                                <button type="submit" class="text-xl">Roles</button>
                            </form>
                        </div>

                        <div class="flex flex-row items-center border-b border-gray-600 pb-2 cursor-pointer hover:bg-gray-800">
                            <span class="cursor-pointer"><i class="fa-solid fa-chalkboard-user mr-2"></i></span>
                            <form action="/views_Admin/maestro_crud.php" method="post">
                                <button class="text-xl">Usuarios</button>
                            </form>
                        </div>

                        <div class="flex flex-row items-center border-b border-gray-600 pb-2 cursor-pointer hover:bg-gray-800">
                            <span class="cursor-pointer"><i class="fa-solid fa-laptop-code mr-2"></i></span>
                            <form action="/views_Admin/alumno_crud.php" method="post">
                                <button class="text-xl">Bitacoras</button>
                            </form>
                        </div>

                        <div class="flex flex-row items-center  border-gray-600 pb-2 cursor-pointer hover:bg-gray-800">
                            <span class="cursor-pointer"><i class="fa-solid fa-link"></i></span>
                            <form action="/views_Admin/clases_crud.php" method="post">
                                <button class="text-xl">Enlaces</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

        </section>

        <section class="w-full md:w-4/5 h-auto bg-[#F5F6FA] text-[#ADADAD] flex-grow">

            <nav>
                <div id="isologotipo" class="flex items-center">
                    <span class="pl-4 pr-4 mr-2 cursor-pointer"><i class="fa-solid fa-arrow-right-from-bracket"></i></span>
                    <a href="../index.php">LOGOUT</a>
                </div>
            </nav>

            <div class="p-3 flex justify-between items-center pt-10">
                <h2 class="text-lg font-semibold">Lista de Bitacoras</h2>

            </div>

            <div class="container">
                <div class="table-responsive">
                    <table id="example" class="table table-striped">
                        <thead>
                            <tr>
                                <th class="py-2">ID</th>
                                <th class="py-2">Bitacora</th>
                                <th class="py-2">Fecha</th>
                                <th class="py-2">Hora</th>
                                <th class="py-2">Ip</th>
                                <th class="py-2">So</th>
                                <th class="py-2">Navegador</th>
                                <th class="py-2">Usuario</th>
                                <th class="py-2">Id_usuario</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $row) : ?>
                                <tr>
                                    <td><?= $row['id'] ?></td>
                                    <td><?= $row['bitacora'] ?></td>
                                    <td><?= $row['fecha'] ?></td>
                                    <td><?= $row['hora'] ?></td>
                                    <td><?= $row['ip'] ?></td>
                                    <td><?= $row['so'] ?></td>
                                    <td><?= $row['navegador'] ?></td>
                                    <td><?= $row['usuario'] ?></td>
                                    <td><?= $row['id_usuario'] ?></td>
                                </tr>
                            <?php endforeach; ?>
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

</body>

</html>