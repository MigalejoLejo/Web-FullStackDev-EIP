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

        input {
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
        <h1>Crear Prestamo</h1>
        <form action="{{ Route('createRental') }}" method="POST">
            <?php echo csrf_field(); ?>
            <div class="form-content">
                <label for="bookId">Id de libro</label>
                <input type="text" id="bookId" name="bookId" value={{$book->id}} required readonly >

                <label for="bookTitle">Titulo del libro</label>
                <input type="text" id="bookTitle" name="bookTitle" value={{$book->title}} required readonly >

                <label for="userId">Id de usuario</label>
                <input type="text" id="userId" name="userId" required autofocus>

                <button type="submit">Crear Prestamo</button>
                <div>
        </form>
    </div>

</body>

</html>
