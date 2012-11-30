<?PHP
Router::connect('/admin',array('plugin'=>'Painel','controller'=>'usuarios','action'=>'login','admin'=>false));
Router::connect('/logout',array('plugin'=>'Painel','controller'=>'usuarios','action'=>'logout','admin'=>false));
Router::connect('/notallowed',array('plugin'=>'Painel','controller'=>'usuarios','action'=>'notallowed','admin'=>false));
Router::connect('/recover_password',array('plugin'=>'painel','controller'=>'usuarios','action'=>'password','admin'=>false));
Router::connect('/logout',array('plugin'=>'painel','controller'=>'usuarios','action'=>'admin_index'));

//Router::connect('/:plugin/:controller/:action/page/:page',array(),array('page'=>'[0-9]+','pass'=>array('page')));