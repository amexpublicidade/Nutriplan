<?PHP
class GalleriesController extends PainelAppController{
    
    public function admin_index(){
        $this->layout="Painel.admin";
    }
    
    public function admin_manager(){
        $this->layout="Painel.gallery";
    }
    
}