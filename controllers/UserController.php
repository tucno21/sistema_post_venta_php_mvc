<?php

namespace Controllers;

use MVC\Router;
use Model\Users;
//llamar a la imagen
use Intervention\Image\ImageManagerStatic as Imagex;

class UserController
{
    public static function index(Router $router)
    {
        $users = Users::all();

        $router->render('usuarios/index', [
            'users' => $users,
        ]);
    }

    public static function crear(Router $router)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            //enviar los datos al modelo
            $user = new Users($_POST['user']);

            //captutar la contraseña y encriptar
            $password = $_POST['user']['password'];
            $passwordHash = password_hash($password, PASSWORD_BCRYPT);
            //modificar el objeto para guardar
            $user->setPasswordHash($passwordHash);
            // debuguear($_SERVER['DOCUMENT_ROOT']);
            // debuguear(CARPETA_IMAGENES);

            //generar nombre unico para la imagen
            $nameImage = md5(uniqid(rand(), true)) . '.jpg';

            if ($_FILES['user']['tmp_name']['photo']) {
                //modificar imagen
                $image = Imagex::make($_FILES['user']['tmp_name']['photo'])->fit(800, 600);
                //enviar el nombre a la clase
                $user->setImage($nameImage);
            }

            //validar
            $errores = $user->validar();

            //revisar que el array no este vacio el de errores
            if (empty($errores)) {
                //crear la carpeta para subir imagenes
                if (!is_dir(CARPETA_IMAGENES)) {
                    mkdir(CARPETA_IMAGENES);
                }

                //guardar la imagen en el servidor con libreria intervension
                $image->save(CARPETA_IMAGENES . $nameImage);

                //GUARDAR EN LA BD
                $user->guardar();

                header('Location: /usuarios');
            }
        }
        $router->render('usuarios/crear', []);
    }

    public static function actualizar(Router $router)
    {
        $id = validarORedireccionar('/usuarios');
        $user = Users::find($id);
        // debuguear($user);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //asignar los atributos 
            $args = $_POST['user'];

            //captutar la contraseña y encriptar
            $password = $_POST['user']['password'];
            $passwordHash = password_hash($password, PASSWORD_BCRYPT);

            //asignar la contraseña encriptada al array 
            $args['password'] = $passwordHash;

            $user->sincronizar($args);

            $errores = $user->validar();

            $nameImage = md5(uniqid(rand(), true)) . '.jpg';

            if ($_FILES['user']['tmp_name']['photo']) {
                //modificar imagen
                $image = Imagex::make($_FILES['user']['tmp_name']['photo'])->fit(800, 600);
                //enviar el nombre a la clase
                $user->setImage($nameImage);
            }

            //revisar que el array no este vacio el de errores
            if (empty($errores)) {
                //guardar la imagen en el servidor con libreria intervension
                if ($_FILES['user']['tmp_name']['photo']) {
                    $image->save(CARPETA_IMAGENES . $nameImage);
                }
                //GUARDAR EN LA BD
                $user->guardar();
                header('Location: /usuarios');
            }
        }

        $router->render('usuarios/actualizar', [
            'user' => $user,
        ]);
    }

    public static function eliminar()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            //validar id de la captura del url

            $id = $_GET['id'];

            $id = filter_var($id, FILTER_VALIDATE_INT);

            if ($id) {

                $tipo = $_GET['tipo'];


                if (validarTipoContenido($tipo)) {
                    $user = Users::find($id);
                    // debuguear($user);
                    $user->delete();
                    header('Location: /usuarios');
                }
            }
        }
    }
}
