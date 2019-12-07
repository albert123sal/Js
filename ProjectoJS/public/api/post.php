<?php
header('Content-Type: application/json');
/*
POWERSHELL:
$body = @{"user"="spiderman";"mensaje"="Exito!!";} | ConvertTo-Json
$header = @{"Accept"="application/json"; "Content-Type"="application/json"}
Invoke-RestMethod -Uri "http://127.0.0.1/api/post.php" -Method 'Post' -Body $body -Headers $header
*/

$mensajes = [];
// Leer mensajes actuales
if (file_exists('./mensajes.json')) {
    $contenido = file_get_contents('./mensajes.json');
    if (false !== $contenido) {
        $mensajes = json_decode($contenido, true);
        if (null === $mensajes) {
            $mensajes = [];
        }
    }
}
// Agregamos nuevo elemento
$valores = json_decode(file_get_contents('php://input'));
$mensaje = [
    'mensaje' => $valores->mensaje
    , 'user' => $valores->user
    , 'lat' => $valores->lat
    , 'lng' => $valores->lng
    , 'foto' => $valores->foto
];
$mensajes[] = $mensaje;
file_put_contents('./mensajes.json', json_encode($mensajes));
echo json_encode([
    'ok' => true
    , $mensaje
]);
