<?php
include ("app/controller/mvc.security.php");
?>
<LINK REL=StyleSheet HREF="app/views/default/css/focusPost.css" TYPE="text/css" MEDIA=screen>
<div class="row" style="margin-top: 20px;">
    <div class="col-lg-9">
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
    <div class=" col-lg-9">        
        <div class="panel panel-default" style="margin: -1px; margin-top: 30px;">
            <div class="panel-heading" style="background-color: #d1d1d1;">
                <img src="<?php echo $grav_url; ?>"/>&nbsp;&nbsp;&nbsp;<?php echo "<label style='font-size:20px;'>".$usuario->username."</label>"?><?php if($post->from_user_id == $_SESSION["current_user"]->id){?><a title="Eliminar" onclick="return confirm('Esta seguro de elminar este estado?!....')" href="index.php?action=deletepost&postid=<?php echo $post->id?>" style="margin-left: 470px;"><img width="25px" src="app/views/default/images/delete.png"></a> <?php }?>
            </div>            
        <div class="panel-body">                        
            <div class="row">
            <span style="margin-left: 15px; font-size: 19px;"><?php echo $post->content; ?></span>
            </div>
            <div class="row">
                <small style="margin-left: 15px; font-size: 10px; color: grey;"><?php echo $post->created_at->setTimezone(new DateTimezone('BOT'))->format("d-m-Y H:i:s"); ?></small>
            </div>
        </div>        
      </div>   
            <div class="panel panel-default" style="margin: -1px;">
              <div class="panel-body"style="margin: -1px;">
                  <div class="row">
                   <form method="post" action="index.php">
                        <div class="form-group col-lg-9" >
                            <textarea name ="contentcomment" class="form-control post" onfocus="this.style.height='130px';" onblur="this.style.height='43px';" rows="4" id="textArea" placeholder="Escribe un comentario..." required maxlength="250" style="resize: none; height:43px;"></textarea>                    
                            <input type="hidden" name="postid" value="<?php echo $post->id ?>">
                      </div>
                       <div class="col-lg-3" >
                      <button type="submit" class="btn btn-default pull-right">Comentar</button>
                       </div>
                    </form>
                      </div>
              </div>
            </div>  
        <?php

    foreach ($post->comments as $comment) {?>        
        <div class="panel panel-default"  style="margin-bottom: -1px;">
              <div class="panel-body" >
                  <div class="row">                   
                        <div class="form-group col-lg-1">
                            
                            <?php
                            $email = $comment->user->email;                            
                            $size = 40;
                            $grav_url = "http://www.gravatar.com/avatar/".md5(strtolower( trim( $email ) ) ) . "?d=monsterid&s=" . $size;  
                            ;?>
                            <img src="<?php echo $grav_url?>">
                       </div>
                        <div class="form-group col-lg-10" >
                            <?php echo $comment->content;?>
                       </div>                                           
                      </div>
                  <div class="row">
                      <div class="col-lg-10">
                    <small style="margin-left: 15px; font-size: 10px; color: grey;"><?php echo $comment->created_at->setTimezone(new DateTimezone('BOT'))->format("d-m-Y H:i:s"); ?></small>
                    </div>
                    <div class="col-lg-2">
                        <?php if($comment->user_id == $_SESSION["current_user"]->id){?>
                        <small><a onclick="return confirm('Esta seguro de elminar este comentario?!....')" href="index.php?action=deletecomment&commentid=<?php echo $comment->id; ?>">Eliminar</a></small>
                    <?php }?>
                        </div>
            </div>
              </div>
            </div>     
        <?php } ?>    
    </div>
</div>
  <?php
}
?>