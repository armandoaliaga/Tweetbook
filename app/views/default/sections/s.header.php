<?php 
if(!isset($_SESSION))
 {
session_start();
 }?>
<div>
 <div class="navbar navbar-default navbar-fixed-top">
     <div class="container">
                <div class="navbar-header">                 
                    <a class="navbar-brand" href="index.php" style="padding:0px;"><img src="app/views/default/images/Logo_t.png" style="height:51px;"/></a>
                </div>
                <ul class="nav navbar-nav" >  
                    <li><a href="#"></a></li>
                    <li><a href="#"></a></li> 
                    <li><a href="#"></a></li> 
                    <li><a href="#"></a></li> 
                    <li><a href="#"></a></li> 
                    <li><a href="#"></a></li>
                  </ul>         
                <div class="navbar-collapse collapse navbar-inverse-collapse">                 
                    <?php
                                                   
                    if(isset($_SESSION["autentificado"]) && $_SESSION["autentificado"] == "SI"){?>
                  <form class="navbar-form navbar-center" name="search_friend" method="post" action="index.php">     
                      <input type="hidden" value="search" name="postinfo" />
                    <input type="text" name="search_param" class="form-control col-lg-8" placeholder="Buscar..." autocomplete="off" style="width: 40%;">                                       
                    <ul class="nav navbar-nav navbar-center">
                        <li><button class="btn btn-primary" style="margin-left: 5px; margin-top: 1px; " href="#">Buscar</button></li>    
                    </ul>
                    </form> 
                     <ul class="nav navbar-nav navbar-right">    
                         <?php if($_SESSION["current_user"]->username != "admin"){?>
                     <li><a href="index.php?action=userprofile&tab=wall&user=<?php echo $_SESSION["current_user"]->username; ?>">Perfil</a></li>
                    <li><a href="index.php?action=principal">Inicio</a></li>
                    <?php }?>
                    <li class="dropdown">
                        <?php 
                            $email = $_SESSION["current_user"]->email;                            
                            $size = 25;
                            $grav_url = "http://www.gravatar.com/avatar/".md5(strtolower( trim( $email ) ) ) . "?d=monsterid&s=" . $size;
                        ?>
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="<?php echo $grav_url; ?>"/>
<?php echo $_SESSION["current_user"]->username;?> <b class="caret"></b></a>
                      <ul class="dropdown-menu">                                                
                        <li><a href="index.php?action=logout">Salir</a></li>
                      </ul>
                    </li>
                  </ul>
                     <?php }else{?>                     
                       <form class="navbar-form navbar-right" action="index.php" method="post">
                         <div class="form-group">
                           <input name="usernameoremail" type="text" style="width: 250px; margin-right: 5px;" class="form-control col-lg-8" placeholder="Nombre de usuario o correo" required>    
                         </div>
                         <div class="form-group">
                            <input name="password" type="password" style="width: 250px; margin-right: 10px;" size="30" class="form-control col-lg-8" placeholder="Contrasenia" required>   
                         </div>
                         <button type="submit" class="btn btn-primary">Ingresar</button>
                       </form>
                    <?php }?>                 
                </div>               
        </div>
      </div>
</div>