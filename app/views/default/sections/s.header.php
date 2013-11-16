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
                  <form class="navbar-form navbar-center">                       
                    <input type="text" class="form-control col-lg-8" placeholder="Search" style="width: 40%;">                                       
                  </form>                    
                    <ul class="nav navbar-nav navbar-center">
                        <li><button class="btn btn-primary" style="margin-left: 5px; margin-top: 1px; " href="#">Buscar</button></li>    
                    </ul>
                     <ul class="nav navbar-nav navbar-right">
                     <li><a href="#">Perfil</a></li>
                    <li><a href="#">Inicio</a></li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
                      <ul class="dropdown-menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li class="divider"></li>
                        <li><a href="index.php?action=logout">Salir</a></li>
                      </ul>
                    </li>
                  </ul>
                     <?php }else{?>                     
                       <form class="navbar-form navbar-right" action="index.php" method="post">
                         <div class="form-group">
                           <input name="usernameoremail" type="text" style="width: 250px; margin-right: 5px;" class="form-control col-lg-8" placeholder="Nombre de usuario o correo">    
                         </div>
                         <div class="form-group">
                            <input name="password" type="password" style="width: 250px; margin-right: 10px;" size="30" class="form-control col-lg-8" placeholder="Contrasenia">   
                         </div>
                         <button type="submit" class="btn btn-primary">Ingresar</button>
                       </form>
                    <?php }?>                 
                </div>               
        </div>
      </div>
</div>