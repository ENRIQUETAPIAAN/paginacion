<?php 

try{ //hacemos nuestra conexion a la base de datos
    $conexion = new PDO('mysql:host=localhost;dbname=db_articulos','root','');
} catch(PDOException $e){
    echo "Error: " . $e->getMessage();
    die();
}

$pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1; //definimos la variable pagina para saber en que pagina nos encontramos
$postPorPagina = 5; //definimos cuantos articulos queremos ver por pagina

$inicio = ($pagina > 1) ? ($pagina * $postPorPagina - $postPorPagina) : 0; //definimos desde que posición nos va a traer los articulos

$articulos = $conexion->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM tb_articulos LIMIT $inicio, $postPorPagina"); //hacemos la consulta SQL para traer los articulos y la cantidad de articulos que hay en la DB

$articulos->execute();
$articulos = $articulos->fetchAll(); //almacenamos en un arreglo todos los articulos que nos traiga la consulta

if(!$articulos){ //condicionamos que "si no hay articulos nos dirige a la pagina de inicio
    header('Location: index.php');
}

$totalArticulos = $conexion->query('SELECT FOUND_ROWS() as total'); //definimos la cantidad de articulos que tenemos en la base de datos
$totalArticulos = $totalArticulos->fetch()['total']; //guardamos los articulos en la variable, pero no como arreglo

$numeroPaginas = ceil($totalArticulos / $postPorPagina); //definimos la cantidad de paginas que tenemos

require 'views/index.view.php';
?>