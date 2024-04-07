<?php ?>
@csrf
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
        select, .description {
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

        .reset {
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
        <h1>Añadir Libro a la Lista</h1>
        <form action="{{ Route('addBook') }}" method="POST">
            <?php echo csrf_field(); ?>
            <div class="form-content">
                <label for="title">Título</label>
                <input type="text" id="title" name="title" required>

                <label for="author">Autor</label>
                <input type="text" id="author" name="author" required>

                <label for="publication_date">Fecha de publicación</label>
                <input type="date" id="publication_date" name="publicationDate" lang="es_ES"required>

                <label for="genre">Género</label>
                <select id="genre" name="genre" required>
                    <option value="" data-data="1" selected disabled hidden>Elegir...</option>
                    <option value="Aventura">Aventura</option>
                    <option value="Horror">Horror</option>
                    <option value="Fantasía">Fantasía</option>
                    <option value="Romance">Romance</option>
                    <option value="Historia">Historia</option>
                </select>

                <label for="description">Descripción</label>
                <textarea class='description' name="description" lang="es_ES" rows="5" required> </textarea>

                <button type="submit">Guardar Libro</button>
                <button class="reset" type="reset">Reset</button>
                <div>
        </form>
    </div>

</body>

</html>
