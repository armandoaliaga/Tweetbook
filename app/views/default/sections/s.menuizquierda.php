 <?php    
 if(!isset($_SESSION))
 {
     session_start();
 }
    if(isset($_SESSION["autentificado"]) && $_SESSION["autentificado"] == "SI"){              
        $email = $_SESSION["current_user"]->email;                            
        $size = 200;
        $grav_url = "http://www.gravatar.com/avatar/".md5(strtolower( trim( $email ) ) ) . "?d=monsterid&s=" . $size;        
        ?>

<a href="https://es.gravatar.com" target="_blank" id="changephoto" data-toggle="tooltip" data-placement="left" title="" data-original-title="Cambiar imagen"><img src="<?php echo $grav_url; ?>" style="margin-top: 15px;"/></a>
    <div class="bs-example" style="margin-top: 20px;">
              <ul class="nav nav-pills nav-stacked" style="max-width: 300px;">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="#">Profile</a></li>                
              </ul>
    </div>

<script>
    $('#changephoto').tooltip();
</script>
 <?php }?>