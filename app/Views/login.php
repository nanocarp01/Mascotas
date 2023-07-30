<!DOCTYPE html>
<html>
<head>
    <title>Iniciar sesión</title>
    <style>
        /* Estilos para la vista de inicio de sesión */
        .login-container {
            width: 300px;
            margin: 100px auto;
            padding: 20px;
            border: 1px solid #ccc;
            background-color: #f9f9f9;
        }

        .login-container h2 {
            text-align: center;
        }

        .login-container form {
            margin-top: 20px;
        }

        .login-container label {
            display: block;
            margin-bottom: 5px;
        }

        .login-container input[type="email"],
        .login-container input[type="password"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .login-container input[type="submit"] {
            width: 100%;
            padding: 10px;
            border: none;
            background-color: #4caf50;
            color: #fff;
            cursor: pointer;
        }

        /* Estilos para el modal de creación de cuenta */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 300px;
        }

        .modal-content h2 {
            text-align: center;
        }

        .modal-content label {
            display: block;
            margin-bottom: 5px;
        }

        .modal-content input[type="text"],
        .modal-content input[type="email"],
        .modal-content input[type="password"],
        .modal-content input[type="number"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .modal-content input[type="submit"] {
            width: 100%;
            padding: 10px;
            border: none;
            background-color: #4caf50;
            color: #fff;
            cursor: pointer;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
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
    <div id='message-div'>
    <?php if(isset($error)) { ?>
            <div><?= $error; ?></div>
        <?php } ?>
        <?php if(isset($register_success)) { ?>
                <div><?= $register_success; ?></div>
            <?php } ?>
            <?php if(isset($existe)) { ?>
                <div><?= $existe; ?></div>
            <?php } ?>

    </div>
    <div class="login-container">
        <h2>Iniciar sesión</h2>

        <?= \Config\Services::validation()->listErrors(); ?>

        
        <form method="post" action="<?= site_url('login/do_login'); ?>">
            <label for="email">Email:</label>
            <input type="email" name="email" required>

            <label for="password">Contraseña:</label>
            <input type="password" name="password" required>

            <input type="submit" value="Iniciar sesión">
            <a href="<?= site_url('usuario/forgotPass'); ?>">Recuperar contraseña</a>
        </form>

        <br>

        <h2>Crear cuenta</h2>

        <a href="#" onclick="openModal()">Crear nueva cuenta</a>
    </div>

    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2>Crear cuenta</h2>
            
            <form method="post" action="<?= site_url('login/register'); ?>">
                <label for="name">Nombre:</label>
                <input type="text" name="name" required>

                <label for="email">Email:</label>
                <input type="email" name="email" required>

                <label for="password">Contraseña:</label>
                <input type="password" name="password" required>

                <label for="phone">Telefono:</label>
                <input type="number" name="phone" required>

                <input type="submit" value="Crear cuenta">
            </form>
        </div>
    </div>

    <script>
        function openModal() {
            document.getElementById('myModal').style.display = 'block';
        }

        function closeModal() {
            document.getElementById('myModal').style.display = 'none';
        }


        // JavaScript
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
