<?PHP

class ImageHelper extends AppHelper {

    public $helpers = array("Html");
    public $path;

    public function crop($url, $width = 200, $height = 200, $options = array()) {
        $url = (substr($url, 0, 1) == "/") ? substr($url, 1) : $url;
        $options['plugin']=false;
        return $this->Html->image("/images/image/crop/{$width}x{$height}/$url", $options);
    }
    
    public function fill($url, $width = 200, $height = 200, $fill = "FFFFFF", $options = array()) {
        $url = (substr($url, 0, 1) == "/") ? substr($url, 1) : $url;
        $options['plugin']=false;
        return $this->Html->image("/images/image/fill/{$width}x{$height}/$fill/$url", $options);
    }
    
    public function resize($url,$side='horizontal',$size=200,$options=array()){
        $url = (substr($url, 0, 1) == "/") ? substr($url, 1) : $url;
        $options['plugin']=false;
        return $this->Html->image("/images/image/resize/$side/$size/$url",$options);
    }
    
    public function url($url,$options=array()){
        $url = (substr($url, 0, 1) == "/") ? substr($url, 1) : $url;
        if(!empty($options)){
            switch($options['method']){
                case 'crop':
                    return "$this->base/images/image/crop/{$options['width']}x{$options['height']}/$url";
                    break;
                case 'fill':
                    return "$this->base/images/image/fill/{$options['width']}x{$options['height']}/{$options['fill']}/$url";
                    break;
                case 'resize':
                    return "$this->base/images/image/resize/{$options['side']}/{$options['size']}/$url";
                    break;
            }
        }
    }
}