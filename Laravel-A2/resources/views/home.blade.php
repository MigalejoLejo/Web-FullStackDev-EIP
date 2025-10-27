<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Librería</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            text-align: center;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.2);
        }
        h1 {
            color: #333;
        }
        p {
            color: #666;
            margin-bottom: 20px;
        }
        .button-container {
            display: flex;
            justify-content: center;
            gap: 30px;
            margin-top: 20px;
        }
        .button {
            position: relative;
            width: 200px;
            height: 200px; /* Adjust height as needed */
            background-color: #007bff;
            color: #fff;
            border-radius: 8px;
            cursor: pointer;
            transition: transform 0.3s ease;
            overflow: hidden;
        }
        .button p {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 16px;
            font-weight: bold;
            text-transform: uppercase;
            text-align: center;
            margin: 0;
            padding: 0;
            width: 100%;
            z-index: 1;
                        background-color: #fff

        }
        .button:hover {
            transform: scale(1.1);
        }
        .books-button, .rentals-button {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-repeat: no-repeat;
            background-size: cover;
        }
        .books-button {
            background-image: url('/books.jpeg'); /* Path relative to the public folder */
        }
        .rentals-button {
            background-image: url('/rentals.jpg'); /* Path relative to the public folder */
        }

    </style>
</head>

<body>
    <div class="container">
        <h1>Bienvenido a la Librería</h1>
        <p>¿Qué deseas hacer?</p>
        <div class="button-container">
            <div class="button">
                <p >Ver todos los libros</p>
                <a href="{{ route('allBooks') }}" class=" books-button"></a>
            </div>
            <div class="button">
                <p >Ver los prestamos</p>
                <a href="{{ route('allRentals') }}" class=" rentals-button"></a>
            </div>
        </div>
    </div>
</body>

</html>
