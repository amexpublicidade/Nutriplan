<?PHP
class AdminHelper extends AppHelper{
    
    public $helpers=array('Html');
    
    //Edit end Delete
    public function edit($target){ return $this->Html->link('Editar',$target);  }    
    public function delete($target){ return $this->Html->link('Excluir',$target,false,__('Tem certeza que deseja excluir este registro?')); }    
    
    public function link($title,$url=false,$options=array()){
        //return false;
        return $this->Html->link($title,$url,$options);
    }
}