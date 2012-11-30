<?PHP
CakePlugin::load('Tools');
CakePlugin::load('Painel',array('routes'=>true,'bootstrap'=>true));
CakePlugin::load('Produtos',array('bootstrap'=>true));

//NOT EDIT
Cache::config('default', array('engine' => 'File'));
Configure::write('Dispatcher.filters', array('AssetDispatcher','CacheDispatcher'));
App::uses('CakeLog', 'Log');
CakeLog::config('debug', array('engine' => 'FileLog','types' => array('notice', 'info', 'debug'),'file' => 'debug',));
CakeLog::config('error', array('engine' => 'FileLog','types' => array('warning', 'error', 'critical', 'alert', 'emergency'),'file' => 'error',));
