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
            background-color: #b6b8fd;
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
            background-color: #7356f8;
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
        .button {
            background-color: #7356f8;
            color: #fff;
            border: none;
            border-radius: 4px;
            padding: 10px 20px;
            cursor: pointer;
            margin-left: 10px;
        }
    </style>
</head>

<body>
    <div class='table-container'>

        <h1>Todos los Prestamos</h1>

        <div class='tools'>
            <a class="button" href="{{ route('allBooks') }}">Ver Todos los Libros</a>

        </div>

        <h3>Selecciona un prestamo dandole click! </h3>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>ID de Usuario</th>
                    <th>ID de libro</th>
                    <th>Fecha de préstamo</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rentals as $rental)
                    @if (!$rental->return_date)
                        <tr onclick="window.location='{{ route('showRentalDetails', ['id' => $rental->id]) }}';"
                            style="cursor: pointer;">
                            <td>{{ $rental->id }}</td>
                            <td>{{ $rental->user_id }}</td>
                            <td>{{ $rental->book_id }}</td>
                            <td>{{ $rental->rent_date }}</td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>

        <h1>Prestamos finalizados</h1>

        <div class='tools'>
            {{-- <a href="{{ route('showAddBook') }}">Añadir Libro</a> --}}
        </div>


        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>ID de Usuario</th>
                    <th>ID de libro</th>
                    <th>Fecha de préstamo</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rentals as $rental)
                    @if ($rental->return_date)
                        <tr onclick="window.location='{{ route('showRentalDetails', ['id' => $rental->id]) }}';"
                            style="cursor: pointer;">
                            <td>{{ $rental->id }}</td>
                            <td>{{ $rental->user_id }}</td>
                            <td>{{ $rental->book_id }}</td>
                            <td>{{ $rental->rent_date }}</td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
