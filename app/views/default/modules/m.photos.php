<?php
include ("app/controller/mvc.security.php");
?>
<LINK REL=StyleSheet HREF="app/views/default/css/focusPost.css" TYPE="text/css" MEDIA=screen>
<div class="row">
<div class="page-header col-lg-9">
    <h1 id="type"><?php echo $user->name." ".$user->last_name ?></h1>
  </div>
</div>

<div class="row">
<div class="bs-example col-lg-9">
    <ul class="nav nav-tabs" style="margin-bottom: 15px;">
       <li><a href="index.php?action=userprofile&tab=wall&user=<?php echo $user->username; ?>">Muro</a></li>
        <li><a href="index.php?action=userprofile&tab=info&user=<?php echo $user->username; ?>" >Informacion</a></li>
        <li class="active" ><a href="index.php?action=userprofile&tab=photo&user=<?php echo $user->username; ?>" >Fotos</a></li>
    </ul>   
</div>
</div>

<div class="row">
    <div class="col-lg-3 col-md-3 col-sm-3">
        <H2><img width="48" src="app/views/default/images/photos.png" />&nbsp;Fotos</H2>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-3">
        
    </div>
    <div class="col-lg-3 col-md-3 col-sm-3" style="margin-left:-38px;">
        <ul class="pager">
            <li><a data-toggle="modal" data-target="#uploadAlbum" href="#" >+Crear álbum</a></li>
        </ul>
    </div>
</div>
<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="panel panel-default">
            <div class="panel-body">
                <?php
                $cols=1;
                    foreach ($albums as $album)
                    {
                        if($cols==1)
                        {
                            echo "<div class='row'>";
                        }
                            echo "<div class='col-lg-4 col-md-4 col-sm-4'>";
                                echo "<div class='panel panel-default' style='height:190px; width:160px;'>";
                                    echo "<div class='panel-body'>";
                                        echo "<div style='height:127px; width:127px;border-style:solid;border-width:1px;border-color:#DDDDDD;'>";
                                        if(isset($album->photos[0]))
                                        {
                                            echo "<a href='index.php?action=userprofile&user=".$user->username."&tab=photo&album=".$album->id."'><img style='width: 125px;height: 125px;overflow: hidden;'' src='".$album->photos[0]->url()."' /></a>";
                                        }
                                        else
                                        {
                                            echo "<a style='margin-top:25px;margin-left:25px;' href='index.php?action=userprofile&user=".$user->username."&tab=photo&album=".$album->id."'>+ Agregar fotos</a>";
                                        }
                                        echo "</div>";
                                        echo "<a href='index.php?action=userprofile&user=".$user->username."&tab=photo&album=".$album->id."'>".$album->name."</a><br>";
                                        echo "<small style='color:gray;'>".sizeof($album->photos)." foto(s)</small>";
                                    echo "</div>";
                                echo "</div>";
                            echo "</div>";
                        if($cols==3)
                        {
                            $cols=0;
                            echo "</div>";
                        }
                        $cols=$cols+1;
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
<!-- Modal -->
<div class="modal fade" style="margin-top:10%;" id="uploadAlbum" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Crear álbum</h4>
      </div>
        <div class="modal-body">
            <form method="post" action="index.php" class="bs-example form-horizontal">
                <input type="hidden" name="postinfo" value="createalbum" />
                <div>
                <fieldset>
                    <div class="form-group">
                        <label for="inputName" class="col-lg-4 control-label">Nombre del álbum:</label>
                        <div class="col-lg-7">
                            <input type="text" required class="form-control" id="name" name="name" placeholder="Nombre del álbum">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputName" class="col-lg-4 control-label">Descripción:</label>
                        <div class="col-lg-7">
                            <input type="text" class="form-control" id="description" name="description" placeholder="Descripción del álbum">
                        </div>
                    </div>
                </fieldset>
        </div>
      <div class="modal-footer" style="padding: 15px;">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>

      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</div>