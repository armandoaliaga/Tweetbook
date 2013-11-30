<div> 
<?php    
 if(!isset($_SESSION))
 {
     session_start();
 }
 if(!isset($_GET['user']))
 {
    if(isset($_SESSION["autentificado"]) && $_SESSION["autentificado"] == "SI"){              
           $email = $_SESSION["current_user"]->email;                            
           $size = 200;
           $grav_url = "http://www.gravatar.com/avatar/".md5(strtolower( trim( $email ) ) ) . "?d=monsterid&s=" . $size;        
           ?>

   <a href="https://es.gravatar.com" target="_blank" id="changephoto" data-toggle="tooltip" data-placement="left" title="" data-original-title="Cambiar imagen"><img src="<?php echo $grav_url; ?>" style="margin-top: 15px;"/></a>
   <div class="row">
       <label style="margin-left: 15px;"><?php echo $_SESSION["current_user"]->name." ".$_SESSION["current_user"]->last_name;  ?></label>
   </div>
       <div class="bs-example" style="margin-top: 20px;">
                 <ul class="nav nav-pills nav-stacked" style="max-width: 300px;">
                   <li id="home-option"><a href="index.php?action=principal">Home</a></li>
                   <li id="profile-option"><a href="index.php?action=userprofile&tab=wall&user=<?php echo $_SESSION["current_user"]->username; ?>">Profile</a></li>                
                 </ul>
       </div>


 <?php }}else{                     
           $email = User::find_by_username($_GET['user'])->email;                            
           $size = 200;
           $grav_url = "http://www.gravatar.com/avatar/".md5(strtolower( trim( $email ) ) ) . "?d=monsterid&s=" . $size;        
           ?>

   <a href="https://es.gravatar.com" target="_blank" id="changephoto" data-toggle="tooltip" data-placement="left" title="" data-original-title="Cambiar imagen"><img src="<?php echo $grav_url; ?>" style="margin-top: 15px;"/></a>
       <div class="bs-example" style="margin-top: 20px;">
                 <ul class="nav nav-pills nav-stacked" style="max-width: 300px;">
                   <li id="home-option"><a href="index.php?action=principal">Home</a></li>
                   <li id="profile-option"><a href="index.php?action=userprofile&tab=wall">Profile</a></li>                
                 </ul>
       </div>
<?php
 }
?>
 <?php
      if(!isset($_SESSION["current_user"]))
      { ?>
<img src="app/views/default/images/Logo_med.png" style="width: 300px;margin-left: -80px;margin-top: 80px;"/>
<small style="margin-left: -60px;margin-top: 10px;">Tweetbook+ &copy; la red social que buscabas.</small>
 <?php } ?>
<script>
    $('#changephoto').tooltip();
</script>
<script>
    var currentMenu = document.URL.split("=")[1];
    if(currentMenu=="principal")
    {
        document.getElementById("home-option").className="active";
    }
    if(currentMenu.indexOf("userprofile")!=-1)
    {
        document.getElementById("profile-option").className="active";
    }
</script>
</div>