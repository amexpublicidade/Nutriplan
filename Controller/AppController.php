<?PHP
App::uses('Controller', 'Controller');
class AppController extends Controller {
    
     public $components=array('Painel.Locker');
     
     public function beforeFilter(){
         parent::beforeFilter();
     }
    
}
