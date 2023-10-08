<?php
if (isset($_GET['id'])) {
    $id_usuario = $_GET['id'];

    // Recuperar el usuario específico desde la API
    $url = 'http://127.0.0.1:8000/api/usuarios/' . $id_usuario;
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);
    $usuario = json_decode($response, true);
} else {
    $id_usuario = null;
    $usuario = null;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Maestros</title>
    <link href="/dist/output.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <main class="flex items-center justify-center min-h-screen bg-gray-100">
        <div class="w-11/12 sm:w-5/6 md:w-2/3 lg:w-1/2 xl:w-3/5 p-3 bg-white shadow-md rounded-lg">
            <div class="flex justify-between">
                <h1 class="p-3 text-2xl">Editar usuario</h1>
                <a href="javascript:history.back()" class="text-gray-600 text-lg"><i class="fas fa-times mr-1"></i></a>
            </div>

            <p class="text-blue-500">Estimado usuario los campos remarcados con *(Asterisco) son necesarios</p>


            <form method="POST" action="http://127.0.0.1:8000/api/usuarios/<?php echo $id_usuario; ?>">
                <input type="hidden" name="_method" value="PUT">

                <?php if ($usuario) : ?>

                    <div class="p-1">
                        <label for="exampleInputEmail1" class="form-label">Usuario *</label>
                        <input type="text" class="form-control p-1" name="usuario" value="<?= $usuario['usuario']; ?>">
                    </div>

                    <div class="flex">
                        <div class="flex-grow p-1 mr-3">
                            <label for="exampleInputEmail1" class="form-label">Clave *</label>
                            <input type="password" class="form-control p-1 w-full" name="clave" value="<?php echo $usuario['clave']; ?>">
                        </div>

                        <div class="p-1">
                        <label for="exampleInputEmail1" class="form-label">Fecha *</label>
                        <input type="date" class="form-control p-1" name="fecha" value="<?php echo $usuario['fecha']; ?>">
                        </div>

                    </div>

                    <?php
                    $url = 'http://127.0.0.1:8000/api/usuarios';
                    $ch = curl_init($url);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    $response = curl_exec($ch);
                    curl_close($ch);
                    $data = json_decode($response, true);
                    ?>

                    <input type="hidden" name="id_usuario" value="<?= $_GET["id"] ?>">

                    <label for="habilitado" class="form-label">Estado*</label>
                    <select class="form-select mb-3 p-1" id="habilitado" name="habilitado" required>
                        <optgroup label="Opciones de Habilitado">
                            <?php
                            foreach ($data as $row) {
                                $habilitado = $row['habilitado'];
                                echo "<option value='$habilitado'>$habilitado</option>";
                            }
                            ?>
                        </optgroup>
                    </select>

                    <label for="id_rol" class="form-label">Rol *</label>
                    <select class="form-select mb-3 p-1" id="id_rol" name="id_rol" required>
                        <optgroup label="Roles disponibles">
                            <?php
                            foreach ($data as $row) {
                                $id_rol = $row['id_rol'];
                                echo "<option value='$id_rol'>$id_rol</option>";
                            }
                            ?>
                        </optgroup>
                    </select>

                    <label for="id_persona" class="form-label">Persona *</label>
                    <select class="form-select mb-3 p-1" id="id_persona" name="id_persona" required>
                        <optgroup label="Opciones de id_persona">
                            <?php
                            foreach ($data as $row) {
                                $id_persona = $row['id_persona'];
                                echo "<option value='$id_persona'>$id_persona</option>";
                            }
                            ?>
                        </optgroup>
                    </select>

                    <div class="flex justify-end pt-3">
                        <button type="submit" class="btn btn-primary p-2">Grabar</button>
                    </div>
                    
                <?php else : ?>
                    <p>No se ha proporcionado un ID válido.</p>
                <?php endif; ?>
            </form>
        </div>
    </main>

</body>

</html>