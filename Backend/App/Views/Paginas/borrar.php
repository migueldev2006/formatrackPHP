<?php require_once RUTA_APP . '/Views/Inc/Header.php'; ?>

<div class="container mt-5">
    <div class="col-md-8 mx-auto">
        <div class="d-flex justify-content-start mb-3">
            <a href="<?php echo RUTA_URL; ?>paginas" class="btn btn-secondary">
                Volver
            </a>
        </div>

        <div class="card card-body bg-light">
            <h2>Eliminar Usuario</h2>
            <form action="" method="POST">

                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre: <sup>*</sup></label>
                    <input type="text" name="nombre" id="nombre" value="<?php echo $datos['nombre']; ?>" class="form-control form-control-lg" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email: <sup>*</sup></label>
                    <input type="email" name="email" id="email" value="<?php echo $datos['email']; ?>" class=" form-control form-control-lg" required>
                </div>

                <div class="mb-3">
                    <label for="telefono" class="form-label">Teléfono: <sup>*</sup></label>
                    <input type="text" name="telefono" id="telefono" value="<?php echo $datos['telefono']; ?>" class=" form-control form-control-lg" required>
                </div>

                <input type="submit" class="btn btn-success" value="Eliminar Usuario">
            </form>
        </div>
    </div>
</div>
<?php require_once RUTA_APP . '/Views/Inc/Footer.php'; ?>