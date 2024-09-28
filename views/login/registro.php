<h2 class="text-center text-white mt-4">Registro</h2>
<form class="formLogin rounded-0" id="formRegistro" action="/registro/crear" method="post">
    <div class="mb-3">
        <label for="nombre" class="form-label text-white">Nombre</label>
        <input type="text" class="form-control rounded-0" id="nombre" name="nombre" placeholder="Ingresa tu nombre" required>
    </div>
    <div class="mb-3">
        <label for="apellido" class="form-label text-white">Apellido</label>
        <input type="text" class="form-control rounded-0" id="apellido" name="apellido" placeholder="Ingresa tu apellido" required>
    </div>
    <div class="mb-3">
        <label for="userName" class="form-label text-white">Nombre de Usuario</label>
        <input type="text" class="form-control rounded-0" id="userName" name="nombreUsuario" placeholder="Ingresa tu nombre de usuario" required>
    </div>
    <div class="mb-3">
        <label for="dni" class="form-label text-white">DNI</label>
        <input type="text" class="form-control rounded-0" id="dni" name="dni" placeholder="Ingresa tu DNI" required>
    </div>
    <div class="mb-3">
        <label for="telefono" class="form-label text-white">Teléfono</label>
        <input type="tel" class="form-control rounded-0" id="telefono" name="telefono" placeholder="Ingresa tu teléfono" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label text-white">Email</label>
        <input type="email" class="form-control rounded-0" id="email" name="email" placeholder="Ingresa tu email" required>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label text-white">Contraseña</label>
        <input type="password" class="form-control rounded-0" id="password" name="password" placeholder="Ingresa tu contraseña" required>
    </div>
    <div class="mb-3">
        <label for="confirmarPassword" class="form-label text-white">Confirmar Contraseña</label>
        <input type="password" class="form-control rounded-0" id="" name="" placeholder="Confirma tu contraseña" required>
    </div>
    <div class="mb-3">
        <select class="form-select rounded-0" style="width: 60%;" name="fkRol" id="fkRol">
            <option value="" disabled selected> -- Seleccionar --</option>
            <option value="1">Profesor</option>
            <option value="2">Preceptor</option>
            <option value="3">Directivo</option>
        </select>
    </div>
    <button type="submit" class="btn btn-orange w-100 rounded-0">Registrarse</button>
</form>

<script src="../build/js/login.js"></script>
