<?php
include ("app/controller/mvc.security.php");
?>
<LINK REL=StyleSheet HREF="app/views/default/css/focusPost.css" TYPE="text/css" MEDIA=screen>
<div class="row" style="margin-top: 20px;">
    <div class="col-lg-8">
        <div class="panel panel-primary " style="border-color: #121212;" >
            <div class="panel-heading" style="background-color: #121212; border-color: #121212;">Estado...</div>
            <div class="panel-body">
                <form method="post" action="index.php">
                    <div class="form-group" >
                        <textarea name ="content" class="form-control post" style="height:43px;" onfocus="this.style.height='130px';" onblur="this.style.height='43px';" id="textArea" placeholder="Contenido..." required maxlength="250"></textarea>                    
                  </div>                         
                  <button type="submit" class="btn btn-primary pull-right" onfocus="this.click();">Publicar</button>
                </form>
             </div>
    </div>
    </div>
  </div>

<?php
foreach ($status as $post) {
    $usuario=User::find_by_id($post->from_user_id);
       $email = $usuario->email;                            
        $size = 50;
        $grav_url = "http://www.gravatar.com/avatar/".md5(strtolower( trim( $email ) ) ) . "?d=monsterid&s=" . $size;        
    ?>
<div class="row">
    <div class=" col-lg-8">
        <div class="panel panel-default" style="margin: 1px;">
        <div class="panel-heading"><img src="<?php echo $grav_url; ?>"/>&nbsp;&nbsp;&nbsp;<?php echo "<label style='font-size:20px;'>".$usuario->username."</label>"?></div>
        <div class="panel-body">                        
            <div class="row">
            <span style="margin-left: 15px; font-size: 19px;"><?php echo $post->content; ?></span>
            </div>
            <div class="row">
                <small style="margin-left: 15px; font-size: 10px; color: grey;"><?php echo $post->created_at->setTimezone(new DateTimezone('BOT'))->format("d-m-Y H:i:s"); ?></small>
            </div>
        </div>        
      </div>
        <div class="panel panel-default">
              <div class="panel-body"style="margin: 0px;">
                   <form method="post" action="index.php">
                        <div class="form-group" >
                            <textarea name ="contentcomment" class="form-control post" onfocus="this.style.height='130px';" onblur="this.style.height='43px';" rows="4" id="textArea" placeholder="Escribe un comentario..." required maxlength="250" style="resize: none; height:43px;"></textarea>                    
                            <input type="hidden" name="postid" value="<?php echo $post->id ?>">
                      </div>                         
                      <button type="submit" class="btn btn-default pull-right">Comentar</button>
                    </form>
              </div>
            </div>
    </div>
</div>
<?php
}
?>