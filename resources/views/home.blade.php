<?php ?>

<!-- resources/views/books/index.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Books</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #c3c3c3;
            margin: 0;
            padding: 0;
            align-items: 'center';
            justify-content: 'center';
        }

        .table-container {
            width: 80%;
            min-height: 700px;
            margin-inline: auto;
            padding: 20px;
            background-color: #fff;

        }

        .tools {
            display: flex;
            justify-content: end;
            align-items: flex-end;
        }

        h1 {
            text-align: center;
            margin-top: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #007bff;
            color: #fff;
        }

        tr {
            cursor: pointer;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        /* Adjust column widths */
        th:nth-child(1),
        td:nth-child(1),
        th:nth-child(2),
        td:nth-child(2) {
            width: 25%;
            /* Adjust as needed */
        }

        th:nth-child(4),
        td:nth-child(4),
        th:nth-child(5),
        td:nth-child(5) {
            width: 15%;
            /* Adjust as needed */
        }
    </style>
</head>

<body>
    <div class='table-container'>

        <h1>All Books</h1>

        <div class='tools'>
            <a href="{{ route('showAddBook') }}">Añadir Libro</a>
        </div>


        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titulo</th>
                    <th>Autor</th>
                    <th>Género</th>
                    <th>Disponibilidad</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)
                    <tr onclick="window.location='{{ route('showBookDetails', ['id' => $book->id]) }}';" style="cursor: pointer;">
                        <td>{{ $book->id }}</td>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->author }}</td>
                        <td>{{ $book->genre }}</td>
                        <td style="color: {{ $book->is_available ? 'green' : 'red' }}">
                            {{ $book->is_available ? 'disponible' : 'No disponible' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
