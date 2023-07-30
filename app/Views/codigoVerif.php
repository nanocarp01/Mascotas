<!DOCTYPE html>
<html>
<head>
    <title>Verificación de correo</title>
    <style>
        body {
            background-color: #f2f2f2;
            font-family: Arial, sans-serif;
        }
        
        .container {
            max-width: 400px;
            margin: 100px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        
        .title {
            text-align: center;
            margin-bottom: 20px;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        
        .form-group input[type="text"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        
        .submit-btn {
            width: 100%;
            padding: 10px;
            border: none;
            background-color: #4caf50;
            color: #fff;
            cursor: pointer;
        }

        #message-div {
    display: none;
    position: fixed;
    top: 5%;
    left: 50%;
    transform: translate(-50%, -50%);
    padding: 20px;
    background-color: rgba(255, 255, 0, 0.2);
    color: #000;
    text-align: center;
}

    </style>
</head>
<body>
    <div class="container">
    <div id='message-div'>
    <!-- Mostrar mensaje de error emergente -->
    <?php if(isset($error)) { ?>
            <div><?= $error; ?></div>
        <?php } ?>

    </div>
        <h2 class="title">Verificación de correo</h2>
        <form method="post" action="<?= site_url('usuario/passReset'); ?>">
            <div class="form-group">
                <label for="codigo">Ingrese el código verificador:</label>
                <input type="text" name="codigo" required>
            </div>
            <input type="submit" class="submit-btn" value="Verificar">
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
    var messageDiv = document.getElementById('message-div');
    
    // Mostrar el mensaje div
    messageDiv.style.display = 'block';
    
    // Ocultar el mensaje div después de 5 segundos
    setTimeout(function() {
        messageDiv.style.display = 'none';
    }, 5000);
});
    </script>
</body>
</html>
