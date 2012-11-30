<?PHP
class PrefixosController extends PainelAppController{
    
    public $paginate=array('limit'=>10,'order'=>'Prefix.id DESC');
    
    public function beforeFilter() {
        parent::beforeFilter();
        $grupos=$this->Group->find('list',array('fields'=>array('id','name')));
        $this->set(compact('grupos'));
    }
    
    public function admin_index(){
        $this->layout="Painel.admin";
        $prefixos=$this->paginate('Prefix');
        $this->set(compact('prefixos'));
    }
    
    public function admin_add(){
        $this->layout="Painel.admin";
        $this->view="admin_editor";
        $this->set('title','Adicionar prefixo');
        if($this->data && ($this->request->is('post') || $this->request->is('put'))){
            if($this->Prefix->save($this->data)){
                $this->redirect(array('action'=>'index'));
            }
        }
    }
    
    public function admin_edit($id){
        $this->set('title','Editar prefixo');
        $this->layout="Painel.admin";
        $this->view="admin_editor";
        $this->data=$this->Prefix->read('*',$id);
    }
    
    public function admin_delete($id){
        $this->autoRender=false;
    }
}