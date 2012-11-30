<?PHP
class Produto extends ProdutosAppModel {
 
    public $virtualFields=array(
      'cdate' => "DATE_FORMAT(Produto.created, '%d/%m/%Y')",
      'mdate' => "DATE_FORMAT(Produto.modified, '%d/%m/%Y')"
    );
    
    public $actsAs=array("Painel.Gallery");
    
    public $hasMany=array(
        'Cores'=>array(
          'className'=>'Produtos.Cor',
          'foreignKey'=>'produto_id'
        )
    );
    
    public function beforeSave($options = array()) {
        parent::beforeSave($options);
    }
    
}