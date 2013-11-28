<?php 
require('app/model/photo.php');
    if( isset($_POST["accept"]))
    {
        $attributes = array('album_id'=>1,'file_name'=>($_FILES["arch"]["name"]),'file_tmp_name'=>($_FILES["arch"]["tmp_name"]),
            'file_type'=>$_FILES["arch"]["type"],'file_size'=>$_FILES["arch"]["size"]);
        $photo = new Photo($attributes);
        $photo->save();
        if($_FILES["arch"]["name"])
        {
            echo("<h4>Fotografia</h4>");
            $filepath = $photo->url();
            echo("<img height=400 src='$filepath'  />");
        }
    }
?>
<html>
    <body>
        <form action="testupload.php" method="post" enctype="multipart/form-data" >
            <input type="file" name="arch" />
            <input type="submit" name="accept" value="Guardar" />
        </form>
    </body>
</html>