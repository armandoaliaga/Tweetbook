<?php
   require('app/model/album.php'); 
   require('app/model/photo.php'); 
   class photo_controller extends generic_controller
    {       
       function user_photos()
        { 
            ob_start();         
            $pagina=$this->load_template();
            $albums=Album::find("all", array('order' => 'created_at desc','conditions' => array('user_id = ?', $_SESSION["current_user"]->id)));
            include 'app/views/default/modules/m.photos.php';
            $table = ob_get_clean();          
            $pagina = $this->replace_content('/\#CONTENIDO\#/ms', $table , $pagina);           
            $this->view_page($pagina);
        }
        
        function create_album($attributes)
        {
            session_start();
            $attributes["user_id"] = $_SESSION["current_user"]->id;
            unset($attributes["postinfo"]);
            $album = new Album($attributes);
            $album->save();
            header("Location: index.php?action=userprofile&tab=photo");
        }
    }
?>