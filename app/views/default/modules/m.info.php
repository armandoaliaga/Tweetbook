<?php
include ("app/controller/mvc.security.php");
?>
<LINK REL=StyleSheet HREF="app/views/default/css/focusPost.css" TYPE="text/css" MEDIA=screen>
<div class="row">
<div class="page-header col-lg-11">
    <h1 id="type"><?php echo $user->name." ".$user->last_name ?></h1>
  </div>
</div>

<div class="row">
<div class="bs-example col-lg-11">
    <ul class="nav nav-tabs" style="margin-bottom: 15px;">
        <li ><a href="index.php?action=userprofile&tab=wall&user=<?php echo $user->username; ?>" >Muro</a></li>
        <li class="active"><a href="index.php?action=userprofile&tab=info&user=<?php echo $user->username; ?>">Informacion</a></li>
        <li><a href="index.php?action=userprofile&tab=photo&user=<?php echo $user->username; ?>" >Fotos</a></li>
        
    </ul>   
</div>
</div>


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


<script>
    function change()
    {
        document.getElementById("mostrar").style.display='none';
        document.getElementById("editar").style.display='inline';
    }
    function change_inverse()
    {
        document.getElementById("editar").style.display='none';
        document.getElementById("mostrar").style.display='inline';
    }
    
    function edit_password()
    {
        document.getElementById("mostrar").style.display='none';
        document.getElementById("editPass").style.display='inline';
    }
    function cancel_pass()
    {
        document.getElementById("editPass").style.display='none';
        document.getElementById("mostrar").style.display='inline';
    }
</script>

<div class="row" id="mostrar">
<div class="col-lg-11">
    <div class="row">             
             <div class="col-lg-10"><H2><img width="42" src="app/views/default/images/person.png" />&nbsp;Informacion</H2></div>
             <?php if($user->id == $_SESSION["current_user"]->id){?>
             <div class="pager col-lg-2 ">             
                <ul class="nav navbar-nav navbar-right ">
                <li class="dropdown">                                    
                   <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img width="20" src="app/views/default/images/edit.png"></a>
                   <ul class="dropdown-menu">
                       <a href="#" onclick="change();">Editar Perfil</a><br>
                      <a href="#" onclick="edit_password();">Cambiar Contraseña</a>
                   </ul>
               </li>
               </ul>                                      
            </div>
             
             <?php }?>
    </div>
    <div class="well">         
      <form class="bs-example form-horizontal">
        <fieldset>          
          <div class="form-group">
            <label for="inputName" class="col-lg-4 control-label">Nombre :</label>
            <div class="col-lg-8">
                <div style="margin-top: 11px;"><?php echo $user->name; ?></div>
            </div>
          </div>
          <div class="form-group">
            <label for="inputName" class="col-lg-4 control-label">Apellido :</label>
            <div class="col-lg-8">
                <div style="margin-top: 11px;"><?php echo $user->last_name; ?></div>
            </div>
          </div>
          <div class="form-group">
            <label for="inputName" class="col-lg-4 control-label">Nombre de usuario :</label>
            <div class="col-lg-8">
                <div style="margin-top: 11px;"><?php echo $user->username; ?></div>
            </div>
          </div>                  
          <div class="form-group">
            <label for="inputName" class="col-lg-4 control-label">Correo :</label>
              <div class="col-lg-8">
                <div style="margin-top: 11px;"><?php echo $user->email; ?></div>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-4 control-label">Sexo :</label>
              <div class="col-lg-8">                  
                    <?php if($user->gender == "m"){ ?>
               <div style="margin-top: 11px;">Maculino</div>
                <?php }else{ ?>                                    
                    <div style="margin-top: 11px;">Femenino</div>
                <?php } ?>                
            </div>
          </div>
           <div class="form-group">
            <label for="inputName" class="col-lg-4 control-label">Ciudad :</label>
             <div class="col-lg-8">
                <div style="margin-top: 11px;"><?php echo $user->city; ?></div>
            </div>
          </div>
          <div class="form-group">
            <label for="select" class="col-lg-4 control-label">Situacion :</label>
             <div class="col-lg-8">
                <div style="margin-top: 11px;"><?php echo $user->relationship_status; ?></div>
            </div>
          </div>
          
          <div class="form-group">
            <label for="inputDate" class="col-lg-4 control-label">Fecha Nacimiento :</label>
            <div class="col-lg-8">
                <?php if($user->birthday != ""){?>
                    <div style="margin-top: 11px;"><?php echo $user->birthday->format('d-m-Y') ?></div>
                <?php }?>
            </div>
           </div>                                          
        </fieldset>
      </form>
    </div>
  </div>
</div>  



