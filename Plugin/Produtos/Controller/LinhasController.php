<?PHP
class LinhasController extends ProdutosAppController {
 
    public function admin_index(){
        $this->layout="Painel.admin";
        $this->Session->write("Painel.page", $this->here);
        $this->set('linhas',$this->paginate("Linha"));
    }
    
    public function admin_add(){
        $this->layout="Painel.admin";
        $this->view="admin_editor";
        $this->set('title','Cadastrar Linha');
        if($this->data && $this->Linha->save($this->data)) $this->redirect($this->Session->read("Painel.page"));
    }
    
    public function admin_edit($id){
        $this->layout="Painel.admin";
        $this->view="admin_editor";
        $this->set('title','Editar Linha');
        $this->data=$this->Linha->read('*',$id);
    }
    
    public function admin_delete($id){
        $this->autoRender=false;
        if($this->Linha->delete($id)) $this->redirect($this->Session->read("Painel.page"));
    }
    
}