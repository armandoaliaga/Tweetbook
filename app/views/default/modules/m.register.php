<?php if(!isset($_SESSION))
 {
session_start();
 }
 if(isset($usuario->errors)){
    
     foreach ($usuario->errors as $key ) {
         ?>
        <div class="row">
          <div class="col-lg-8">
            <div class="alert alert-dismissable alert-danger">
              <button type="button" class="close" data-dismiss="alert">×</button>
              <ul>
                  <li><strong><?php echo $key."<br>"; ?></strong></li>
              </ul>
            </div>
          </div>          
        </div>
        
<?php     }    
 }
if (isset($_SESSION["autentificado"]) && $_SESSION["autentificado"] == "SI") {
	//si no existe, envio a la página de autentificacion
	header("Location: index.php?action=principal");
	//ademas salgo de este script
	exit();
}
?>
<?php
//mostrar mensaje de success al registro
if(isset($_SESSION['success']))
{
?>
<div class="row">
    <div class="col-lg-8">
        <div class="alert alert-dismissable alert-success">
          <button type="button" class="close" data-dismiss="alert">×</button>
          <strong>Exito!</strong> <?php echo $_SESSION['success']; ?>
        </div>
      </div>
</div>
<?php
 unset($_SESSION['success']);
}
?>
<?php
//mostrar mensaje de error de contraseñas
if(isset($_SESSION['error_passwords']))
{?>
<div class="row">
          <div class="col-lg-8">
            <div class="alert alert-dismissable alert-danger">
              <button type="button" class="close" data-dismiss="alert">×</button>
              <ul>
                  <li><strong><?php echo $_SESSION['error_passwords']; ?></strong></li>
              </ul>
            </div>
          </div>          
        </div>
<?php
unset($_SESSION['error_passwords']);
}?>
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
              <input type="text" name="name" cannot-be-blank class="form-control" id="inputName" placeholder="Nombre" required>
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
              <input type="text" name="username" cannot-be-blank  class="form-control" id="inputName" placeholder="Nombre de usuario" required>
            </div>
          </div>
          <div class="form-group">
              <label for="inputPassword" class="col-lg-3 control-label">Contraseña</label>
            <div class="col-lg-9">
                <input type="password" name="password" cannot-be-blank class="form-control" id="inputPassword" placeholder="Contraseña" required>           
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
              <input type="text" name="email" is-email cannot-be-blank  class="form-control"  id="inputName" placeholder="Correo" required>
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
            <div id="datetimepicker4" class="input-append input-group col-lg-8">
              <input class="form-control input-append" style="width:472px;" data-format="yyyy-MM-dd" type="text" name="birthday"></input>
              <span class="add-on btn input-group-btn" >
               <i data-date-icon="icon-calendar icon-white">
                </i>
              </span>
            </div>        
           </div>                             
          
          
          <div class="form-group">
            <div class="col-lg-9 col-lg-offset-3">
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
<script>
    addErrorsHandler();
 </script>
<?php
if (isset($_SESSION["error_login"]))
{
    $error=$_SESSION["error_login"];
    echo "<script language='JavaScript'> alert('$error');</script>";    
    unset($_SESSION["error_login"]);
}
?>