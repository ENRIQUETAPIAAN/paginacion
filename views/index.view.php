<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/estilos.css">
    <title>Paginación</title>
</head>
<body>
    <div class="contenedor">
        <h1>Articulos</h1>
        <section class="articulos">
            <ul>
                <?php foreach($articulos as $articulo): ?>
                    <li> <?php echo $articulo['id_articulo'] . '.- ' . $articulo['articulo'] ?></li>
                <?php endforeach; ?>
            </ul>
        </section>
        <section class="paginacion">
            <ul>
                <?php if($pagina == 1): ?>
                    <li class="disabled">&laquo;</li>
                <?php else: ?>
                    <li><a href="?pagina=<?php echo $pagina - 1 ?>">&laquo;</a></li>
                <?php endif; ?>

                <?php
                for($i=1; $i <= $numeroPaginas; $i++){
                    if($pagina == $i){
                        echo "<li class='active'><a href='?pagina=$i'>$i</a></li>";
                    } else{
                        echo "<li><a href='?pagina=$i'>$i</a></li>";
                    }
                }
                ?>

                <?php if($pagina == $numeroPaginas): ?>
                    <li class="disabled">&raquo;</li>
                <?php else: ?>
                    <li><a href="?pagina=<?php echo $pagina + 1 ?>">&raquo;</a></li>
                <?php endif; ?>
            </ul>
        </section>
    </div>
</body>
</html>