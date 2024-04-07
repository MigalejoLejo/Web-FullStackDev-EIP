<!-- resources/views/book.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
        }

        .details {
            margin-bottom: 10px;
        }

        .details label {
            font-weight: bold;
        }

        .details span {
            margin-left: 10px;
        }

        .button-container {
            text-align: center;
            margin-top: 20px;
        }

        .back-button {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            padding: 10px 20px;
            cursor: pointer;
        }

        .back-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Libro Creado</h1>
        <div class="details">
            <label>Titulo:</label>
            <span>{{ $book->title }}</span>
        </div>
        <div class="details">
            <label>Autor:</label>
            <span>{{ $book->author }}</span>
        </div>
        <div class="details">
            <label>Fecha de publicación:</label>
            <span>{{ $book->publication_date }}</span>
        </div>
        <div class="details">
            <label>Género:</label>
            <span>{{ $book->genre }}</span>
        </div>
        <div class="details">
            <label>Disponibilidad:</label>
            <span>{{ $book->is_available ? 'Available' : 'Not Available' }}</span>
        </div>

        <div class="details">
            <label>Descripción:</label>
            <span>{{ $book->description}}</span>
        </div>
        <div class="button-container">
            <button class="back-button" onclick="window.location='{{ route('index') }}'">Ver todos los libros</button>

        </div>
    </div>
</body>

</html>
