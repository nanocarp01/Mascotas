<!DOCTYPE html>
<html>
<head>
    <title>Cambiar contraseña</title>
    <style>
          /* Estilos para la vista de cambio de contraseña */
          .change-password-container {
            width: 400px;
            margin: 100px auto;
            padding: 20px;
            border: 1px solid #ccc;
            background-color: #f9f9f9;
        }

        .change-password-container h2 {
            text-align: center;
        }

        .change-password-container form {
            margin-top: 20px;
        }

        .change-password-container label {
            display: block;
            margin-bottom: 5px;
        }

        .change-password-container input[type="password"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .change-password-container input[type="submit"],
        .change-password-container .error-message {
            display: none;
            width: 100%;
            padding: 10px;
            border: none;
            background-color: #4caf50;
            color: #fff;
            cursor: pointer;
        }

        .change-password-container .error-message {
            display: block;
            background-color: #f44336;
        }

        .change-password-container .success-message {
            display: block;
            background-color: #4caf50;
        }
        #noiguales{
            color:red;
            display:none;
        }
    </style>
</head>
<body>
    <div class="change-password-container">
        <!-- ... (contenido HTML omitido para mayor claridad) ... -->

        <form method="post" action="<?= site_url('usuario/passChange'); ?>">
            <label for="password1">Nueva contraseña:</label>
            <input type="password" name="password1" id="password1" required>

            <label for="password2">Confirmar contraseña:</label>
            <input type="password" name="password2" id="password2" required>

            <p id='noiguales'>Las contraseñas no coinciden</p>

            <input type="submit" value="Actualizar contraseña" id="update-button" style="display: none;">
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var password1Input = document.getElementById('password1');
            var password2Input = document.getElementById('password2');
            var updateButton = document.getElementById('update-button');
            var noiguales = document.getElementById('noiguales');

            // Comparar las contraseñas al cambiar el valor del segundo campo
            password2Input.addEventListener('input', function() {
                var password1 = password1Input.value;
                var password2 = password2Input.value;

                if (password1 === password2) {
                    updateButton.style.display = 'block';
                    noiguales.style.display = 'none'
                } else{
                    noiguales.style.display = 'block'
                    updateButton.style.display = 'none';
                }
            });
        });
    </script>
</body>
</html>
