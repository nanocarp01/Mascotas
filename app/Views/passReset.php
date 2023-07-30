<!-- forgot_password.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar contraseña</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        form {
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 10px;
            color: #333;
        }

        input[type="email"]{
            width: 95%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            margin-top: 20px;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
        }

        #error-message {
            margin-top: 20px;
            padding: 10px;
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
            border-radius: 4px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Recuperar contraseña</h1>

        <?php if (isset($error)) : ?>
            <div class="error-message"><?= $error ?></div>
        <?php endif; ?>

        <form action="<?= base_url('usuario/codigoVerif') ?>" method="post">
            <label for="email">Correo electrónico:</label>
            <input type="email" name="email" required>

            <button type="submit">Enviar código de verificación</button>
        </form>
    </div>
</body>
<script>
    document.addEventListener('DOMContentLoaded', function() {
    var messageDiv = document.getElementById('error-message');
    
    // Mostrar el mensaje div
    messageDiv.style.display = 'block';
    
    // Ocultar el mensaje div después de 5 segundos
    setTimeout(function() {
        messageDiv.style.display = 'none';
    }, 5000);
});

</script>
</html>
