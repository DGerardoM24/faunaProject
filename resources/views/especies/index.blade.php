@extends('layouts.app')

@section('content')
    <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ficha de Especie</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        header {
            background-color: #b53842;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
        }

        header .logo img {
            height: 50px;
        }

        header nav ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
        }

        header nav ul li {
            margin-right: 20px;
        }

        header nav ul li a {
            color: white;
            text-decoration: none;
        }

        header .search-login {
            display: flex;
            align-items: center;
        }

        header .search-login input {
            padding: 5px;
            margin-right: 10px;
        }

        main {
            padding: 20px;
        }

        .species-info {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
        }

        .species-info h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .image-description {
            display: flex;
            justify-content: space-between;
        }

        .image-container {
            flex: 1;
            margin-right: 20px;
        }

        .image-container img {
            width: 100%;
            border: 5px solid #b53842;
            border-radius: 5px;
        }

        .details {
            flex: 1;
        }

        .details p {
            margin: 5px 0;
        }

        .description {
            margin-top: 20px;
        }

        footer {
            background-color: #b53842;
            color: white;
            display: flex;
            justify-content: space-around;
            padding: 10px 0;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        .footer-section {
            flex: 1;
            text-align: center;
        }
    </style>
</head>
<body>
<main>
    <div class="species-info">
        <h1>Nombre común de especie</h1>
        <div class="image-description">
            <div class="image-container">
                <img src="/images/descargar.webp" alt="Imagen de la especie">
            </div>
            <div class="details">
                <p><strong>Nombre científico:</strong></p>
                <p><strong>Nombre común:</strong></p>
                <p><strong>Hábitat:</strong></p>
                <p><strong>Dieta:</strong></p>
                <p><strong>Alimentación:</strong></p>
                <p><strong>Familia:</strong></p>
                <p><strong>Orden:</strong></p>
                <p><strong>Clase:</strong></p>
                <p><strong>Tamaño:</strong></p>
                <p><strong>Comportamiento:</strong></p>
                <p><strong>Estado de conservación:</strong></p>
                <p><strong>Cuidados:</strong></p>
                <p><strong>Enfermedades que portan:</strong></p>
                <p><strong>Enfermedades hacia personas:</strong></p>
            </div>
        </div>
        <div class="description">
            <p><strong>Descripción:</strong></p>
        </div>
    </div>
</main>
<footer>
    <div class="footer-section">Regiones</div>
    <div class="footer-section">Ayuda</div>
    <div class="footer-section">Contactos</div>
</footer>
</body>
</html>

@endsection
