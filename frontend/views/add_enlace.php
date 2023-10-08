<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Enlace</title>
    <link href="/dist/output.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <main class="flex items-center justify-center min-h-screen bg-gray-100">
        <div class="w-5/6 md:w-2/3 lg:w-4/5 p-3 bg-white shadow-md rounded-lg">
            <div class="flex justify-between">
                <h1 class="p-3 text-2xl">Agregar Enlace</h1>
                <a href="javascript:history.back()" class="text-gray-600 text-lg"><i class="fas fa-times mr-1"></i></a>
            </div>

            <p class="text-blue-500">Estimado usuario los campos remarcados con *(Asterisco) son necesarios</p>

            <form method="POST" action="http://127.0.0.1:8000/api/enlaces">

                <div class="p-1">
                    <label for="exampleInputEmail1" class="form-label">descripcion *</label>
                    <input type="text" class="form-control p-1" name="descripcion" placeholder="Ingresa una descripción">
                </div>



                <?php
                $url = 'http://127.0.0.1:8000/api/enlaces';
                $ch = curl_init($url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $response = curl_exec($ch);
                curl_close($ch);
                $data = json_decode($response, true);
                ?>


                <label for="pagina" class="form-label">Id_página*</label>
                <select class="form-select mb-3 p-1" id="id_pagina" name="id_pagina" required>
                    <optgroup label="Opciones de Páginas">
                        <?php
                        foreach ($data as $row) {
                            $pagina = $row['id_pagina'];
                            echo "<option value='$pagina'>$pagina</option>";
                        }
                        ?>
                    </optgroup>
                </select>

                <label for="rol" class="form-label">Id_rol*</label>
                <select class="form-select mb-3 p-1" id="id_rol" name="id_rol" required>
                    <optgroup label="Opciones de Roles">
                        <?php
                        foreach ($data as $row) {
                            $rol = $row['id_rol'];
                            echo "<option value='$rol'>$rol</option>";
                        }
                        ?>
                    </optgroup>
                </select>
                <div class="flex justify-end pt-3">
                    <button type="submit" class="btn btn-primary p-2">Grabar</button>
                </div>

            </form>
        </div>
    </main>


</body>

</html>