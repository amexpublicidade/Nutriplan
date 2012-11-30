<?PHP
class PainelAppModel extends AppModel{
    
    public $tablePrefix="tb_";
    public $recursive=3;
    public $virtualFields=array();
    
    public function beforeFind($queryData) {
        parent::beforeFind($queryData);
        if($this->hasField('created')) $this->virtualFields["cdate"]="DATE_FORMAT($this->name.created,'%d/%m/%Y')";
    }
    
}