<?php

namespace App\Models;

use CodeIgniter\Model;

class UbicacionModel extends Model
{
    protected $table = 'ubicacion';
    protected $primaryKey = 'idUbicacion';
    protected $allowedFields = ['calle','ciudad'];


    public function guardarDireccion($dataUbi){
        $calle = $dataUbi['calle'];
        $ciudad = $dataUbi['ciudad'];
        
        $this->db->transBegin();
      $query = "INSERT INTO ubicacion(calle, ciudad)
			
			VALUES(?,?)";

			$this->db->query($query,[$calle, $ciudad]);
			
			if ($this->db->transStatus() === false) {
				$this->db->transRollback();
				return 'failed';
			} else {
				$this->db->transCommit();
                $query = "SELECT idUbicacion FROM ubicacion";
                $result = $this->db->query($query);
				return $result->getResultArray();
			}
    }
}