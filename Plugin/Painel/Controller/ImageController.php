<?PHP
App::import("Vendor","Painel.valums");
App::import("Vendor","Painel.canvas");
App::import("Vendor","Painel.Uploader");
class ImageController extends PainelAppController {
    
    public $Canvas;
    
    public function __construct($request = null, $response = null) {
        parent::__construct($request, $response);
        $this->Canvas=new canvas();
    }
    
    public function beforeFilter() {
        parent::beforeFilter();
        $this->autoRender=false;
    }
    
    public function crop(){
        $arguments=  func_get_args();
        $size=explode('x',array_shift($arguments));
        $path=  implode('/',$arguments);
        $this->Canvas->carrega($path);
        $this->Canvas->redimensiona($size[0],$size[1],'crop');
        
        if(file_exists('images')){
            $fullpath='images'.DS.'image'.DS.'crop'.DS.implode(DS,func_get_args());
            if(!file_exists(dirname($fullpath))) mkdir(dirname($fullpath), 0777, true);
            $this->Canvas->grava($fullpath);
        }
        
        $this->Canvas->grava();
    }
    
    public function fill(){
        $arguments=  func_get_args();
        $size=explode('x',array_shift($arguments));
        $fill=array_shift($arguments);
        $path=  implode('/',$arguments);
        $this->Canvas->carrega($path);
        $this->Canvas->hexa("#$fill");
        $this->Canvas->redimensiona($size[0],$size[1],'preenchimento');

        if(file_exists('images')){
            $fullpath='images'.DS.'image'.DS.'fill'.DS.implode(DS,func_get_args());
            if(!file_exists(dirname($fullpath))) mkdir(dirname($fullpath), 0777, true);
            $this->Canvas->grava($fullpath);
        }
        
        $this->Canvas->grava();
    }
    
    public function resize(){
        $arguments=  func_get_args();
        $type=array_shift($arguments);
        $size=array_shift($arguments);
        $path=  implode('/',$arguments);       
        $this->Canvas->carrega($path);
        $width=($type=='horizontal')?$size:0;
        $height=($type=='vertical')?$size:0;
        $this->Canvas->redimensiona($width, $height);
        
         if(file_exists('images')){
            $fullpath='images'.DS.'image'.DS.'fill'.DS.implode(DS,func_get_args());
            if(!file_exists(dirname($fullpath))) mkdir(dirname($fullpath), 0777, true);
            $this->Canvas->grava($fullpath);
        }
        
        $this->Canvas->grava();
    }    
    
}
