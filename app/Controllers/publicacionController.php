<?php

namespace App\Controllers;

use App\Models\userModel;
use App\Models\estadoModel;
use App\Models\mascotasModel;



class publicacionController extends BaseController
{
    public function nuevaPub()
    {
        $model = new estadoModel();
        $estados = $model->findAll();
       
        $data = ['estados' => $estados];

        return view('publicacion', $data);

    }

    public function publicar(){

        $userId = session()->get('user_id');
        $name = $this->request->getPost('nombre');
        $especie = $this->request->getPost('especie');
        $raza = $this->request->getPost('raza');
        $edad = $this->request->getPost('edad');
        $foto = $this->request->getFile('foto');
        $estado = $this->request->getPost('estado');
        $fechaHora = $this->request->getPost('fecha_hora');
        //eliminar la T y agregarle en su lugar un espacio
        $fechaHora = str_replace('T', ' ', $fechaHora);
        $descripcion = $this->request->getPost('descripcion');
        $calle = $this->request->getPost('calle');
        $ciudad = $this->request->getPost('ciudad');

        // Verificar si se ha subido una imagen válida
        if ($foto->isValid() && !$foto->hasMoved()) {
            // Generar un nombre único para el archivo de imagen
            $imageName = $foto->getRandomName();

            // Mover el archivo de imagen a la carpeta de destino
            $foto->move(ROOTPATH . 'public/uploads', $imageName);
        } else {
            $imageName = 'default.png';
        }
        $dataUbi = [
            'calle' => $calle,
            'ciudad' => $ciudad
        ];
        //guardar ubicacion y obtener el id
        //$ubic = new ubicacionModel();
        //$idUbic = $ubic->guardarDireccion($dataUbi);
        //$ubicacion = $idUbic[0]['idUbicacion'];

        $dataMascota = [
            'user_id' => (Int)$userId,
            'nombre' => $name,
            'especie' => $especie,
            'raza' => $raza,
            'edad' => (Int)$edad,
            'foto' => $imageName,
            'estado' => (Int)$estado,
            'fecha_hora' => $fechaHora,
            'descripcion' => $descripcion,
            'ubicacion_id' => 0,
            'calle' => $calle,
            'ciudad' => $ciudad
        ];
        //var_dump($dataMascota);
        $masc = new mascotasModel();
        $mascotaGuardada = $masc->cargarMascota($dataMascota);
        

        if($mascotaGuardada == 'ok'){
            //retornar a dashboard con un mensaje de exito
            $data['mensaje'] = 'Mascota guardada con éxito';

            return redirect()->to(base_url() . 'dashboard');
            }else{
                //retornar a dashboard con un mensaje de error
                return redirect()->to(base_url() . 'dashboard')
                ->with('mensaje', 'Error al guardar mascota');
        }

       
    }

    public function misPublicaciones(){
        // Obtener los datos del usuario desde la sesión
        $userData = session()->get();
        // Obtener las publicaciones del usuario actual desde la base de datos
        $publicacionModel = new mascotasModel();
        $publicaciones = $publicacionModel->misPublicaciones($userData);
        // Pasar los datos a la vista
        $data['publicaciones'] = $publicaciones;

        // Cargar la vista
        return view('publicaciones',$data);
    }

    public function allPosts(){

        // Obtener las publicaciones del usuario actual desde la base de datos
        $publicacionModel = new mascotasModel();
        $publicaciones = $publicacionModel->allPosts();
        // Obtener los datos del usuario desde la sesión
        $userData = session()->get();
        // Pasar los datos a la vista
        $data['publicaciones'] = $publicaciones;
        //agregar $userData al array $data['publicaciones']
        $data['userData'] = $userData;

        // Cargar la vista
        return view('allPosts',$data);
    }
}