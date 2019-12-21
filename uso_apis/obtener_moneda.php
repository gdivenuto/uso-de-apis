<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Uso de API</title>
        <!-- jQuery -->
        <script src="js/jquery-3.4.1.js"></script>
    </head>
    <body>
        <div id="contenedorMoneda"></div>
        
        <script>
            var url_solicitud = 'https://www.bancoprovincia.com.ar/Principal/Dolar';
            
            if ($("#contenedorMoneda").length > 0) {
                $.ajax({
                    type: "POST",
                    url: url_solicitud,
                    success: function (data) {
                        
                        console.log(data);

                        compra = parseFloat(data[0]);
                        venta  = parseFloat(data[1]);
                        hora   = data[2];
                        
                        data  = "<p>Compra "+compra.toFixed(2)+"</p>";
                        data += "<p>Venta "+venta.toFixed(2)+"</p>";
                        data += "<p>"+hora+"</p>";
        
                        $("#contenedorMoneda").html(data);
                    }
                });
            }
        </script>
    </body>
</html>