<?PHP
class ProdutosAppController extends AppController {
    
    public $helpers=array("Painel.Admin","Tools.Fancybox");
    public $uses=array("Painel.Images","Produtos.Produto");
    public $paginate=array('limit'=>10);
}