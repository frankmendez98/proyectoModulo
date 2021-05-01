<?php
// Fichero: /application/views/jugadores_csv_view.php
header("Content-type: text/csv");
header("Content-Disposition: attachment; filename='lista_productos.csv'");
header("Pragma: no-cache");
header("Expires: 0");
echo $contenido;
?>
