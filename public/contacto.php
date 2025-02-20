<?php 
    require '../include/database.php';

    $nombre= '';
    $email = '';
    $mensaje = '';

    //Recuperamos el mensaje de éxito si exista al sesión 

    if(isset($_SESSION['mensaje'])){
        $mensaje=$_SESSION['mensaje'];
        unset($_SESSION['mensaje']); // eliminamos el mensaje para que no se muestra en la recargas 
    }

    if($_SERVER['REQUEST_METHOD'] === 'POST'){



        $nombre = filter_var(trim($_POST['nombre'] ?? ''), FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $email = filter_var(trim($_POST['email'] ?? ''), FILTER_SANITIZE_EMAIL);
        $mensaje = filter_var(trim($_POST['mensaje'] ?? ''), FILTER_SANITIZE_FULL_SPECIAL_CHARS));

        $errores = [];

        if(empty($errores)){
            $query =  "INSERT INTO contacto (nombre, email, mensaje, estado) values ('$nombre','$email','$mensaje', 'activo')";
            $resultado = mysqli_query($db, $query);


// Vincular los parámetros
$stmt->bindParam(':nombre', $nombre);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':mensaje', $mensaje);

// Ejecutar la consulta
$stmt->execute();
 
         //       // Redirigir usando PRG para evitar reenvíos
         // header("Location: " . $_SERVER['PHP_SELF'] . "#contact");
         //        exit; 
         //    } else{
         //        echo "error al guardar el memsaje.";
            }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BlogDeCafé</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=PT+Sans:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <header class="header">

        <div class="contenedor">
            <div class="barra">
                <a class="logo" href="index.html">
                    <h1 class="logo__nombre no-margin centrar-texto">Blog<span class="logo__bold">DeCafé</span></h1>
                </a>

                <nav class="navegacion">
                    <a href="nosotros.html" class="navegacion__enlace">Nosotros</a>
                    <a href="cursos.html" class="navegacion__enlace">Cursos</a>
                    <a href="contacto.php" class="navegacion__enlace">Contacto</a>
                </nav>
            </div>
        </div>

        <div class="header__texto">
            <h2 class="no-margin">Blog de café con consejos y cursos</h2>
            <p class="no-margin">Aprende de los expertos con las mejores recetas y consejos</p>
        </div>
    </header>

    <main class="contenedor">
        <h3 class="centrar-texto">Contacto</h3>

        <div class="contacto-bg"></div>

        <form class="formulario" method="POST" id="contacto"> 
            <div class="campo">
                <label class="campo__label" for="nombre">Nombre</label>
                <input 
                    class="campo__field"
                    type="text" 
                    placeholder="Tu Nombre" 
                    id="nombre"
                    name="nombre"
                >
            </div>
            <div class="campo">
                <label class="campo__label" for="email">E-mail</label>
                <input 
                    class="campo__field"
                    type="email" 
                    placeholder="Tu E-mail" 
                    id="email"
                    name="email"
                >
            </div>
            <div class="campo">
                <label class="campo__label" for="mensaje">Mensaje</label>
                <textarea 
                    class="campo__field campo__field--textarea"
                    id="mensaje"
                    name= "mensaje"
                ></textarea>
            </div>

            <div class="campo">
                <input type="submit" value="Enviar" class="boton boton--primario">
            </div>
            <?php 
            if(!empty($mensaje)){
                ?> <p><?php echo $mensaje ?></p><?php
            }
    ?>
        </form>

        
    </main>

    <footer class="footer">
        <div class="contenedor">
            <div class="barra">
                <a class="logo" href="index.html">
                    <h1 class="logo__nombre no-margin centrar-texto">Blog<span class="logo__bold">DeCafé</span></h1>
                </a>

                <nav class="navegacion">
                    <a href="nosotros.html" class="navegacion__enlace">Nosotros</a>
                    <a href="cursos.html" class="navegacion__enlace">Cursos</a>
                    <a href="contacto.html" class="navegacion__enlace">Contacto</a>
                </nav>
            </div>
            <div class="navegacion__enlace"">
                <p>Todos los derechos reservados <span class="fecha"></span></p>
            </div>
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../js/modernizr.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", async function () {

            const fecha = new Date();

            document.querySelector(".fecha").textContent = fecha.getFullYear();
        })
    </script>
</body>
</html>
