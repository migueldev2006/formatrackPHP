<?php
class Usuario
{
    private $db;

    public function __construct()
    {
        $this->db = new BaseConexion;
    }

    public function obtenerUsuarios()
    {
        // Preparar la consulta de selección
        $this->db->query('SELECT * FROM usuarios');

        try {
            // Ejecutar la consulta y obtener los resultados
            return $this->db->registros();
        } catch (Exception $e) {
            // Manejo de errores: Registrar el error y devolver un array vacío
            error_log("Error al obtener usuarios: " . $e->getMessage());
            return [];
        }
    }

    public function agregarUsuario($datos)
    {
        try {
            // Preparar la consulta SQL
            $this->db->query("INSERT INTO usuarios (nombre, email, telefono) VALUES (:nombre, :email, :telefono)");

            // Vincular los valores a los parámetros
            $this->db->bind(':nombre', $datos['nombre']);
            $this->db->bind(':email', $datos['email']);
            $this->db->bind(':telefono', $datos['telefono']);

            // Ejecutar la consulta
            return $this->db->execute();
        } catch (PDOException $e) {
            // Registrar el error y devolver false
            error_log("Error al agregar usuario: " . $e->getMessage());
            return false;
        }
    }

    public function obtenerUsuarioId($id)
    {
        try {
            // Preparar la consulta SQL para obtener un usuario específico por su ID
            $this->db->query("SELECT * FROM usuarios WHERE id_usuario = :id");
            $this->db->bind(':id', $id);

            // Ejecutar la consulta y obtener un solo registro
            return $this->db->registro();
        } catch (PDOException $e) {
            // Manejo de errores: Registrar el error y devolver null
            error_log("Error al obtener usuario por ID: " . $e->getMessage());
            return null;
        }
    }

    public function actualizarUsuario($datos)
    {
        try {
            // Preparar la consulta SQL para actualizar un usuario
            $this->db->query("UPDATE usuarios SET nombre = :nombre, email = :email, telefono = :telefono WHERE id_usuario = :id");

            // Vincular los valores a los parámetros
            $this->db->bind(':id', $datos['id_usuario']);
            $this->db->bind(':nombre', $datos['nombre']);
            $this->db->bind(':email', $datos['email']);
            $this->db->bind(':telefono', $datos['telefono']);

            // Ejecutar la consulta
            return $this->db->execute();
        } catch (PDOException $e) {
            // Manejo de errores: Registrar el error y devolver false
            error_log("Error al actualizar usuario: " . $e->getMessage());
            return false;
        }
    }

    public function borrarUsuario($datos)
    {
        try {
            // Preparar la consulta SQL para borrar un usuario
            $this->db->query("DELETE FROM usuarios WHERE id_usuario = :id");
            $this->db->bind(':id', $datos['id_usuario']);

            // Ejecutar la consulta
            return $this->db->execute();
        } catch (PDOException $e) {
            // Manejo de errores: Registrar el error y devolver false
            error_log("Error al borrar usuario: " . $e->getMessage());
            return false;
        }
    }
}
