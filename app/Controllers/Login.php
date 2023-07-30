<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\userModel;
use CodeIgniter\HTTP\Response;

class Login extends BaseController
{

    public function __construct()
{
    $this->validation = \Config\Services::validation();
}

    public function index()
    {
        
        
        return view('newlogin');


    }

    public function do_login()
    {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $userModel = new userModel();
        $user = $userModel->where('correo', $email)->first();

        if ($user && password_verify($password, $user['contraseña'])) {
          
            // Inicio de sesión exitoso
            session()->set('user_id', $user['idUsuario']);
            //guardar en session el id y el nombre 
            session()->set('name', $user['nombre']);
            
            return redirect()->to('publicacionController/allPosts');
        } else {
            // Credenciales inválidas
            $data['error'] = 'Email o contraseña incorrectos o el usuario no existe';
            return view('newlogin', $data);
        }
    }

    public function logout()
    {
        
        session()->remove('user_id');
        session()->remove('name');
        return redirect()->to('/');
    }

    public function register(){
        
        $request = \Config\Services::request();
            
            // Obtener los datos del formulario
                $name = $this->request->getPost('name');
                $email = $this->request->getPost('email');
                $password = $this->request->getPost('password');
                $telefono = $this->request->getPost('phone');

                // Crear un nuevo modelo de usuario
                $userModel = new UserModel();

                //Crear array con $name, $email y $password(hash)
                $data = [
                    'name' => $name,
                    'email' => $email,
                    'password' => password_hash($password, PASSWORD_DEFAULT),
                    'phone' => $telefono
                    ];

                    // Guardar en la base de datos
                    $guardarUsuario = $userModel->createUser($data);
                    
                    if($guardarUsuario == 'ok'){
                        // Redirigir al usuario a la página de inicio de sesión o mostrar un mensaje de éxito
                        $data['register_success']= '¡Cuenta creada exitosamente! Puedes iniciar sesión ahora.';
                        return view('newlogin',$data);
                    }elseif($guardarUsuario == 'Existe'){
                        $data['existe']= 'El Usuario asociado a ese correo ya existe, si no recuarda la contraseña intente recuperarla';
                        return view('newlogin',$data);
                    }else{
                        // Mostrar errores de validación en la vista
                        return redirect()->back()->withInput()->with('errors', $validation->getErrors());
           
                    
            
        }

        return view('newlogin');
    }
}
