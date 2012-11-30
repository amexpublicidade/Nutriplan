<?PHP
date_default_timezone_set('America/Sao_Paulo');
//pr exit function
function pre($object){ pr($object); exit; }

//Configure the prefixes
$prefixes=Configure::read('Routing.prefixes');
if(is_array($prefixes)) $prefixes=  array_merge($prefixes,array('admin'));
else $prefixes=array('admin');
Configure::write('Routing.prefixes',$prefixes);

Configure::write('Painel.menu.Administração',array(
    'Gerenciar usuários'=>array('plugin'=>'painel','controller'=>'usuarios','action'=>'admin_index'),
    'Adicionar usuário'=>array('plugin'=>'painel','controller'=>'usuarios','action'=>'admin_add'),
    'separator',
    'Gerenciar grupos'=>array('plugin'=>'painel','controller'=>'grupos','action'=>'admin_index'),
    'Adicionar grupo'=>array('plugin'=>'painel','controller'=>'grupos','action'=>'admin_add'),
    'separator',
    'Gerenciar prefixos'=>array('plugin'=>'painel','controller'=>'prefixos','action'=>'admin_index'),
    'Adicionar prefixo'=>array('plugin'=>'painel','controller'=>'prefixos','action'=>'admin_add'),
    'separator',
    'Gerenciar setores'=>array('plugin'=>'painel','controller'=>'setores','action'=>'admin_index'),
    'Adicionar setor'=>array('plugin'=>'painel','controller'=>'setores','action'=>'admin_add'),
));