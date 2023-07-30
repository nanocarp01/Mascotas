<?php

namespace App\Models;

use CodeIgniter\Model;

class userModel extends Model
{
    protected $table = 'usuario';
    protected $primaryKey = 'idUsuario';
    protected $allowedFields = ['nombre', 'correo', 'contraseña','telefono','codVerif'];

    public function createUser($data)
    {
      //Guarda usuario nuevo
      $nombre = $data['name'];
      $email = $data['email'];
      $pass = $data['password'];
      $telefono = $data['phone'];
      // Verificar si el correo electrónico ya está asociado a otro usuario
      $existingUser = $this->where('correo', $email)->first();
      if ($existingUser) {
        return 'Existe'; // El correo electrónico ya está registrado
    }else{
      $this->db->transBegin();
      $query = "INSERT INTO usuario(nombre, correo, contraseña,telefono)
			
			VALUES(?,?,?,?)";

			$this->db->query($query,[$nombre, $email, $pass,$telefono]);
			
			if ($this->db->transStatus() === false) {
				$this->db->transRollback();
				return 'failed';
			} else {
				$this->db->transCommit();
				return 'ok';
			}
    }
  }

  public function findUser($data){
    
    $user = "SELECT * FROM usuario WHERE idUsuario = '$data'";
    $result = $this->db->query($user);
    return $result->getResultArray();

  }

  public function codVerif($data){
    $codVerif = $data['numero'];
    $correo = $data['email'];
    //actualizar tabla mascota campo codVerif si el correo es igual a $correo
    $query = "UPDATE usuario SET codVerif = '$codVerif' WHERE correo = '$correo'";
    $this->db->query($query);
    return 'ok';
}

public function changePass($data){
  $id = $data['Id_user'];
  $pass = $data['pass'];
  //actualizar tabla mascota campo codVerif si el correo es igual a $correo
  $query = "UPDATE usuario SET contraseña = '$pass' WHERE idUsuario = '$id'";
  $this->db->query($query);
  return 'ok';
}
}
