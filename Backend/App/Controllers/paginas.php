<?php

class Paginas extends Controlador
{
    private $usuarioModelo;

    public function __construct()
    {
        $this->usuarioModelo = $this->modelo('usuario');
    }
    public function index()
    {
        //obtener los usuarios

        $usuarios = $this->usuarioModelo->obtenerUsuarios();
        // Preparamos los datos para pasarlos a la vista
        $datos = [
            'usuarios' => $usuarios

        ];

        // Llamamos a la vista con los datos
        $this->vista('paginas/inicio', $datos);
    }

    public function agregar()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Procesar el formulario enviado

            // Recoger y sanitizar datos del formulario
            $datos = [
                'nombre' => trim($_POST['nombre']),
                'email' => trim($_POST['email']),
                'telefono' => trim($_POST['telefono'])
            ];

            // Intentar agregar el usuario usando el modelo
            if ($this->usuarioModelo->agregarUsuario($datos)) {
                // Redireccionar a la página principal si la inserción fue exitosa
                redireccionar('/paginas');
            } else {
                // Manejo de error en la inserción
                die('Algo salió mal');
            }
        } else {
            // Cargar la vista inicial con datos vacíos si la solicitud no es POST
            $datos = [
                'nombre' => '',
                'email' => '',
                'telefono' => ''
            ];
            $this->vista('paginas/agregar', $datos);
        }
    }

    public function editar($id)
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Procesar el formulario enviado

            // Recoger y sanitizar datos del formulario
            $datos = [
                'id_usuario' => $id,
                'nombre' => trim($_POST['nombre']),
                'email' => trim($_POST['email']),
                'telefono' => trim($_POST['telefono'])
            ];

            // Intentar agregar el usuario usando el modelo
            if ($this->usuarioModelo->actualizarUsuario($datos)) {
                // Redireccionar a la página principal si la inserción fue exitosa
                redireccionar('/paginas');
            } else {
                // Manejo de error en la inserción
                die('Algo salió mal');
            }
        } else {

            //obtener informacion de usuario desde el modelo

            $usuario = $this->usuarioModelo->obtenerUsuarioId($id);


            // Cargar la vista inicial con datos vacíos si la solicitud no es POST
            $datos = [
                'id_usuario' => $usuario->id_usuario,
                'nombre' => $usuario->nombre,
                'email' => $usuario->email,
                'telefono' => $usuario->telefono
            ];
            $this->vista('paginas/editar', $datos);
        }
    }

    public function borrar($id)
    {

        //obtener informacion desde el modulo
        $usuario = $this->usuarioModelo->obtenerUsuarioId($id);


        // Cargar la vista inicial con datos vacíos si la solicitud no es POST
        $datos = [
            'id_usuario' => $usuario->id_usuario,
            'nombre' => $usuario->nombre,
            'email' => $usuario->email,
            'telefono' => $usuario->telefono
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Procesar el formulario enviado

            // Recoger y sanitizar datos del formulario
            $datos = [
                'id_usuario' => $id

            ];

            // Intentar agregar el usuario usando el modelo
            if ($this->usuarioModelo->borrarUsuario($datos)) {
                // Redireccionar a la página principal si la inserción fue exitosa
                redireccionar('/paginas');
            } else {
                // Manejo de error en la inserción
                die('Algo salió mal');
            }
        }

        //obtener informacion de usuario desde el modelo

        $this->vista('paginas/borrar', $datos);
    }
}
