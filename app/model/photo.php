<?php
require_once "dropbox-sdk/Dropbox/autoload.php";
use \Dropbox as dbx;
class Photo extends ActiveRecord\Model
{	
    var $accessToken="t0JvOEmmRCIAAAAAAAAAAYKTL02DCV4IdPJbxcPcPdoea7zhKU_bf8dqu0Wws6uQ";
    static $belongs_to = array(array('album'));
    
    public function save($validate=true)
    {    
        $extension_pos = strripos($this->file_name, '.');
        $extension = substr($this->file_name,$extension_pos);
        $new_file_name = substr($this->file_name,0,$extension_pos);
        $this->file_name = sha1($new_file_name.date("YmdHms")).$extension;
        $success=parent::save($validate);
        $this->upload_file();
        return $success;
    }
    
    public function delete()
    {
        $this->delete_file();
        $success=parent::delete();
        return $success;
    }
    
    function url()
    {
        $dbxClient = new dbx\Client($this->accessToken, "Tweetbook");
        $fileMetadata = $dbxClient->createTemporaryDirectLink("/albums/".$this->album_id."/".$this->file_name);
        $url = $fileMetadata[0];
        return $url;
    }
    private function upload_file()
    {
        $dbxClient = new dbx\Client($this->accessToken, "Tweetbook");
        $f = fopen($this->file_tmp_name, "rb");
        $result = $dbxClient->uploadFile("/albums/".$this->album_id."/".$this->file_name, dbx\WriteMode::add(), $f);
        fclose($f);
    }
    private function delete_file()
    {
        $dbxClient = new dbx\Client($this->accessToken, "Tweetbook");
        $dbxClient->delete("/albums/".$this->album_id."/".$this->file_name);
    }
}
?>
