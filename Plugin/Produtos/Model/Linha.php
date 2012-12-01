<?PHP
class Linha extends ProdutosAppModel {

    public $useTable="produtos_linhas";
    
    
    public $virtualFields=array(
        'cdate'=>"DATE_FORMAT(Linha.created, '%d/%m/%Y')",
        'mdate'=>"DATE_FORMAT(Linha.modified, '%d/%m/%Y')"
    );
    
    
}