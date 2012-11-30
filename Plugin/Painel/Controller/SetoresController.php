<?PHP
class SetoresController extends PainelAppController{
    
    public $paginate=array('limit'=>20,'order'=>'Sector.id DESC');
    
    public function admin_index(){
        $this->layout="Painel.admin";
        $setores=$this->paginate('Sector');
        $this->set(compact('setores'));
    }
    
    public function admin_add(){
        $this->layout="Painel.admin";
        $this->view="admin_editor";
        $this->set('title','Adicionar setor');
        if($this->data && ($this->request->is('post') || $this->request->is('put'))){
            if($this->Sector->save($this->data)) $this->redirect(array('action'=>'index'));
        }
    }
    
    public function admin_edit($id){
        $this->set('title','Editando setor');
        $this->layout="Painel.admin";
        $this->view="admin_editor";
        $this->data=$this->Sector->read('*',$id);
    }
    
    public function admin_delete($id){
        $this->autoRender=false;
        if($this->Sector->delete($id)){
            $this->redirect(array('action'=>'index'));
        }
    }
}