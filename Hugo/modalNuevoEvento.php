<div class="modal" id="exampleModal"  tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Registrar Nuevo Evento</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
  <form name="formEvento" id="formEvento" action="nuevoEvento.php" class="form-horizontal" method="POST">
		<div class="form-group">
			<label for="evento" class="col-sm-12 control-label">Razón de la cita</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="evento" id="evento" placeholder="Razón de la cita" required/>
			</div>
		</div>
    <div class="form-group">
      <label for="fecha_inicio" class="col-sm-12 control-label">Fecha Inicio</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="fecha_inicio" id="fecha_inicio" placeholder="Fecha Inicio" readonly>
      </div>
    </div>
    <div class="form-group">
      <label for="fecha_fin" class="col-sm-12 control-label">Fecha Final</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="fecha_fin" id="fecha_fin" placeholder="Fecha Final" readonly>
      </div>
    </div>

  <div class="col-md-12 form-group">
  <label for="combo" class=" control-label">Tipo de servicio</label>
  <select name="color_evento" class="form-control col-sm-10" >
    <!-- Opciones de la lista -->
    <option value="" name="color_evento">Servicio</option>
    <option value="Corte" name="color_evento">Corte</option> <!-- Opción por defecto -->
    <option value="Peinado" name="color_evento">Peinado</option>
    <option value="Maquillaje" name="color_evento">Maquillaje</option>
    <option value="Manicure" name="color_evento">Manicure</option>
    <option value="Pedicure" name="color_evento">Pedicure</option>
    <option value="Depilado" name="color_evento">Depilado</option>
    <option value="Extensiones" name="color_evento">Extensiones</option>
  </select>
</div>

		
	   <div class="modal-footer">
      	<button type="submit" class="btn btn-success">Guardar Evento</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Salir</button>
    	</div>
	</form>
      
    </div>
  </div>
</div>