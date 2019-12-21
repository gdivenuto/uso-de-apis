<?php
define('DB_SERVIDOR', 'localhost');
define('DB_USUARIO', 'root'); // TU USUARIO
define('DB_PASSWORD', ''); // TU PASSWORD
define('DB_NOMBRE', 'negocio');

// Se conecta a la base de datos
$conexion = new mysqli(DB_SERVIDOR, DB_USUARIO, DB_PASSWORD, DB_NOMBRE);

// Si surgió un error
if ($conexion->connect_errno)
	throw new RuntimeException("Falló la conexión a MySQL:" . $conexion->connect_error);
		
// Se establece la codificación utf-8
$conexion->set_charset("utf8");

$query = "SELECT
			a_id,
		    a_codigo,
		    a_nombre,
		    COALESCE(a_descripcion, '') AS a_descripcion,
		    COALESCE(a_foto, '') AS a_foto,
		    COALESCE(a_precio_compra, '0.00') AS a_precio_compra,
		    COALESCE(a_precio_venta, '0.00') AS a_precio_venta,
		    COALESCE(a_cantidad, '0') AS a_cantidad,
		    COALESCE(a_cantidad_minima, '5') AS a_cantidad_minima,
		    (SELECT c_nombre FROM categorias WHERE c_id = a_id_categoria) AS nombre_categoria
		  FROM articulos
		  WHERE a_habilitado = 1";

// Se ejecuta la query
$resultado = $conexion->query($query);

// Si surgió un error
if ( !$resultado ) {
	// Se lanza la excepción
	throw new RuntimeException("Error al ejecutar la query:".$conexion->error);
}

$datos = null;
$i = 0;
while ( $row = $resultado->fetch_assoc() ) {
	$datos[$i] = $row;
	$i++;
}

$conexion->close();

/**
echo '<pre>';
print_r($datos);
echo '</pre>';
/**/
echo '{"data":'.json_encode($datos).'}';
/**/
?>