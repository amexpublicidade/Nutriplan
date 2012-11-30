<?PHP
App::import('Component', 'Auth');
App::import('Vendor','Painel.ModelHash');

class LockerComponent extends AuthComponent{

    #HEADER
    public $components=array('Session');
    public $authenticate = array('Form' => array('userModel' => 'Painel.User'));
    public $loginAction = "/admin";
    public $notallowed="/notallowed";
    
    # MODELS
    public $Lock;
    public $Sector;
    public $Group;
    public $User;
    public $Prefix;
    
    #REQUIREDS
    public $controller;
    public $here;
    
    #DATA
    public $sectors;
    public $prefixes;
    public $permissions;

    # INITIALIZE
    public function initialize(Controller $controller) {
        parent::initialize($controller);
        $this->allow('*');
        $this->controller = $controller;
        $this->here = array('plugin' => $controller->plugin, 'controller' => $controller->name, 'action' => $controller->action);
        $this->setupModels();
        //  pre(LockerComponent::user('Group'));
        if($this->loggedIn()){
            //if(isset($this->controller->params->prefix) && !empty($this->controller->params->prefix)) $this->checkLoggedInPrefix();
            $this->checkLoggedIn();
        }
        else{
            $this->checkLoggedOut();
        }
    }
    
    #START THE MODELS
    private function setupModels(){
        $this->Lock = ClassRegistry::init('Painel.Lock');
        $this->Sector = ClassRegistry::init('Painel.Sector');
        $this->Group = ClassRegistry::init('Painel.Group');
        $this->User = ClassRegistry::init('Painel.User');
        $this->Prefix = ClassRegistry::init('Painel.Prefix');
        #Model DATA
        $this->sectors=$this->Sector->find('all',array('fields'=>array('plugin','controller','action')));
        $this->prefixes=$this->Prefix->find('list',array('fields'=>array('prefix')));
    }
    
    # CHECK THE PREFIX FOR LOGGED USER
    private function checkLoggedInPrefix(){        
        $group_id=$this->user('Group.id');
        $group=$this->Group->read('*',$group_id);
        $hash=  ModelHash::getHash($this->here);
        $prefixes=array();
        foreach($group['Prefix'] as $prefix){
            $prefixes[]=$prefix['prefix'];
        }
        if(!in_array($this->controller->params->prefix, $prefixes)){
            $this->controller->redirect($this->notallowed);
        }
    }
    
    private function checkLoggedOut(){
        $hash = ModelHash::getHash($this->here);
        $prefixes = $this->prefixes;
        $prefix = $this->controller->params->prefix;        
        if(in_array($prefix, $prefixes)) $this->deny('*');
        $sectors = $this->sectors;
        $sectors = ModelHash::getHashes($sectors);
        $sector = ModelHash::getHash($this->here);
        if(in_array($sector, $sectors)) $this->deny('*');
    }
    
    private function checkLoggedIn(){
        $hash = ModelHash::getHash($this->here);
        $prefix=$this->controller->params->prefix;        
        
        $lockedSectors=$this->getLockedSections();
        $userSectors=$this->getUserSectors();
        $lockedPrefixes=$this->getLockedPrefixes();
        $userPrefixes=$this->getUserPrefixes();
        
        $this->controller->set('UsersPermissions',array(
            'locked_sectors'=>$lockedSectors,
            'locked_prefixes'=>$lockedPrefixes,
            'user_sectors'=>$userSectors,
            'user_prefixes'=>$userPrefixes,
        ));
        if(in_array($hash, $lockedSectors)){            
            if(!in_array($hash,$userSectors)){
                $this->controller->redirect($this->notallowed);
                exit;
                return false;
            } else {
                return true;
            }
        }        
        if(in_array($prefix, $lockedPrefixes)){
            if(!in_array($prefix, $userPrefixes)){
                $this->controller->redirect($this->notallowed);
                exit;
                return false;
            } else {
                return true;
            }
        }
    }
    
    private function getLockedSections(){
        $recursive=$this->Sector->recursive;
        $this->Sector->recursive=0;
        $sectors=$this->Sector->find('all');
        $output=array();
        foreach($sectors as $sector){
            $output[]=  ModelHash::getHash($sector['Sector']);
        }
        $this->Sector->recursive=$recursive;
        return $output;
    }
    
    private function getLockedPrefixes(){
        $recursive=$this->Prefix->recursive;
        $this->Prefix->recursive=0;
        $prefixes=$this->Prefix->find('all');
        $output=array();
        foreach($prefixes as $prefix){
            $output[]=$prefix['Prefix']['prefix'];
        }
        $this->Prefix->recursive=$recursive;
        return $output;
    }
    
    private function getUserSectors(){
        $user_id=$this->user('id');
        $user=$this->User->read('*',$user_id);
        $sectors=$user['Group']['Sector'];
        if(!is_array($sectors)) return false;
        $output=array();
        foreach($sectors as $sector){
            $output[]=  ModelHash::getHash($sector);
        }
        return $output;
    }
    
    private function getUserPrefixes(){
        $user_id=$this->user('id');
        $user=$this->User->read('*',$user_id);
        $prefixes=$user['Group']['Prefix'];
        if(!is_array($prefixes)) return false;
        $ouput=array();
        foreach($prefixes as $prefix){
            $output[]=$prefix['prefix'];
        }
        return $output;
    }
}