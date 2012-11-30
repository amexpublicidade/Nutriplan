<?PHP
class ConfigComponent extends Component{
    
    public function initialize(Controller $controller) {
        parent::initialize($controller);
        $config=ClassRegistry::init('Painel.Configuracoes');
    }
    
}