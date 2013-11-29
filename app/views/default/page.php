<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Tweetbook+</title>
<link rel="shortcut icon" href="app/views/default/images/favicon2.png" />
<script type="text/javascript" src="app/views/default/js/validation-errors.js"></script>
<script type="text/javascript" src="app/views/default/js/jquery.min.js"></script>
<script type="text/javascript" src="app/views/default/js/bootstrap.min.js"></script>
<script type="text/javascript" src="app/views/default/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="app/views/default/js/bootstrap-tooltip.js"></script>
<LINK REL=StyleSheet HREF="app/views/default/css/focusPost.css" TYPE="text/css" MEDIA=screen>
<LINK REL=StyleSheet HREF="app/views/default/css/auxDatepicker.css" TYPE="text/css" MEDIA=screen>
<LINK REL=StyleSheet HREF="app/views/default/css/bootstrap.css" TYPE="text/css" MEDIA=screen>
<LINK REL=StyleSheet HREF="app/views/default/css/bootstrap.min.css" TYPE="text/css" MEDIA=screen> 
<LINK REL=StyleSheet HREF="app/views/default/css/bootstrap-datetimepicker.min.css" TYPE="text/css" MEDIA=screen> 
    <style>
        .flotant-left
        {
            position:fixed; top:9%; left:9%;  z-index:150;
        }
        .flotant-right
        {
            position:fixed; top:11%; right:2%;  z-index:150; height: 100%;
        }
    </style>
</head>
<body>

  <!-- header -->
  <div  class="row" style="height: 52px;">
     #HEADER#
  </div>
  <!-- end: header -->
  <!-- columna izquierda -->
  <div class="row">
    <div class="col-lg-1 col-mg-1 col-sg-1">        
    </div>
  <div class="col-lg-2 col-mg-2 col-sg-2">
      <div class="flotant-left">
    #MENULEFT#
    </div>
  </div>
  <!-- end: columna izquierda -->
  <!-- contenido -->
  <div  class="col-lg-6 col-mg-6 col-sg-6">
    #CONTENIDO#
  </div>
  <div  class="col-lg-3 col-mg-3 col-sg-3">
    <div class="flotant-right">
        #RIGHTBAR#
    </div> 
  </div>
  <!-- end: contenido -->
</div>
  <div class="row">
      <div class="col-lg-12 col-mg-12 col-sg-12">
          <div style="background-color: black;height: 200px;">
              <font color="white">
              <div class="col-lg-4 col-mg-4 col-sg-4" style="margin-top: 30px;">
                  <h3>Acerca de...</h3>
                  <small><p>Tweetbook+ es una red social diferente a las demas, a nosotros nos interesa tu privacidad,
                  a diferencia de otras redes sociales, nosotros nunca usaremos tu información personal, ni tus fotos,
                  para publicidad, ni venderla a terceros.</p></small>
              </div>
             <div class="col-lg-1 col-mg-1 col-sg-1" style="margin-top: 30px;"></div>
              <div class="col-lg-4 col-mg-4 col-sg-4" style="margin-top: 30px;">
                  
                  <h3>Contactos</h3>
                  <small>
                  <ul style="padding-left: 0px;">
                      <li style="list-style: none;"><p><i class="icon-map-marker icon-white"></i> <strong>Dirección:</strong> C. Luis Zegarra, Cochabamba, Bolivia</p></li>
                      <li style="list-style: none;"><p><i class="icon-ok-sign icon-white"></i> <strong>Telefono:</strong> (591) 7222-0817</p></li>
                      <li style="list-style: none;"><p><i class="icon-envelope icon-white"></i> <strong>Email:</strong> <a href="mailto:tweetbook.plus.dropbox@gmail.com">tweetbook.plus.dropbox@gmail.com</a></p></li>
                  </ul>
                  </small>
              </div>
              <div class="col-lg-3 col-mg-3 col-sg-3" style="margin-top: 30px;">
                  <h3>Creditos</h3>
                  <small>
                      <img src="app/views/default/images/Logo_t.png" width="60"/>
                      <p>Tweetbook+ &copy; , es una marca registrada, el logo y el nombre, son propietarios,
                     La licencia del codigo es de tipo Apache License v2.0.
                     Basado en Bootstrap. Iconos de la fuente Awesome.</p>
                  </small>
              </div>
             </font>
          </div>
      </div>
  </div>
</body>
</html>