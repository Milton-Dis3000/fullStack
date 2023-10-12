<?php
if (isset($_GET['id'])) {
    $id_enlace = $_GET['id'];

    // Recuperar el usuario específico desde la API
    $url = 'http://127.0.0.1:8000/api/enlaces/' . $id_enlace;
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);
    $enlace = json_decode($response, true);
} else {
    $id_enlace = null;
    $enlace = null;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Enlaces</title>
    <link href="/dist/output.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="w-11/12 sm:w-5/6 md:w-2/3 lg:w-1/2 xl:w-1/3 p-3 bg-white shadow-md rounded-lg">
        <div class="flex justify-between">
            <h1 class="p-3 text-2xl">Editar Enlace</h1>
            <a href="javascript:history.back()" class="text-gray-600 text-lg"><i class="fas fa-times mr-1"></i></a>
        </div>
        <p class="text-blue-500"> Selecciona los campos requeridos *(Requerido) </p>


        <form method="POST" action="http://localhost:3000/actualizar">
            <input type="hidden" name="_method" value="PUT">


            <div class="p-1">
                <label for="exampleInputEmail1" class="form-label">Descripción*</label>
                <input type="text" class="form-control p-1" name="descripcion" value="<?= $enlace['descripcion']; ?>">
            </div>

            <?php
            $url = 'http://127.0.0.1:8000/api/enlaces';
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);
            curl_close($ch);
            $data = json_decode($response, true);
            ?>


            
            <?php
            $url = 'http://127.0.0.1:8000/api/paginas';
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);
            curl_close($ch);
            $data = json_decode($response, true);
            ?>



            <label for="url" class="form-label">Enlace*</label>
            <select class="form-select mb-3 p-1" id="url" name="url" required>
                <optgroup label="Opciones de url">
                    <?php
                    foreach ($data as $row) {
                        $url = $row['url'];
                        echo "<option value='$url'>$url</option>";
                    }
                    ?>
            </Select>


            <label for="icono" class="form-label">Iconos*</label>
            <select class="form-select mb-3 p-1" id="icono" name="icono" required>
                <optgroup label="Opciones de Icono">
                    <?php
                    foreach ($data as $row) {
                        $icono = $row['icono'];
                        echo "<option value='$icono'>$icono</option>";
                    }
                    ?>

            </Select>

            <?php
            $url = 'http://127.0.0.1:8000/api/rols';
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);
            curl_close($ch);
            $data = json_decode($response, true);
            ?>


            <input type="hidden" name="id_rol" value="<?= $_GET["id"] ?>">

            <label for="rol" class="form-label">Roles*</label>
            <select class="form-select mb-3 p-1" id="rol" name="rol" required>
                <optgroup label="Opciones de Roles">
                    <?php
                    foreach ($data as $row) {
                        $rol = $row['rol'];
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
</body>

</html>