 <?php         
    if(isset($_SESSION["autentificado"]) && $_SESSION["autentificado"] == "SI"){?>
<div class="bs-example" style="margin-top: 20px;">
              <ul class="nav nav-pills nav-stacked" style="max-width: 300px;">
                <li class="active"><a href="index.php">Home</a></li>
                <li><a href="index.php?action=history">Profile</a></li>                
              </ul>
</div>
 <?php }?>