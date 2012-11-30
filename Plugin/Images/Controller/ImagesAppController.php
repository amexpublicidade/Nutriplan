<?PHP
App::import("Vendor","Images.valums");
App::import("Vendor","Images.canvas");
App::import("Vendor","Images.Uploader");

class ImagesAppController extends AppController{    

    public $uses=array("Images.Image");
    
    public function beforeFilter() {
        parent::beforeFilter();
        if(!file_exists('img/galleries')) mkdir('img/galleries',0777,true);
    }
}