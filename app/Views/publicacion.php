
<!-- create_publication.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Publicación</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
        /* Estilos CSS para la vista de crear publicación */

        body {
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }

        h1 {
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="file"],
        input[type="datetime-local"],
        input[type = "number"],
        textarea,
        select {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 10px;
        }

        .map-container {
            width: 100%;
            height: 300px;
            margin-bottom: 10px;
        }

        button {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        #map {
            width: 100%;
            height: 300px;
            margin-bottom: 10px;
        }
        .cancelar {
            display: inline-block;
            padding: 8px 12px;
            width: 100%;
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
        input[type="submit"] {
            width: 104%;
            padding: 10px;
            border: none;
            background-color: #4caf50;
            color: #fff;
            cursor: pointer;
            border-radius: 4px;
        }
        input[type="submit"]:hover {
            background-color: #999;
            color: #fff;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Crear Publicación</h1>

        <form action="<?= base_url('publicacionController/publicar') ?>" method="post" enctype="multipart/form-data" >
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" required>

            <label for="especie">Especie:</label>
            <input type="text" name="especie" required>

            <label for="raza">Raza:</label>
            <input type="text" name="raza" required>

            <label for="edad">Edad:</label>
            <input type="number" name="edad" required>

            <label for="foto">Foto:</label>
            <input type="file" name="foto" id="foto" accept="image/*" onchange="ValidarTamaño(this);" required>

            <label for="estado">Estado:</label>
            <select name="estado" id="estado" onchange="mostrarCalles()" required>
            <option value="">Seleccionar</option>
                  <?php foreach ($estados as $estado) { ?>
                  <option value="<?php echo $estado['idEstado']; ?>"><?php echo $estado['estado']; ?></option>
                  <?php } ?>
            </select>
            <label for="fecha_hora" >Fecha y Hora:</label>
            <input type="datetime-local" name="fecha_hora">

            <label for="descripcion">Descripción:</label>
            <textarea name="descripcion" rows="4" required></textarea>
            <div id="calle">
            <label for="calle" >Calle/s:</label>
            <input type="text" name="calle">     
            </div>
            <div id="ciudad">
            <label for="ciudad" >Ciudad:</label>
            <input type="text" name="ciudad"  required>  
            </div>
            <input type="submit" value="Crear Publicación">
            <br><br>
            <a href="<?= base_url('publicacionController/allPosts') ?>" class="cancelar">Cancelar</a>
        </form>
    </div>

    <script>

        function mostrarCalles(){
          var estado = $('#estado option:selected').text();
           if(estado == 'Adopción'){
            //ocultar id calle y ciudad 
            document.getElementById('calle').style.display = 'none';
           }else{
            //mostrar id calle y ciudad
            document.getElementById('calle').style.display = 'block';

           }
        }

        function ValidarTamaño(obj)
{
  var uploadFile = obj.files[0];
  var sizeByte = obj.files[0].size;
  var siezekiloByte = parseInt(sizeByte / 1024);

  if(siezekiloByte >= 1024){
      alert('El tamaño supera el limite permitido, la imagen debe pesar 1024kb o menos');
      $(obj).val('');
      return;
  }
  var img = new Image();
  img.onload = function () 
  {
    if (this.width.toFixed(0) != 1024 && this.height.toFixed(0) != 768) 
    {
      alert("La imagen debe ser de tamaño 1024px por 768px.");
      $('#foto').val("");
    }
  };
  img.src = URL.createObjectURL(uploadFile); 
}

    </script>
 
    
</body>

</html>
