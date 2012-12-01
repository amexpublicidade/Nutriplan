<?PHP
class Categoria extends ProdutosAppModel {

    
    public $virtualFields=array(
        'cdate'=>"DATE_FORMAT(Categoria.created, '%d/%m/%Y')",
        'mdate'=>"DATE_FORMAT(Categoria.modified, '%d/%m/%Y')"
    );
    
    public $useTable="produtos_categorias";
    
    public $UploadFields=array(
        'thumb'=>'img/produtos'
    );
    
//    public $actsAs=array('Painel.Upload');
    
   
    
}