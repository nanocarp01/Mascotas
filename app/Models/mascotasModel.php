<?php

namespace App\Models;

use CodeIgniter\Model;

class mascotasModel extends Model
{
    protected $table = 'mascota';
    protected $primaryKey = 'idMascota';
    protected $allowedFields = ['idUsuario','idEstado','nombre','especie','raza','edad','foto','descripcion','fechaHora','calle','ciudad'];

public function cargarMascota($dataMascota){
  
    $idUsuario = $dataMascota['user_id'];
    $idEstado = $dataMascota['estado'];
    $nombre = $dataMascota['nombre'];
    $especie = $dataMascota['especie'];
    $raza = $dataMascota['raza'];
    $edad = $dataMascota['edad'];
    $foto = $dataMascota['foto'];
    $descripcion = $dataMascota['descripcion'];
    $fechaHora = $dataMascota['fecha_hora'];
    $calle = $dataMascota['calle'];
    $ciudad = $dataMascota['ciudad'];

    $this->db->transBegin();
    $query = "INSERT INTO mascota(idUsuario, idEstado, nombre, especie, raza, edad, foto, descripcion, calle, ciudad,fechaHora)
          
          VALUES(?,?,?,?,?,?,?,?,?,?,?)";

          $this->db->query($query,[$idUsuario,$idEstado,$nombre,$especie,$raza,$edad,$foto,$descripcion, $calle, $ciudad,$fechaHora]);
          
          if ($this->db->transStatus() === false) {
              $this->db->transRollback();
              return 'failed';
          } else {
              $this->db->transCommit();
              return 'ok';
          }
}

public function misPublicaciones($idUser){
    $idUser = $idUser['user_id'];
    $query ="SELECT * FROM `mascota`
    INNER JOIN estado ON mascota.idEstado = estado.idEstado
    INNER JOIN usuario ON mascota.idUsuario = usuario.idUsuario
    WHERE mascota.idUsuario = $idUser;";
    $result = $this->db->query($query);
    return $result->getResultArray();

}

public function allPosts(){
    
    $query ="SELECT * FROM `mascota`
    INNER JOIN estado ON mascota.idEstado = estado.idEstado
    INNER JOIN usuario ON mascota.idUsuario = usuario.idUsuario;";
    $result = $this->db->query($query);
    return $result->getResultArray();

}



}