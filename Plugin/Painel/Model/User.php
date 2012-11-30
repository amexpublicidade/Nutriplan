<?PHP
class User extends PainelAppModel{
    
    public $validate=array(
        'name'=>array('rule'=>'notEmpty','message'=>'Não deixe o nome usuário em branco'),        
        'email'=>array(
            'notEmpty'=>array('rule'=>'notEmpty','message'=>'Não deixe o e-mail em branco'),
            'email'=>array('rule'=>'email','message'=>'Formato de e-mail inválido'),
        ),
        'username'=>array(
            'notEmpty'=>array('rule'=>'notEmpty','message'=>'Não deixe o usuário em branco'),
            'isUsername'=>array('rule'=>'/^[a-zA-Z0-9]{6,12}$/','message'=>'Não é um usuário válido (somente letras e números)'),
            'isUnique'=>array('rule'=>'isUnique','message'=>'Este usuário já está cadastrado'),
        ),
        'password'=>array(
            'notEmpty'=>array('rule'=>'notEmpty','message'=>'Não deixe a senha em branco'),
            'isPassword'=>array('rule'=>'/^[a-zA-Z0-9#@$!?]{6,12}$/','message'=>'Caracteres não permitidos (somente letras números e #@$!?)'),
        ),
    );

    public $belongsTo=array(
        'Group'=>array(
            'className'=>'Painel.Group',
        )
    );
    
    public function updatePassword($data){
        //$this->save($data);
    }
    
    public function beforeValidate($options = array()) {
        parent::beforeValidate($options);
        if(isset($this->data[$this->name]['password'])){            
            if(!isset($this->data[$this->name]['password_retype']) || empty($this->data[$this->name]['password_retype'])){
                $this->invalidate('password_retype', 'Por favor redigite sua senha');
            } else {
                if($this->data[$this->name]['password'] != $this->data[$this->name]['password_retype']){
                    $this->invalidate('password_retype','Senha redigitada não confere');
                }
            }            
        }
    }
    
    public function beforeSave($options = array()) {        
        parent::beforeSave($options);        
        if(isset($this->data[$this->name]['password'])){           
            $this->data[$this->name]['password']=  LockerComponent::password($this->data[$this->name]['password']);
        }
        return true;
    }    
}