<div class="row">
<div class="col-lg-10">
    <div class="page-header">
              <h1 id="type">Registrase</h1>
            </div>
    <div class="well">
      <form class="bs-example form-horizontal" action="index.php" method="post">
        <fieldset>          
          <div class="form-group">
            <label for="inputName" class="col-lg-3 control-label">Nombre</label>
            <div class="col-lg-9">
              <input type="text" name="name" class="form-control" id="inputName" placeholder="Nombre" required>
            </div>
          </div>
          <div class="form-group">
            <label for="inputName" class="col-lg-3 control-label">Apellido</label>
            <div class="col-lg-9">
              <input type="text" name="last_name" class="form-control" id="inputName" placeholder="Apellido">
            </div>
          </div>
          <div class="form-group">
            <label for="inputName" class="col-lg-3 control-label">Nombre de usuario</label>
            <div class="col-lg-9">
              <input type="text" name="username" class="form-control" id="inputName" placeholder="Nombre de usuario" required>
            </div>
          </div>
          <div class="form-group">
              <label for="inputPassword" class="col-lg-3 control-label">Contraseña</label>
            <div class="col-lg-9">
                <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Contraseña" required>           
            </div>
          </div>  
           <div class="form-group">
              <label for="inputPassword" class="col-lg-3 control-label">Contraseña de confirmacion</label>
            <div class="col-lg-9">
                <input type="password" name="passwordconfirmation" class="form-control" id="inputPassword" placeholder="Contraseña de confirmacion" required>           
            </div>
          </div>  
          <div class="form-group">
            <label for="inputName" class="col-lg-3 control-label">Correo</label>
            <div class="col-lg-9">
              <input type="text" name="email" class="form-control" id="inputName" placeholder="Correo" required>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Sexo</label>
            <div class="col-lg-9">
              <div class="radio">
                <label>
                  <input type="radio" name="gender" id="optionsRadios1" value="m" checked="">
                  Masculino
                </label>
              </div>
              <div class="radio">
                <label>
                  <input type="radio" name="gender" id="optionsRadios2" value="f">
                  Femenido
                </label>
              </div>
            </div>
          </div>
           <div class="form-group">
            <label for="inputName" class="col-lg-3 control-label">Ciudad</label>
            <div class="col-lg-9">
              <input type="text" name="city" class="form-control" id="inputName" placeholder="Ciudad">
            </div>
          </div>
          <div class="form-group">
            <label for="select" class="col-lg-3 control-label">Situacion sentimental</label>
            <div class="col-lg-9">
              <select class="form-control" id="select" name="relationship">
                <option>Soltero(a)</option>
                <option>Casado(a)</option>
                <option>Tiene una relacion</option>
                <option>Separado(a)</option>
                <option>Divorciado(a)</option>
                <option>Viudo(a)</option>
              </select>              
            </div>
          </div>
          
          <div class="form-group">
            <label for="inputDate" class="col-lg-3 control-label">Fecha Nacimiento</label>
            <div id="datetimepicker4" class="input-append col-lg-9">
              <input class="form-control input-append" data-format="yyyy-MM-dd" type="text" name="birthday" style="border-top-left-radius: 4px;"></input>
              <span class="add-on input-group-addon" style="cursor:pointer;">
               <i data-date-icon="icon-calendar icon-white">
                </i>
              </span>
            </div>        
           </div>                             
          
          
          <div class="form-group">
            <div class="col-lg-9 col-lg-offset-2">
              <button class="btn btn-default">Cancel</button> 
              <button type="submit" class="btn btn-primary">Registrarme</button> 
            </div>
        
        </fieldset>
      </form>
    </div>
  </div>
</div>  
   <script type="text/javascript">
  $(function() {   
    $('#datetimepicker4').datetimepicker({
      pickTime: false,
      maskInput: true,
      language: 'es'
    });
  });
</script>