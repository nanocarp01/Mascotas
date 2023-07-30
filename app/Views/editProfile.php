<!-- HTML -->
<style>
    .edit-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 300px;
        }

        .edit-content label {
            display: block;
            margin-bottom: 5px;
        }

        .edit-content input[type="text"],
        .edit-content input[type="email"],
        .edit-content input[type="password"],
        .edit-content input[type="number"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .edit-content input[type="submit"] {
            width: 100%;
            padding: 10px;
            border: none;
            background-color: #4caf50;
            color: #fff;
            cursor: pointer;
            border-radius: 4px;
        }
        .edit-content input[type="submit"]:hover {
            background-color: #999;
            color: #fff;
        }
        .cancelar {
            display: inline-block;
            padding: 8px 12px;
            width: 92%;
            background-color: #EF0A0A;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            text-align:center;
        }

        .cancelar:hover {
            background-color: #999;
            color: #fff;
        }

        h1 {
            text-align: center;
            color: #007bff;
        }
</style>
<h1>Editar perfil</h1>

<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
<?php endif; ?>
<div class="edit-content">
<form action="<?= base_url('profile/update') ?>" method="post">
    <label for="name">Nombre:</label>
    <input type="text" name="name" value="<?= $user[0]['nombre'] ?>"   required>
    
    <label for="email">Correo electrónico:</label>
    <input type="email" name="email" value="<?= $user[0]['correo'] ?>" required>

    <label for="password">Contraseña:</label>
    <input type="password" name="password"  required>

    <label for="phone">Telefono:</label>
    <input type="number" name="phone" value="<?= $user[0]['telefono'] ?>" required>
    
    <input type="submit" value="Guardar cambios">
    <br><br>
    <a href="<?= base_url('publicacionController/allPosts') ?>" class="cancelar">Cancelar</a>
</form>
</div>