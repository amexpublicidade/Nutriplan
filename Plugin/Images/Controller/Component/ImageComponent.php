<?PHP
class ImageComponent extends Component{
    
    public $controller;
    public $image;
    
    public function initialize(Controller $controller){
        parent::initialize($controller);
        $this->controller=$controller;
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