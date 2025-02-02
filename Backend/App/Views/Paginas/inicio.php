<?php require RUTA_APP . '/Views/Inc/Header.php'; ?>

<div class="container mt-5">
    <div class="col-md-8 mx-auto">
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Id</th>
                    <th>Nombre(s)</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th colspan="2" class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($datos['usuarios'] as $usuario): ?>
                    <tr>
                        <td><?php echo $usuario->id_usuario; ?></td>
                        <td><?php echo $usuario->nombre; ?></td>
                        <td><?php echo $usuario->email; ?></td>
                        <td><?php echo $usuario->telefono; ?></td>
                        <td class="text-center">
                            <a href="<?php echo RUTA_URL; ?>paginas/editar/<?php echo $usuario->id_usuario ?>" class="btn btn-warning btn-sm">Editar</a>
                        </td>
                        <td class="text-center">
                            <a href="<?php echo RUTA_URL; ?>paginas/borrar/<?php echo $usuario->id_usuario ?>" class="btn btn-danger btn-sm">Borrar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php require RUTA_APP . '/Views/Inc/Footer.php'; ?>