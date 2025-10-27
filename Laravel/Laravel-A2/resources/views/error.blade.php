<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error</title>
   <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 50px;
            background-color: #f4f4f4;
        }
        .error-message {
            color: #d9534f; /* Rojo oscuro */
            font-size: 24px;
            margin-bottom: 20px;
            border: 2px solid #d9534f; /* Borde rojo oscuro */
            border-radius: 8px; /* Bordes redondeados */
            padding: 20px; /* Espaciado interno */
            background-color: #fff; /* Fondo blanco */
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.2); /* Sombra */
        }
    </style>
</head>

<body>
    <div class="error-message">
        <p>Ups...</p>
        <p>{{ $errorMessage }}</p>
    </div>
    <div class="button-container">
        <button class="back-button" onclick="window.location='{{ route('home') }}';">Todos los Libros</button>
    </div>
</body>

</html>
