<?php

namespace App\Controllers;

use App\Models\userModel;
use CodeIgniter\Session\Session;


//llamar a controlador mailController
use App\Controllers\MailController;


class usuario extends BaseController
{


    public function edit()
    {
        // Obtener el ID del usuario actualmente autenticado (puedes ajustar esto según tu implementación de autenticación)
       //var_dump(session()->get('user_id'));
       $userId = session()->get('user_id');

        // Crear una instancia del modelo de usuario
        $userModel = new userModel();
        
        // Obtener los datos del usuario actual
        $user = $userModel->findUser($userId);
        
        // Pasar los datos del usuario a la vista de edición
        return view('editProfile', ['user' => $user]);
    }
    
    public function update()
    {
        // Obtener el ID del usuario actualmente autenticado (puedes ajustar esto según tu implementación de autenticación)
        $userId = session()->get('user_id');
        
        // Obtener los datos del formulario de actualización
        $name = $this->request->getPost('name');
        $email = $this->request->getPost('email');
        
        // Crear una instancia del modelo de usuario
        $userModel = new UserModel();
        
        // Obtener el usuario actual
        $user = $userModel->find($userId);
        
        // Actualizar los datos del usuario
        $user->name = $name;
        $user->email = $email;
        
        // Guardar los cambios en la base de datos
        $userModel->save($user);
        
        // Redirigir a la página de perfil actualizado
        return redirect()->to('profile/edit')->with('success', 'Perfil actualizado exitosamente.');
    }

    public function forgotPass()
    {
      
        return view('passReset');
        
    }

    public function codigoVerif(){
        $email = $this->request->getPost('email');

        $userModel = new userModel();
        $user = $userModel->where('correo', $email)->first();
        if($user){
        $numeroAleatorio = rand(100000, 999999); // Genera un número aleatorio de 6 dígitos
        $data=[
            'email' => $email,
            'numero' => $numeroAleatorio
        ];
   
        $codVerificador = new userModel();
        $verificador = $codVerificador->codVerif($data);
    
        if ($verificador == 'ok') {


        $asunto = 'Codigo de verificación para cambio de contraseña';
        $cuerpo = '
            <div style="background-color: #f2f2f2; border-radius: 5px; padding: 20px; text-align: center;">
                <h2 style="color: #333;">Aqui tiene su número de restauración:</h2>
                <p style="font-size: 24px; color: #555;">' . $numeroAleatorio . '</p>
            </div>
        ';

        $contenidoMail= [

            'email' => $email,
            'asunto' => $asunto,
            'cuerpo' => $cuerpo,

        ];
        //llamar a la funcion enciarMail del controlador 
        // Cargar el controlador mailController
            $mailController = new MailController();

            $enviarCod = $mailController->enviarMail($contenidoMail);
            if($enviarCod == 'ok'){
                return view('codigoVerif');

            }
            }
        
            }else{
                $data['error']='Este email no es válido.';
            return view('passReset',$data);

            }

                
   

   }   

   public function passReset(){
    $codigo = $this->request->getPost('codigo');
    $userModel = new userModel();
    $cod = $userModel->where('codVerif', $codigo)->first();
    
    if($cod){
        session()->set('user_id', $cod['idUsuario']);
        //redirigir a vista cambioPass
        return view('cambioPass');
    }else{
       
        $data['error'] = 'Codigo erroneo.';
        

        // Redirigir a la vista actual con el mensaje de error en la sesión
        return view('codigoVerif',$data);
        
    }

    

   }

   public function passChange(){
    $userId = session()->get('user_id');
    $password = $this->request->getPost('password1');
    
    $data = [
        'Id_user'=> $userId,
        'pass' => password_hash($password, PASSWORD_DEFAULT),
    ];
    //actualizar el pass de $userId y la contraseña con hash
    $userModel = new userModel();
    $changePass = $userModel->changePass($data);
   if($changePass == 'ok'){
        //redirigir a vista login
        $data['register_success']= '¡Contraseña actualizada correctamente.';
        session()->remove('user_id');
        return view('newlogin',$data);
   }else{
    //redirigir a vista login
    $data['error']= '¡Error al actualizar la contraseña.';
    return view('newlogin',$data);
   }
    
   }
   

    
    
}

