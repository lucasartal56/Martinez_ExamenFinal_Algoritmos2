<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juego Escaleras</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        table {
            border-collapse: collapse;
            padding: 15px;
        }

        table,
        tr,
        td {
            border: 1px solid black;
            padding: 15px;
            text-align: center;
        }

        .container-1 {
            border: 1px solid black;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-6">
                <h1>Bienvenidos</h1> <br>
                <h3>El juego está por comenzar, toca el botón "TIRAR" para comenzar</h3>
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $jugador1 = $_POST['nombre1'];
                    $jugador2 = $_POST['nombre2'];
                    $jugador3 = $_POST['nombre3'];
                    echo "El jugador 1 es $jugador1";
                    echo "<br><br>";
                    echo "El jugador 2 es $jugador2";
                    echo "<br><br>";
                    echo "El jugador 3 es $jugador3";
                    echo "<br><br>";
                }
                ?>

                <div class="container-1">
                    <h2>DADO</h2>
                    <?php
                    function generarNumeroAleatorio()
                    {
                        return rand(1, 12);
                    }

                    if (!isset($_POST['contador'])) {
                        $_POST['contador'] = 0;
                    }

                    function mostrarResultado()
                    {
                        global $jugador1;

                        $numeroAleatorio = generarNumeroAleatorio();
                        $_POST['contador'] += $numeroAleatorio;

                        echo "<p>Número generado: $numeroAleatorio</p>";
                        echo "<p>Total acumulado: {$_POST['contador']}</p>";

                        if ($_POST['contador'] >= 100) {
                            echo "<p>¡GANASTE, $jugador1!</p>";

                            $_POST['contador'] = 0;
                        }
                    }


                    if (isset($_POST['iniciar'])) {
                        mostrarResultado();
                    }
                    ?>

                    <form method="post" action="">
                        <input type="hidden" name="contador" value="<?php echo $_POST['contador']; ?>">

                        <input type="hidden" name="jugador1" value="<?php echo $jugador1; ?>">
                        <input type="submit" name="iniciar" value="TIRAR">
                    </form>

                    <form method="post" action="">
                        <input type="submit" name="reiniciar" value="REINICIAR">
                    </form>
                </div>

            </div>


            <div class="col-6">
                <h2>Juego de Serpientes y Escaleras</h2>

                <table>

                    <?php
                    $filas_numeros = array(100, 81, 80, 61, 60, 41, 40, 21, 20, 1);
                    for ($filas = 1; $filas <= 10; $filas++) {
                        echo "<tr>";
                        $contador = $filas_numeros[$filas - 1];
                        for ($columnas = 1; $columnas <= 10; $columnas++) {
                            $colores = array('red', 'green', 'white', 'yellow', 'skyblue');
                            $color_azar = $colores[array_rand($colores)];
                            echo "<td style=' background-color:$color_azar;'>$contador</td>";
                            if ($filas == 1) {
                                $contador--;
                            } else if ($filas == 2) {
                                $contador++;
                            } else if ($filas == 3) {
                                $contador--;
                            } else if ($filas == 4) {
                                $contador++;
                            } else if ($filas == 5) {
                                $contador--;
                            } else if ($filas == 6) {
                                $contador++;
                            } else if ($filas == 7) {
                                $contador--;
                            } else if ($filas == 8) {
                                $contador++;
                            } else if ($filas == 9) {
                                $contador--;
                            } else if ($filas == 10) {
                                $contador++;
                            }
                        }
                        echo "</tr>";
                    }

                    ?>
                    <img src="../images/serpiente.png" alt="" style="z-index:2;  width:150px; height:150px; margin-top:10px; margin-left:40px; position: absolute;">
                    <img src="../images/serpiente.png" alt="" style="z-index:2;  width:150px; height:150px; margin-top: 115px; margin-left:300px; position: absolute;">
                    <img src="../images/serpiente2.png" alt="" style="z-index:2;  width:150px; height:150px; margin-top:390px; margin-left:350px; position: absolute;">
                    <img src="../images/serpiente2.png" alt="" style="z-index:2;  width:150px; height:150px; margin-top:270px; margin-left:100px; position: absolute;">
                    <img src="../images/escalera.png" alt="" style="z-index:2;  width:100px; height:200px; margin-top:345px; margin-left:30px; position: absolute;">
                    <img src="../images/escalera.png" alt="" style="z-index:2;  width:100px; height:200px; margin-top:20px; margin-left:225px; position: absolute;">
                    <img src="../images/escalera2.png" alt="" style="z-index:2;  width:100px; height:200px; margin-top:135px; margin-left:60px; position: absolute;">
                    <img src="../images/escalera2.png" alt="" style="z-index:2;  width:100px; height:200px; margin-top:305px; margin-left:240px; position: absolute;">
                </table>
            </div>

        </div>

        <img src="../images/circulo1.png" alt="" style="z-index:2;  width:50px; height:50px; margin-top:-450px; margin-left:300px; position: absolute;">
        <img src="../images/circulo2.png" alt="" style="z-index:2;  width:60px; height:60px; margin-top:-390px; margin-left:300px; position: absolute;">
        <img src="../images/circulo3.png" alt="" style="z-index:2;  width:50px; height:50px; margin-top:-330px; margin-left:300px; position: absolute;">
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>