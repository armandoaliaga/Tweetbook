<?php
    
   class photo_controller extends generic_controller
    {       
       function user_photos()
        { 
            ob_start();         
            $pagina=$this->load_template();        
            include 'app/views/default/modules/m.photos.php';
            $table = ob_get_clean();          
            $pagina = $this->replace_content('/\#CONTENIDO\#/ms', $table , $pagina);           
            $this->view_page($pagina);
        }
    }
?>