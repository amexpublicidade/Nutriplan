<?PHP
class GruposController extends PainelAppController{
    
    public $paginate=array('limit'=>20,'order'=>'Group.id DESC');
    
    public function beforeFilter() {
        parent::beforeFilter();
        $prefixes=$this->Prefix->find('list',array('fields'=>array('id','prefix')));
        $sec=$this->Sector->find('all');
        $setores=array();
        foreach($sec as $s){
            $setores[$s['Sector']['id']]=Router::url(array(
                'plugin'=>  strtolower($s['Sector']['plugin']),
                'controller'=>  strtolower($s['Sector']['controller']),
                'action'=>strtolower($s['Sector']['action']),
            ));
        }
        $this->set(compact('prefixes','setores'));
    }

    public function admin_index(){
        $this->layout="Painel.admin";
        $grupos=$this->paginate('Group');
        $this->set(compact('grupos'));
    }
    
    public function admin_add(){
        $this->layout="Painel.admin";
        $this->view="admin_editor";
        $this->set('title','Adicionar grupo');
        if($this->data && ($this->request->is('post') || $this->request->is('put'))){
            if($this->Group->save($this->data)) $this->redirect(array('action'=>'index'));
        }
    }
    
    public function admin_edit($id){
        $this->layout="Painel.admin";
        $this->view="admin_editor";
        $this->data=$this->Group->read('*',$id);
        $this->set('title','Editando grupo');
    }
    
    public function admin_delete($id){
        $this->autoRender=false;
        if($this->Group->delete($id)) $this->redirect (array('action'=>'index'));
    }
}