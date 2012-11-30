<?PHP
class ProdutosController extends ProdutosAppController {
    
    public function admin_index(){
        $this->layout="Painel.admin";
        $this->set('produtos',$this->paginate('Produto'));
    }
    
    public function admin_add(){
        $this->layout="Painel.admin";
        $this->view="admin_editor";
        $this->set('title','Cadastrar Produto');
        if($this->data && $this->Produto->save($this->data)) $this->redirect(array("action"=>"index"));
    }
    
    public function admin_edit($id){
        $this->layout="Painel.admin";
        $this->view="admin_editor";
        $this->set('title','Editando Produto');
        $this->data=$this->Produto->read('*',$id);
    }    
    
}