<?PHP
Configure::write('Painel.menu.Produtos',array(
    'Gerenciar produtos'=>array('plugin'=>'produtos','controller'=>'produtos','action'=>'admin_index'),
    'Adicionar produto'=>array('plugin'=>'produtos','controller'=>'produtos','action'=>'admin_add'),
    'separator',
    'Gerenciar linhas'=>array('plugin'=>'painel','controller'=>'grupos','action'=>'admin_index'),
    'Adicionar linha'=>array('plugin'=>'painel','controller'=>'grupos','action'=>'admin_add'),
    'separator',
    'Gerenciar categorias'=>array('plugin'=>'painel','controller'=>'prefixos','action'=>'admin_index'),
    'Adicionar categoria'=>array('plugin'=>'painel','controller'=>'prefixos','action'=>'admin_add'),
));