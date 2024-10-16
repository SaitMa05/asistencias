    <form class="row g-4 mb-4">
        <div class="col-md-2">
            <label for="validationDefault01" class="form-label text-white">Rol:</label>
            <p class="form-control" style="font-size: 16x;"><?=$rol?></p>
        </div>
        <div class="col-md-2">
            <label for="validationDefault02" class="form-label text-white">Nombre:</label>
            <p class="form-control" style="font-size: 16px;"><?= $nombre . " " . $apellido?></p>

        </div>
        <div class="col-md-4">
            <label for="validationDefaultUsername" class="form-label text-white">Fecha:</label>
            <div class="input-group">
                <input type="datetime-local" class="form-control" style="font-size: 16px;" id="validationDefaultUsername" aria-describedby="inputGroupPrepend2" required>
            </div>
        </div>
        <div class="col-md-4">
            <label for="validationDefault04" class="form-label text-white">Curso:</label>
            <select class="form-select" id="validationDefault04" required>
                <option selected disabled value="">-- Seleccionar --</option>
                <?php foreach($cursos as $curso): ?>
                    <option value="<?= $curso->id?>"><?= $curso->year . " " . $curso->division ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="col-12 text-end mb-4">
            <button class="btn btn-orange" type="buttom">Seleccionar</button>
        </div>
    </form>


    <div class="container table-asistencia p-4 my-4">
        <h2 class="py-4">Alumnos de 1ro B</h2>
        <form action="" method="POST">
            <table id="example" class="display" style="width:100%">
                <thead class="mb-4">
                    <tr>
                        <th>Nombre</th>
                        <th>Asistencia</th>
                        <th>Tardanza</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Tiger Nixon</td>
                        <td class="asistencia-confirma text-center"><input type="checkbox" name="asistencia" data-id="1" value="asistencia"></td>
                        <td class="asistencia-confirma text-center"><input type="checkbox" name="tardanza" data-id="1" value="tardanza"></td>
                    </tr>
                    <tr>
                        <td>Garrett Winters</td>
                        <td class="asistencia-confirma text-center"><input type="checkbox" name="asistencia" value="asistencia"></td>
                        <td class="asistencia-confirma text-center"><input type="checkbox" name="tardanza" data-id="1" value="tardanza"> </td>
                    </tr>
                    <tr>
                        <td>Garrett Winters</td>
                        <td class="asistencia-confirma text-center"><input type="checkbox" name="asistencia" value="asistencia"></td>
                        <td class="asistencia-confirma text-center"><input type="checkbox" name="tardanza" data-id="1" value="tardanza"> </td>
                    </tr>
                    <tr>
                        <td>Garrett Winters</td>
                        <td class="asistencia-confirma text-center"><input type="checkbox" name="asistencia" value="asistencia"></td>
                        <td class="asistencia-confirma text-center"><input type="checkbox" name="tardanza" data-id="1" value="tardanza"> </td>
                    </tr>
                    <tr>
                        <td>Garrett Winters</td>
                        <td class="asistencia-confirma text-center"><input type="checkbox" name="asistencia" value="asistencia"></td>
                        <td class="asistencia-confirma text-center"><input type="checkbox" name="tardanza" data-id="1" value="tardanza"> </td>
                    </tr>
                    <tr>
                        <td>Garrett Winters</td>
                        <td class="asistencia-confirma text-center"><input type="checkbox" name="asistencia" value="asistencia"></td>
                        <td class="asistencia-confirma text-center"><input type="checkbox" name="tardanza" data-id="1" value="tardanza"> </td>
                    </tr>
                    <tr>
                        <td>Garrett Winters</td>
                        <td class="asistencia-confirma text-center"><input type="checkbox" name="asistencia" value="asistencia"></td>
                        <td class="asistencia-confirma text-center"><input type="checkbox" name="tardanza" data-id="1" value="tardanza"> </td>
                    </tr>
                    <tr>
                        <td>Garrett Winters</td>
                        <td class="asistencia-confirma text-center"><input type="checkbox" name="asistencia" value="asistencia"></td>
                        <td class="asistencia-confirma text-center"><input type="checkbox" name="tardanza" data-id="1" value="tardanza"> </td>
                    </tr>
                    <tr>
                        <td>Garrett Winters</td>
                        <td class="asistencia-confirma text-center"><input type="checkbox" name="asistencia" value="asistencia"></td>
                        <td class="asistencia-confirma text-center"><input type="checkbox" name="tardanza" data-id="1" value="tardanza"> </td>
                    </tr>
                    <!-- Agrega más filas aquí -->
                </tbody>
            </table>
            <div class="detalles">
                <h4>Detalles: </h4>
                <textarea name="" id=""></textarea>
            </div>
            <div class="col-12 text-end my-4 px-3">
                <button class="btn btn-orange" type="buttom">Enviar Asistencia</button>
            </div>
        </form>
    </div>

    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                "columnDefs": [
                { "width": "90%", "targets": 0 },  // Ancho de la primera columna
                { "width": "10%", "targets": 1 },  // Ancho de la segunda columna
            ]
            });
        });
    </script>
</main>