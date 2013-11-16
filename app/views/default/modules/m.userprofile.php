<?php
include ("app/controller/mvc.security.php");
?>
<div class="row" >
    <h1>Aca deben venir los post del usuario</h1>
    <?php echo $_SESSION["current_user"]->email; ?>
</div>