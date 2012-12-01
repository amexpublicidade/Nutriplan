<?PHP
class CategoriasController extends ProdutosAppController {
    
    public function admin_index(){
        $this->layout="Painel.admin";
        $this->set('categorias',$this->paginate('Categoria'));
    }
    
    public function admin_add(){
        $this->layout="Painel.admin";
        $this->view="admin_editor";
        $this->set('title','Cadastrar Categoria');
        if($this->data && $this->Categoria->save($this->data)) $this->redirect(array('action'=>'index'));
    }
    
    public function admin_edit($id){
        $this->layout="Painel.admin";
        $this->view="admin_editor";
        $this->set('title','Editar Categoria');
        $this->data=$this->Categoria->read('*',$id);
    }
    
    public function admin_delete($id){
        $this->autoRender=false;
        if(isset($id) && $this->Categoria->delete($id)) $this->redirect(array('action'=>'index'));
    }
    
}