<?PHP
class UsuariosController extends PainelAppController{
    
    public function admin_index(){
        $this->layout="Painel.admin";
        $this->paginate['order']="User.created DESC";
        $users=$this->paginate('User');
        $this->set(compact('users'));
    }
    
    public function admin_add(){
        $this->layout="Painel.admin";
        $this->view="admin_editor";
        $this->set('title','Cadastrar usuário');
        if($this->data && ($this->request->is('post') || $this->request->is('put'))){
            if($this->User->save($this->data)){
                $this->redirect(array('action'=>'index'));
            }
        }
    }
    
    public function admin_edit($id){
        $this->layout="Painel.admin";
        $this->view="admin_editor";
        $this->set('title','Editando usuário');
        $this->data=$this->User->read('*',$id);
    }
    
    public function admin_delete($id){
        $this->autoRender=false;
        if($this->User->delete($id)) $this->redirect(array('action'=>'index'));
    }
    
    public function login(){
        $this->layout="Painel.blank";
        if($this->data && $this->request->is('post')){
            if($this->Locker->login()){
                $this->redirect($this->Locker->user('Group.login_redirect'));
            } else {
                $this->set('message','Usuário e/ou senha inválido(s)');
            }
        }
    }
    
    public function logout(){
        $this->autoRender=false;
        $logout_redirect=$this->Locker->user('Group.logout_redirect');
        if($this->Locker->logout()) $this->redirect($logout_redirect);
    }
    
    public function notallowed(){
        //To be continued
        echo 'Não tem permissão para acessar esta área';
        exit;
    }
    
    public function password(){
        //To be started
    }
}