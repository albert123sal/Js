<?php
header('Content-Type: application/json');

/*
POWERSHELL:
Invoke-WebRequest -Uri http://127.0.0.1/api/ -Method GET
*/

$mensajes = [
    [
		'mensaje' => 'Lorem ipsum dolor sit amet',
		'user' => 'spiderman',
		'lat' => null,
		'lng' => null,
		'foto' => null
    ]
];
if (file_exists('./mensajes.json')) {
    echo file_get_contents('./mensajes.json');
} else {
    echo json_encode($mensajes);
}
