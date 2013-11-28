<?php
include ("app/controller/mvc.security.php");
?>
<LINK REL=StyleSheet HREF="app/views/default/css/focusPost.css" TYPE="text/css" MEDIA=screen>
<div class="row">
<div class="page-header col-lg-8">
    <h1 id="type"><?php echo $_SESSION["current_user"]->name." ".$_SESSION["current_user"]->last_name ?></h1>
  </div>
</div>

<div class="row">
<div class="bs-example col-lg-8">
    <ul class="nav nav-tabs" style="margin-bottom: 15px;">
        <li ><a href="index.php?action=userprofile&tab=wall" >Muro</a></li>
        <li class="active"><a href="index.php?action=userprofile&tab=info">Informacion</a></li>
        <li><a href="index.php?action=userprofile&tab=photo" >Fotos</a></li>
        
    </ul>   
</div>
</div>

<H1>PINCHE INFO</H1>