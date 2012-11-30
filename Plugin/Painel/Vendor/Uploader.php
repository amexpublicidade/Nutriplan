<?PHP
include_once 'canvas.php';
class Uploader{
    
    public static function move($temp,$destination,$options=array()){
        
        if(!isset($options['width'])) $options['width']=1000;
        if(!isset($options['height'])) $options['height']=3000;
        if(!isset($options['type'])) $options['type']='proporcional';
        
        $move=@move_uploaded_file($temp, $destination);
        list($width,$height)=  getimagesize($destination);
        
        if($width>$options['width'] || $height>$options['height']){
            $canvas=new canvas($destination);
            $canvas->redimensiona($options['width'],$options['height'],$options['type']);
            $canvas->grava($destination);
        }
        
        return $move;
    }
    
    public static function resize($destination,$options=array()){
        if(!isset($options['width'])) $options['width']=1000;
        if(!isset($options['height'])) $options['height']=3000;
        if(!isset($options['type'])) $options['type']='proporcional';
        list($width,$height)=  getimagesize($destination);        
        if($width>$options['width'] || $height>$options['height']){
            $canvas=new canvas($destination);
            $canvas->redimensiona($options['width'],$options['height'],$options['type']);
            $canvas->grava($destination);
        }
    }
}