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

        .buttons-container {
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: 'center';

        }

        .button-container {
            text-align: center;
            margin: 20px;
        }

        .back-button {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            padding: 10px 20px;
            cursor: pointer;
        }

        .back-button:hover,
        .edit-button:hover {
            background-color: #7b7b7b;
        }


        .edit-button {
            background-color: #ffa600;
            color: #fff;
            border: none;
            border-radius: 4px;
            padding: 10px 20px;
            cursor: pointer;
        }


        .rental-button {
            background-color: #9d00ff;
            color: #fff;
            border: none;
            border-radius: 4px;
            padding: 10px 20px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Detalles del Libro</h1>
        <div class="details">
            <label>id:</label>
            <span>{{ $book->id }}</span>
        </div>
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
            <span>{{ $book->description }}</span>
        </div>
        <div class='buttons-container'>
            <div class="button-container">
                <button class="back-button" onclick="window.location='{{ route('home') }}';">Todos los Libros</button>
            </div>
            <div class="button-container">
                <button class="edit-button"
                    onclick="window.location='{{ route('showEditBookDetails', ['id' => $book->id]) }}';">Editar</button>
            </div>
            <div class="button-container">
                <button class="rental-button"
                    onclick="window.location='{{ route('showCreateRental', ['id' => $book->id]) }}';">Prestar</button>
            </div>
        </div>

    </div>
</body>

</html>
