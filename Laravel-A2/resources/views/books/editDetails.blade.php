<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Book</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 400px;
        }

        .form-content {
            padding: 20px;
            border-radius: 8px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input,
        select,
        .description {
            width: 100%;
            margin-bottom: 10px;
            padding-block: 10px;
            padding-inline: -20px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }


        button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .back-button {
            background-color: #a9abac;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 10px;
        }


        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>

    <div class="container">
        <h1>Editar Libro</h1>
        <div class="form-content">

            <form action="{{ Route('updateBookDetails') }}" method="POST">
                @method('PUT')
                <?php echo csrf_field(); ?>
                <input type="text" id="id" name="id" value="{{ $book->id }}" readonly hidden>

                <label for="title">Título</label>
                <input type="text" id="title" name="title" value="{{ $book->title }}">

                <label for="author">Autor</label>
                <input type="text" id="author" name="author"value="{{ $book->author }}" required>

                <label for="publication_date">Fecha de publicación</label>
                <input type="date" id="publication_date" name="publicationDate" lang="es_ES"
                    value="{{ $book->publication_date }}"required>

                <label for="genre">Género</label>
                <select id="genre" name="genre" required>
                    <option value="Aventura" {{ $book->genre === 'Aventura' ? 'selected' : '' }}>Aventura</option>
                    <option value="Horror" {{ $book->genre === 'Horror' ? 'selected' : '' }}>Horror</option>
                    <option value="Fantasía" {{ $book->genre === 'Fantasía' ? 'selected' : '' }}>Fantasía</option>
                    <option value="Romance" {{ $book->genre === 'Romance' ? 'selected' : '' }}>Romance</option>
                    <option value="Historia" {{ $book->genre === 'Historia' ? 'selected' : '' }}>Historia</option>
                </select>

                <label for="description">Descripción</label>
                <textarea class="description" name="description" lang="es_ES" rows="5" required>{{ $book->description }}</textarea>

                <input type="hidden" name="_method" value="PUT">


                <button type="submit" id="updateButton">Actualizar</button>



            </form>
            <button class="back-button" onclick="window.location='{{ route('home') }}'">Ver todos los
                libros</button>

            <script>
                document.getElementById('updateButton').addEventListener('click', function() {
                    // Submit the form
                    this.closest('form').submit();
                });
            </script>
        </div>

    </div>

</body>

</html>
