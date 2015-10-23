<!DOCTYPE html>
<html>
<head>
    <style>
    table {
        width: 100%;
        border-collapse: collapse;
    }

    table, td, th {
        border: 1px solid black;
        padding: 5px;
    }

    th {text-align: left;}
    </style>
</head>
<body>

    <?php
    $q = strval($_GET['q']);

    $con = mysqli_connect('localhost','root','','avientame');
    if (!$con) {
        die('No se pudo conectar a la base de datos: ');
    }

    mysqli_select_db($con,"ajax_demo");
    $sql="SELECT * FROM usuarios WHERE  nombre ='".$q."'";
    $result = mysqli_query($con,$sql);

    if ($result->num_rows > 0)
    {
    echo "<table>
    <tr>
    <th>Nombre</th>
    <th>Apellido</th>
    <th>Mail</th>
    </tr>";
    while($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>" . $row['nombre'] . "</td>";
        echo "<td>" . $row['apellido'] . "</td>";
        echo "<td>" . $row['mail'] . "</td>";
        echo "</tr>";
    }
}
else
{
    echo "No se han encontrado resultados";
}
    echo "</table>";
    mysqli_close($con);
    ?>
</body>
</html>