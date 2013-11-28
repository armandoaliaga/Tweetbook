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
        
        function user_photos_of_album($album_id)
        { 
            ob_start();         
            $pagina=$this->load_template();
            $album=Album::find($album_id);
            include 'app/views/default/modules/m.photos_of_album.php';
            $table = ob_get_clean();          
            $pagina = $this->replace_content('/\#CONTENIDO\#/ms', $table , $pagina);           
            $this->view_page($pagina);
        }
        
         function upload_photos_to_album($album_id,$attributes)
        {
            session_start();//photo_to_upload
            for ($i = 0; $i < count($attributes["photo_to_upload"]["name"][0]); $i++) {
                $photo_attributes = array('album_id'=>$album_id,'file_name'=>($attributes["photo_to_upload"]["name"][$i]),'file_tmp_name'=>($attributes["photo_to_upload"]["tmp_name"][$i]),
                'file_type'=>$attributes["photo_to_upload"]["type"][$i],'file_size'=>$attributes["photo_to_upload"]["size"][$i]);
                $photo = new Photo($photo_attributes);
                $photo->save();    
            }
            header("Location: index.php?action=userprofile&tab=photo&album=".$album_id);
        }
    }
?>