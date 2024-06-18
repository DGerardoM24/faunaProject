<!-- resources/views/especie.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Especie</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .header {
            background-color: #660033;
            color: white;
            padding: 10px;
            text-align: center;
        }
        .nav {
            display: flex;
            justify-content: space-around;
            background-color: #660033;
            padding: 10px;
        }
        .nav a {
            color: white;
            text-decoration: none;
        }
        .content {
            display: flex;
            justify-content: space-between;
            padding: 20px;
        }
        .image-section {
            flex: 1;
            margin-right: 20px;
        }
        .details-section {
            flex: 2;
            background-color: #f0f0f0;
            padding: 20px;
            border-radius: 10px;
        }
        .footer {
            background-color: #660033;
            color: white;
            display: flex;
            justify-content: space-around;
            padding: 20px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
<div class="header">
    <h1>Nombre común de especie</h1>
</div>
<div class="nav">
    <a href="#">Explorar</a>
    <a href="#">Noticias</a>
    <a href="#">Acerca de</a>
    <a href="#">Iniciar sesión</a>
</div>
<div class="content">
    <div class="image-section">
        <img src="{{ asset('images/descargar.webp') }}" alt="Imagen de especie" style="width: 100%; border: 5px solid #660033; border-radius: 10px;">
    </div>
    <div class="details-section">
        <h2>Nombre científico:</h2>
        <p>Nombre común:</p>
        <p>Hábitat:</p>
        <p>Dieta:</p>
        <p>Alimentación:</p>
        <p>Familia:</p>
        <p>Orden:</p>
        <p>Clase:</p>
        <p>Tamaño:</p>
        <p>Comportamiento:</p>
        <p>Estado de conservación:</p>
        <p>Cuidados:</p>
        <p>Enfermedades que portan:</p>
        <p>Enfermedades hacia personas:</p>
    </div>
</div>
<div class="footer">
    <div>Regiones</div>
    <div>Ayuda</div>
    <div>Contactos</div>
</div>
</body>
</html>
