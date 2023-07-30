<!DOCTYPE html>
<html>
<head>
    <title>Inicio</title>
    <style>
        /* Estilos para el modal */
.modal {
    display: none;
    position: fixed;
    z-index: 9999;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.9);
}

.modal-content {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 800px;
    max-height: 80%;
}

.close {
    color: #fff;
    font-size: 30px;
    font-weight: bold;
    position: absolute;
    top: 10px;
    right: 20px;
    cursor: pointer;
}
.container {
  width: 800px;
  margin: 0 auto;
  padding: 20px;
}

.modal-content {
    margin: 5% auto;
    max-width: auto;
    max-height: auto;
}

h1 {
  text-align: center;
}

.card-container {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 20px;
}

.card {
  background-color: #f5f5f5;
  padding: 20px;
  border-radius: 5px;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.card h2 {
  font-size: 20px;
  margin-bottom: 10px;
}

.card p {
  font-size: 16px;
  margin-bottom: 5px;
}
.card img {
            max-width: 100%;
            height: auto;
        }

        .menu {
            background-color: #007bff;
            padding: 10px;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 999;
            text-align: center;
        }

        .menu ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        .menu ul li {
            display: inline-block;
            margin-right: 10px;
        }

        .menu ul li a {
            color: #fff;
            text-decoration: none;
            padding: 5px 10px;
        }

        .menu ul li a:hover {
            background-color: #0056b3;
        }

/* Otros estilos de diseño personalizados */

/* Otros estilos personalizados para las tarjetas y el modal */

    </style>
</head>
<body>
    <div class="container">
        <div class="menu menu-hidden">
            <ul>
                <li><a href="<?= site_url('publicacionController/allPosts');?>">Inicio</a></li>
                <li><a href="<?= site_url('publicacionController/misPublicaciones');?>">Mis Publicaciones</a></li>
                <li><a href="<?= site_url('publicacionController/nuevaPub');?>">Nueva Publicación</a></li>
                <li><a href="<?= site_url('usuario/edit'); ?>">Editar Perfil</a></li>
                <li><a href="<?= site_url('login/logout'); ?>">Cerrar Sesión</a></li>
            </ul>
        </div>
        
        <h1>Publicaciones</h1>
        <div class="card-container">
            <?php foreach ($publicaciones as $publicacion): ?>
                <div class="card" data-image="<?= base_url('uploads/' . $publicacion['foto']) ?>">
                    <h2><?= $publicacion['estado'] ?></h2>
                    <?php $imageUrl = base_url('uploads/' . $publicacion['foto']); ?>
                    <img src="<?= $imageUrl ?>" alt="<?= $publicacion['estado'] ?>">
                    <p><?= $publicacion['descripcion'] ?></p>
                    <p>Fecha: <?= $publicacion['fechaHora'] ?></p>
                    <p>Usuario: <?= $publicacion['nombre']?></p>
                    <p>Tel: <?= $publicacion['telefono']?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Modal para mostrar la imagen ampliada -->
    <div id="modal" class="modal">
        <span class="close">&times;</span>
        <img class="modal-content" id="modal-image">
    </div>

    <script>

// Script para mostrar y ocultar el modal

// Obtener el modal y la imagen en el modal
var modal = document.getElementById("modal");
var modalImg = document.getElementById("modal-image");

// Obtener todas las tarjetas
var cards = document.getElementsByClassName("card");

// Recorrer todas las tarjetas y agregar evento al hacer clic
for (var i = 0; i < cards.length; i++) {
    cards[i].onclick = function() {
        var imageSrc = this.getAttribute("data-image");
        modal.style.display = "block";
        modalImg.src = imageSrc;
    };
}

// Agregar evento para cerrar el modal al hacer clic en la "x"
var closeBtn = document.getElementsByClassName("close")[0];
closeBtn.onclick = function() {
    modal.style.display = "none";
};


    </script>
</body>
</html>