<div class="row" id="editar" style="display: none;">
<div class="col-lg-11">
     <div class="row">             
             <div class="col-lg-10"><H2><img width="42" src="app/views/default/images/person.png" />&nbsp;Editar Perfil</H2></div>           
         </div>  
    <div class="well">            
       <form class="bs-example form-horizontal" action="index.php" method="post">
        <fieldset>          
          <div class="form-group">
            <label for="inputName" class="col-lg-3 control-label">Nombre</label>
            <div class="col-lg-9">
                <input type="text" value="<?php echo $user->name; ?>" name="new_name" cannot-be-blank class="form-control" id="inputName" placeholder="Nombre" required maxlength="50">
            </div>
          </div>
          <div class="form-group">
            <label for="inputName" class="col-lg-3 control-label">Apellido</label>
            <div class="col-lg-9">
              <input type="text" value="<?php echo $user->last_name; ?>" name="new_last_name" class="form-control" id="inputName" placeholder="Apellido" maxlength="50">
            </div>
          </div>                 
          
          <div class="form-group">
            <label class="col-lg-3 control-label">Sexo</label>
                <?php if($user->gender == "m"){ ?>
                <div class="col-lg-9">
                  <div class="radio">
                    <label>
                      <input type="radio" name="new_gender" id="optionsRadios1" value="m" checked="">
                      Masculino
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="new_gender" id="optionsRadios2" value="f">
                      Femenino
                    </label>
                  </div>
                </div>
                <?php }else{ ?>                                    
                    <div class="col-lg-9">
                      <div class="radio">
                        <label>
                          <input type="radio" name="new_gender" id="optionsRadios1" value="m" >
                          Masculino
                        </label>
                      </div>
                      <div class="radio">
                        <label>
                          <input type="radio" name="new_gender" id="optionsRadios2" value="f" checked="">
                          Femenino
                        </label>
                      </div>
                    </div>
                <?php } ?>
          </div>
           <div class="form-group">
            <label for="inputName" class="col-lg-3 control-label">Ciudad</label>
            <div class="col-lg-9">
              <input type="text" value="<?php echo $user->city; ?>" name="new_city" class="form-control" id="inputName" placeholder="Ciudad" maxlength="40">
            </div>
          </div>
          <div class="form-group">
            <label for="select" class="col-lg-3 control-label">Situacion sentimental</label>
            <div class="col-lg-9">
              <select class="form-control" id="select" name="new_relationship">
                <?php if($user->relationship_status == "Soltero(a)"){?>                  
                    <option selected>Soltero(a)</option>
                <?php }else{?>
                    <option>Soltero(a)</option>
                <?php }?>
                <?php if($user->relationship_status == "Casado(a)"){?>                  
                    <option selected>Casado(a)</option>
                <?php }else{?>
                    <option>Casado(a)</option>
                <?php }?>
                <?php if($user->relationship_status == "Tiene una relacion"){?>                  
                    <option selected>Tiene una relacion</option>
                <?php }else{?>
                    <option>Tiene una relacion</option>
                <?php }?>                
                  <?php if($user->relationship_status == "Separado(a)"){?>                  
                    <option selected>Separado(a)</option>
                <?php }else{?>
                    <option>Separado(a)</option>
                <?php }?> 
                  <?php if($user->relationship_status == "Divorciado(a)"){?>                  
                    <option selected>Divorciado(a)</option>
                <?php }else{?>
                    <option>Divorciado(a)</option>
                <?php }?>  
                  <?php if($user->relationship_status == "Viudo(a)"){?>                  
                    <option selected>Viudo(a)</option>
                <?php }else{?>
                    <option>Viudo(a)</option>
                <?php }?>                    
              </select>              
            </div>
          </div>
          
          <div class="form-group">
            <label for="inputDate" class="col-lg-3 control-label">Fecha Nacimiento</label>
            <div id="datetimepicker4" class="input-append input-group col-lg-8">
              <input class="form-control input-append" value="<?php if ($user->birthday != ""){ echo $user->birthday->format('d-m-Y'); }?>"style="width:351px;" data-format="dd-MM-yyyy" type="text" name="new_birthday"></input>
              <span class="add-on btn input-group-btn" >
               <i data-date-icon="icon-calendar icon-white">
                </i>
              </span>
            </div>        
           </div>                                                
          <div class="form-group">
            <div class="col-lg-9 col-lg-offset-3">
                <button type="button" class="btn btn-default" onclick="change_inverse();">Cancel</button> 
              <button type="submit" class="btn btn-primary">Guardar Cambios</button> 
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


<div class="row" style="display: none" id="editPass">
<div class="col-lg-12">
    <div class="row">             
             <div class="col-lg-10"><H2><img width="42" src="app/views/default/images/person.png" />&nbsp;Editar Contraseña</H2></div>           
         </div>
    <div class="well">
      <form class="bs-example form-horizontal" action="index.php" method="post">          
        <fieldset>          
         
          <div class="form-group">
              <label for="inputPassword" class="col-lg-3 control-label">* Contraseña Actual</label>
            <div class="col-lg-9">
                <input type="password" name="current_password" cannot-be-blank class="form-control" id="inputPassword" placeholder="Contraseña" required maxlength="25">           
            </div>
          </div> 
          <div class="form-group">
              <label for="inputPassword" class="col-lg-3 control-label">* Nueva Contraseña</label>
            <div class="col-lg-9">
                <input type="password" name="new_password" cannot-be-blank class="form-control" id="inputPassword" placeholder="Contraseña" required maxlength="25">           
            </div>
          </div>  
           <div class="form-group">
              <label for="inputPassword" class="col-lg-3 control-label">* Contraseña de confirmacion</label>
            <div class="col-lg-9">
                <input type="password" name="password_confirmation" class="form-control" id="inputPassword" placeholder="Contraseña de confirmacion" required maxlength="25">           
            </div>
          </div>  
                  
          <div class="form-group">
            <div class="col-lg-9 col-lg-offset-3">
                <button type="button" class="btn btn-default" onclick="cancel_pass();">Cancel</button> 
              <button type="submit" class="btn btn-primary">Cambiar Contraseña</button> 
            </div>        
        </fieldset>
      </form>
    </div>
  </div>
</div>  