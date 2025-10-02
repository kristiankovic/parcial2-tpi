<?php

require_once "db.php";

$db = new Database();

$conn = $db->getConn();

if($_SERVER["REQUEST_METHOD"] === "POST"){

    $nombre = $_POST["nombre"];
    $telefono = $_POST["telefono"];
    $f_nacimiento = $_POST["f-nacimiento"];
    $direccion = $_POST["direccion"];

    $stmt = $conn->prepare("INSERT INTO tbl_estudiante (nombre, telefono, fecha_de_nacimiento, direccion) VALUES (?, ?, ?, ?)");

    $stmt->bindParam(1, $nombre);
    $stmt->bindParam(2, $telefono);
    $stmt->bindParam(3, $f_nacimiento);
    $stmt->bindParam(4, $direccion);

    if($stmt->execute()){
        echo "<script> alert('Se insertaron los datos') </script>";
    }

    else{
        echo "<script> alert('No se insertaron los datos') </script>";
    }

}

$stmnt = $conn->prepare("SELECT * FROM tbl_estudiante");
$stmnt->execute();
$stmnt->setFetchMode(PDO::FETCH_ASSOC);

$usuarios = $stmnt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Ejercicio 2</title>
</head>

<body>


    <div class="caja">
        <form action="" method="post">
            <legend>Registro de Usuarios</legend>

            <input type="text" name="nombre" id="nombre" placeholder="Ingrese su nombre">

            <input type="number" name="telefono" id="telefono" placeholder="Ingrese su telefono">

            <input type="text" name="f-nacimiento" id="f-nacimiento" placeholder="Ingrese su fecha de nacimiento dd/mm/AAAA">

            <input type="text" name="direccion" id="direccion" placeholder="Ingrese su direccion">

            <button type="submit">Guardar</button>

        </form>
    </div>

    <div class="caja">
        <table>
            <thead>
                <th>Nombre</th>
                <th>Número telefónico</th>
                <th>Dirección física</th>
                <th>Dirección</th>
            </thead>

            <tbody>
                <?php foreach($usuarios as $user) :?>
                    <tr>
                        <td><?= $user["nombre"] ?></td>
                        <td><?= $user["telefono"] ?></td>
                        <td><?= $user["fecha_de_nacimiento"] ?></td>
                        <td><?= $user["direccion"] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>