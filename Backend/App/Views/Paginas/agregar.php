<?php require_once RUTA_APP . '/Views/Inc/Header.php'; ?>

<div class="container mt-5">
    <div class="col-md-8 mx-auto">
        <div class="d-flex justify-content-start mb-3">
            <a href="<?php echo RUTA_URL; ?>paginas" class="btn btn-secondary">
                Volver
            </a>
        </div>

        <div class="card card-body bg-light">
            <h2>Agregar Usuario</h2>
            <form action="<?php echo RUTA_URL; ?>paginas/agregar" method="POST">

                <!-- Campo Nombre -->
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre: <sup>*</sup></label>
                    <input
                        type="text"
                        name="nombre"
                        id="nombre"
                        class="form-control form-control-lg <?php echo !empty($datos['nombre_error']) ? 'is-invalid' : ''; ?>"
                        value="<?php echo $datos['nombre'] ?? ''; ?>"
                        required>
                    <div class="invalid-feedback">
                        <?php echo $datos['nombre_error'] ?? ''; ?>
                    </div>
                </div>

                <!-- Campo Email -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email: <sup>*</sup></label>
                    <input
                        type="email"
                        name="email"
                        id="email"
                        class="form-control form-control-lg <?php echo !empty($datos['email_error']) ? 'is-invalid' : ''; ?>"
                        value="<?php echo $datos['email'] ?? ''; ?>"
                        required>
                    <div class="invalid-feedback">
                        <?php echo $datos['email_error'] ?? ''; ?>
                    </div>
                </div>

                <!-- Campo Teléfono -->
                <div class="mb-3">
                    <label for="telefono" class="form-label">Teléfono: <sup>*</sup></label>
                    <input
                        type="text"
                        name="telefono"
                        id="telefono"
                        class="form-control form-control-lg <?php echo !empty($datos['telefono_error']) ? 'is-invalid' : ''; ?>"
                        value="<?php echo $datos['telefono'] ?? ''; ?>"
                        required>
                    <div class="invalid-feedback">
                        <?php echo $datos['telefono_error'] ?? ''; ?>
                    </div>
                </div>

                <!-- Botón de envío -->
                <input type="submit" class="btn btn-success" value="Agregar Usuario">
            </form>
        </div>
    </div>
</div>

<?php require_once RUTA_APP . '/Views/Inc/Footer.php'; ?>