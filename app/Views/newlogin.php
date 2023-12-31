<!DOCTYPE html>
<html>
<head>
    <title>Iniciar sesión</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
    /*Para moviles*/
    @media only screen and (min-width:320px) and (max-width:480px){ 
    /* Estilos generales */
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background:#17837C;
        }
        .semi{
            border-bottom-left-radius:50%;
            border-bottom-right-radius:50%;
            background:#338F84;
            position: absolute;
            width: 100%;
            height: 70vh;
            z-index: 10;
        }
    .split-screen {
        display: flex;
        height: 100vh;
        z-index: -1;
        
    }
    .split-left{
        display:none;
    }
    .split-right{
        display: flex;
        flex-direction: column;
        margin: 12% 10% 30% 10%;  
        
       
    }        
    .login-form {
        z-index: 10;
        position: relative;
        width: 100%;
        height:100%;
        background-color: #D9D9D9;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 5%;
        text-align: center;
    }
    .login-form h2 {
        margin-bottom: 20px;
        color: #333;
    }

    .login-form label {
        display: block;
        margin-bottom: 10px;
        color: #777;
    }
    .login-form input[type="email"],
    .login-form input[type="password"] {
        width: 80%;
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 5%;
        font-size: 16px;
    }
    .login-form input[type="submit"] {
        width: 80%;
        padding: 12px;
        border: none;
        background-color: #4caf50;
        color: #fff;
        font-size: 16px;
        font-weight: bold;
        cursor: pointer;
    }

    .login-form input[type="submit"]:hover {
        background-color: #45a049;
    }
    .create-account-link {
        margin-top: 20px;
        margin-bottom: 20px;
        color: #555;
    }

    .create-account-link a {
        color: #555;
        text-decoration: none;
    }
    .create-account-link a:hover {
        text-decoration: underline;
    }

    .patitasAcasa{
        z-index: 10;
        position: relative;
        text-align: center;
        color:#FFF;
    }
    .patita{
        z-index: 10;
        margin-left:35%;
        width: 30%;
        height:20%;
    }
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
  
}
/*Para Tablets*/
@media only screen and (min-width:481px) and (max-width:1023px) { 
    /* Estilos generales */
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background:#17837C;
        }
        .semi{
            border-bottom-left-radius:50%;
            border-bottom-right-radius:50%;
            background:#338F84;
            position: absolute;
            width: 100%;
            height: 70vh;
            z-index: -1;
        }
    .split-screen {
        position: relative;
        height: 100vh;
        z-index: -1;
       
        
    }
    .split-left{
        display:none;
    }
    .split-right{
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%); 
        
       
    }        
    .login-form {
        position: relative;
        z-index: 10;
        width: 100%;
        height:100%;
        background-color: #D9D9D9;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 5%;
        text-align: center;
    }
    .login-form h2 {
        padding-top: 20px;
        margin-bottom: 20px;
        color: #333;
    }

    .login-form label {
        display: block;
        margin-bottom: 10px;
        color: #777;
    }
    .login-form input[type="email"],
    .login-form input[type="password"] {
        width: 80%;
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 5%;
        font-size: 16px;
    }
    .login-form input[type="submit"] {
        width: 80%;
        padding: 12px;
        border: none;
        background-color: #4caf50;
        color: #fff;
        font-size: 16px;
        font-weight: bold;
        cursor: pointer;
    }

    .login-form input[type="submit"]:hover {
        background-color: #45a049;
    }
    .create-account-link {
        padding-top: 20px;
        padding-bottom: 20px;
        color: #555;
    }

    .create-account-link a {
        
        color: #555;
        text-decoration: none;
    }
    .create-account-link a:hover {
        text-decoration: underline;
    }

    .patitasAcasa{
        text-align: center;
        color:#FFF;
    }
    .patita{
        margin-left:35%;
        width: 30%;
        height:20%;
    }
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
    }
         /*para PC*/
@media only screen and (min-width:1024px){
/* Estilos generales */
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background:#17837C;
    }
    .semi{
        border-top-right-radius:50%;
        border-bottom-right-radius:50%;
        background:#338F84;
        position: absolute;
        width: 50%;
        height: 100vh;
        z-index: -1;
    }
/* Estilos para la pantalla dividida */
    .split-screen {
        position: relative;
        display: flex;
        height: 100vh;
    }

    .split-right {
        flex: 1;
        display: flex;
        align-items: center;
        justify-content: center;
    }

/* Estilos para el formulario de inicio de sesión */
    .login-form {
        width: 400px;
        padding: 40px;
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        text-align: center;
    }

    .login-form h2 {
        margin-bottom: 30px;
        color: #333;
    }

    .login-form label {
        display: block;
        margin-bottom: 10px;
        color: #777;
    }

    .login-form input[type="email"],
    .login-form input[type="password"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 16px;
    }

    .login-form input[type="submit"] {
        width: 100%;
        padding: 12px;
        border: none;
        background-color: #4caf50;
        color: #fff;
        font-size: 16px;
        font-weight: bold;
        cursor: pointer;
    }

    .login-form input[type="submit"]:hover {
        background-color: #45a049;
    }

    .create-account-link {
        margin-top: 20px;
        color: #555;
    }

    .create-account-link a {
        color: #555;
        text-decoration: none;
    }

    .create-account-link a:hover {
        text-decoration: underline;
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
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        border-radius: 8px;
        max-width: 500px;
        margin: 80px auto;
        padding: 40px;
    }

