<?php
include ("app/controller/mvc.security.php");
?>
<LINK REL=StyleSheet HREF="app/views/default/css/deletePhotoEffects.css" TYPE="text/css" MEDIA=screen>
<script type="text/javascript" src="app/views/default/js/deletePhotoEffects.js"></script>
<script type="text/javascript" src="app/views/default/js/jquery.fancybox.js?v=2.1.4"></script>
<link rel="stylesheet" type="text/css" href="app/views/default/css/jquery.fancybox.css?v=2.1.4" media="screen" />

<div class="row">
<div class="page-header col-lg-11">
    <h1 id="type"><?php echo $user->name." ".$user->last_name ?></h1>
  </div>
</div>

<div class="row">
<div class="bs-example col-lg-11">
    <ul class="nav nav-tabs" style="margin-bottom: 15px;">
        <li> <a href="index.php?action=userprofile&tab=wall&user=<?php echo $user->username; ?>">Muro</a></li>
        <li><a href="index.php?action=userprofile&tab=info&user=<?php echo $user->username; ?>" >Informacion</a></li>
        <li class="active"><a href="index.php?action=userprofile&tab=photo&user=<?php echo $user->username; ?>" >Fotos</a></li>  
    </ul>   
</div>
</div>

<div class="row">
    <div class="col-lg-3 col-md-3 col-sm-3">
        <H2><img width="48" src="app/views/default/images/photos.png" />&nbsp;Fotos</H2>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-3">
        
    </div>
    <div class="col-lg-3 col-md-3 col-sm-3" style="margin-left:-42px;">
        <?php if( $user->id==$_SESSION["current_user"]->id) {?>
        <ul class="pager">
            <li><a data-toggle="modal" data-target="#uploadAlbum" href="#" >+Agregar fotos</a></li>
        </ul>
        <?php } ?>
        
    </div>
</div>
<div class="row">
    <div class="col-lg-11 col-md-11 col-sm-11">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <h3 style="margin-top:0px; margin-bottom:5px; margin-left: 35%;"><?php echo $album->name ?></h3>
                    <small style="margin-top:0px; margin-left: 35%;color:gray;"><?php echo $album->created_at->setTimezone(new DateTimezone('BOT'))->format("d - M - Y"); ?></small>
                </div>
                <div class="row">
                <?php
                $cols=1;
                $num_id=0;
                    foreach ($album->photos as $photo)
                    {
                        if($cols==1)
                        {
                            echo "<div class='row'>";
                        }
                            echo "<div class='col-lg-4 col-md-4 col-sm-4'>";
                            echo "<form method='post' name='delete".$photo->id."' action='index.php'>";
                                echo "<input type='hidden' name='photo_id' value='".$photo->id."'/>";
                                echo "<input type='hidden' name='album_id' value='".$album->id."'/>";
                                echo "<input type='hidden' name='postinfo' value='deletephoto'/>";
                            echo "</form>";
                            $url=$photo->url();
                                echo "<div style='height:162px; width:162px;border-style:solid;border-width:1px;border-color:#DDDDDD;".($cols==1?"margin-left:20px;":"")." margin:10px;' >";
                                    echo "<a class='fancybox' data-fancybox-group='gallery' href='$url'><img class='image-container' onmouseover='showDelete($num_id)' onmouseout='hideDelete($num_id)' style='width: 160px;height: 160px;overflow: hidden;' src='".$url."' /></a>";
                                    echo"<img id='$num_id' class='star-button' onclick='deleteImage(".$photo->id.")'  onmouseover='showDelete($num_id)' title='Eliminar foto'  src='app/views/default/images/delete.png' />";
                                echo "</div>";
                            echo "</div>";
                        if($cols==3)
                        {
                            $cols=0;
                            echo "</div>";
                        }
                        $cols=$cols+1;
                        $num_id=$num_id+1;
                    }
                    if($cols<4 && $cols!=1)
                    {
                        echo "</div>";
                    }
                ?>                      
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" style="margin-top:10%;" id="uploadAlbum" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Agregar fotos</h4>
      </div>
        <div class="modal-body">
            <form method="post" action="index.php" class="bs-example form-horizontal" enctype="multipart/form-data">
                <input type="hidden" name="postinfo" value="uploadphotos" />
                 <input type="hidden" name="album_id" value="<?php echo $album->id ?>" />
                <div>
                    <fieldset>
                    <div class="form-group">
                    <label for="inputDate" class="col-lg-3 control-label">Subir fotos:</label>
	            <div class="col-lg-8 input-group">
	            <input id="showFiles" class="form-control" type="text" placeholder="Seleccione fotos..." onclick="document.getElementById('photo_to_upload').click();" onfocus="this.blur();">
	            <input type="file" style="display:none;" id="photo_to_upload" name="photo_to_upload[]" accept="image/*" multiple onchange="document.getElementById('showFiles').value = (this.files.length>1)?''+this.files.length+' Archivos seleccionados.':this.files[0].name;" />
	            <span class="input-group-addon" style=" background-color: #007FFF; cursor:pointer;" onclick="document.getElementById('photo_to_upload').click();">
	              <i class="icon-file icon-white"></i>
	            </span>
	            </div>
	          </div>
                    </fieldset>
                    <div style="height:150px; overflow-y: scroll;">
                        <!--TODO MOSTRAR AL SELECCIONAR IMAGEN
                        -->
                    </div>
                </div>
      <div class="modal-footer" style="padding: 15px;">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Agregar</button>
    </form>

      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</div>
<script type="text/javascript">
$(document).ready(function() {
    $('.fancybox').fancybox();
    });
</script>