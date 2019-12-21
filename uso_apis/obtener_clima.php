<?php
// lang=es => Español
// units=metric => Grados Celsius
//"http://api.openweathermap.org/data/2.5/forecast?id=3430863&lang=es&units=metric&APPID=6d5c17b9f399921bc9307e866bef69e0";

$id_mdp  = "3430863";
$app_key = "6d5c17b9f399921bc9307e866bef69e0";
$url_api = "http://api.openweathermap.org/data/2.5/forecast?id=".$id_mdp."&lang=es&units=metric&APPID=".$app_key;

// Se almacena el resultado de la API
$html = file_get_contents($url_api);

// Se decodifica el JSON
$json = json_decode($html);
/**
echo '<pre>';
print_r($json);
echo '</pre>';
/**/
// La temperatura en grados Celcius
$temperatura = (FLOAT)$json->list[0]->main->temp;

// Se toma cierta información
$ciudad       = $json->city->name;
$estado_cielo = $json->list[0]->weather[0]->main;
$descripcion  = $json->list[0]->weather[0]->description;
$nro_imagen   = $json->list[0]->weather[0]->icon;
/**
echo "Estado del cielo: ".$estado_cielo;
echo '<br><br>';
echo "Descripcion: ".$descripcion;
echo '<br><br>';
echo "Nro. Imagen: ".$nro_imagen;
echo '<br><br>';
echo "Temperatura: ".$temperatura;
echo '<br>';
/**/
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>API del Clima</title>

        <!-- CSS de Bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        
        <!-- jQuery -->
        <script src="js/jquery-3.4.1.js"></script>
        <!-- Popper -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <!-- JS de Bootstrap -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        
        <style type="text/css">
        	#encabezado_info_temperatura_valor {
			    font-size: 22px;
			    font-weight: bold;
			}
			#encabezado_info_temperatura_ciudad {
			    font-size: 20px;
			    letter-spacing: 1px;
			}
        </style>
    </head>
    <body>
		<div class="col-md-2">
			<div class="row">
				<div id="encabezado_info_temperatura_valor" class="col-md-12 text-right">
					<img src="imagenes/iconos_clima/<?php echo $nro_imagen; ?>.png">&nbsp;<?php echo round($temperatura, 2); ?> &deg; C
				</div>
				<div id="encabezado_info_temperatura_ciudad" class="col-md-12 text-right">
					<?php echo $ciudad; ?>
				</div>
			</div>
		</div>
    </body>
</html>
<?php /**/ ?>