.modal-content h2 {
    margin-bottom: 20px;
    color: #333;
}

.modal-content label {
    display: block;
    margin-bottom: 10px;
    color: #777;
}

.modal-content input[type="text"],
.modal-content input[type="email"],
.modal-content input[type="password"],
.modal-content input[type="number"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
}

.modal-content input[type="submit"] {
    width: 100%;
    padding: 12px;
    border: none;
    background-color: #4caf50;
    color: #fff;
    font-size: 16px;
    font-weight: bold;
    cursor: pointer;
}

.modal-content input[type="submit"]:hover {
    background-color: #45a049;
}

.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
    cursor: pointer;
}

.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
}



#message-div {
    display: none;
    position: fixed;
    top: 10%;
    left: 75%;
    transform: translate(-50%, -50%);
    padding: 20px;
    background-color: rgba(255, 255, 0, 0.2);
    color: #000;
    text-align: center;
}
    #left-content{
        border-radius: 50%;
    }


    .patitasAcasa{
        text-align: center;
        color:#FFF;
    }
    .patita{
        margin-left:35%;
        width: 30%;
        height:20%;
    }
         }
  



</style>
</head>
<body>
    
    <div class="split-screen">
                <div class="split-left">
                    <div class="left-content">
                        <h1 style="text-align:center;">Patitas a casa</h1>
                        <h3>Encuentra a tu mascota perdida o ayuda a un animalito a encontrar un nuevo hogar.</h3>
                        <img src="<?php echo base_url();?>images/patitas.png" alt="mascotas" class="img-fluid">
                    </div>
                </div>
                <div class="semi"></div>
        <div class="split-right">
        <img src="<?php echo base_url();?>images/huella.png" alt="mascotas" class="patita">
            <div class ="patitasAcasa1">
                
                <h2 class="patitasAcasa">Patitas a casa</h2>
            </div>
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
            
            <div class="login-form">
                <h2>Iniciar sesión</h2>
                <?= \Config\Services::validation()->listErrors(); ?>
                <form method="post" action="<?= base_url('Login/do_login'); ?>">
                    <label for="email">Email:</label>
                    <input class="form-control" type="email" name="email" required>

                    <label for="password">Contraseña:</label>
                    <input class="form-control" type="password" name="password" required>

                    <input type="submit" value="Iniciar sesión">
                </form>
                <div class="create-account-link">
                    ¿No tienes una cuenta? <a href="#" onclick="openModal()"><br>Crear nueva cuenta</a>
                    <br><br>
                    ¿Olvidaste tu contraseña? <a href="<?= base_url('usuario/forgotPass'); ?>"><br>Recuperar contraseña</a>
                </div>
            </div>
        </div>
    </div>

    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2>Crear cuenta</h2>
            
            <form class="row g-3" method='post' action="<?= base_url('register'); ?>">
                <label for="name">Nombre:</label>
                <input class="form-control"  type="text" name="name" id='name' required autocomplete=off>

                <label for="email">Email:</label>
                <input class="form-control"  type="email" name="email" id='mail' required autocomplete=off>

                <label for="password">Contraseña:</label>
                <input class="form-control" type="password" name="password" id='pass' required autocomplete=off>

                <label for="phone">Telefono:</label>
                <input class="form-control"  type="number" name="phone" id='phone' required autocomplete=off>

                <input type="submit" value="Crear cuenta" id="submitBtn">
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
 // Comprobar si el div está vacío
 
    // Mostrar el mensaje div
    messageDiv.style.display = 'block';
    
    // Ocultar el mensaje div después de 5 segundos
    setTimeout(function() {
        messageDiv.style.display = 'none';
    }, 5000);

    if (messageDiv.innerHTML.trim() === "") {
      // Si está vacío, ocultarlo
      messageDiv.style.display = "none";
    }
});

//crear USuario
/*function crearUsuario(){

    //obtengo los valores del formulario
    var password = $('#pass').val();
    var name = $('#name').val();
    var mail = $('#mail').val();
    var phone = $('#phone').val();

     $.ajax({
    
    url: '<?php echo site_url('register') ?>',
    dataType: 'json',
    type: 'POST',
    data: {
        nombre : name,
        mail:mail,
        password:password,
        phone:phone
        },
    success: function (response) {
                // Si la solicitud es exitosa, aquí puedes manejar la respuesta del servidor (si es necesario)
                console.log(response);
            },
            error: function (xhr, status, error) {
                // Si hay un error en la solicitud, aquí puedes manejarlo
                //recargar pagina
                //window.location.reload();
                console.error(error);
            }
        });
        closeModal();
}

 // Manejar el evento de clic en el botón "Crear cuenta"
 $(document).ready(function () {
        $("#submitBtn").click(function (event) {
            event.preventDefault(); // Evitar que el formulario se envíe de forma tradicional

            // Enviar el formulario mediante AJAX
            crearUsuario();
        });
    });*/
    </script>
</body>
</html>
