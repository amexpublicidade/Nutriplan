<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Amex admin v3.0</title>
        <?PHP
        echo $this->Html->css('Painel.reset', 'stylesheet/less');
        echo $this->Html->css('Painel.admin.less', 'stylesheet/less');
        //echo $this->Html->css('Painel.customfields.less','stylesheet/less');
        echo $this->Html->css('Painel./jcrop/jquery.Jcrop.min.css');
        //echo $this->Html->css('Painel./redactor/redactor.css');
        //echo $this->Html->css('Painel.editor.less.css?'.time(),'stylesheet/less');
        echo $this->fetch('css');

        echo $this->Html->script('Painel.less');
        echo $this->Html->script('Painel.jquery');
        echo $this->Html->script('Painel.admin');
        echo $this->Html->script('Painel.editor');
        echo $this->Html->script('Painel./jcrop/jquery.Jcrop.min.js');
        echo $this->Html->script('Painel./ckeditor/ckeditor.js?' . time());
        echo $this->fetch('script');
        //echo $this->Html->script('Painel./redactor/redactorMIN.js');
        ?>
    </head>

    <body>

        <nav id="mainmenu">
            <?PHP echo $this->Html->image('Painel.logo.png'); ?>
            <div class="usuario">
                <?=$this->Admin->link('Configurações',array('plugin'=>'painel','controller'=>'config','action'=>'admin_index'))?> | 
                <?PHP echo $this->Html->link('logout', '/logout'); ?>
            </div>
            
            
            <ul class="menu">
                <?PHP
                $menus = Configure::read('Painel.menu');
                foreach ($menus as $key => $menu):
                ?>
                <li>
                    <?PHP echo $this->Html->link($key, '#'); ?>
                    <ul>
                        <?PHP foreach ($menu as $k => $v):  ?>
                            <?PHP if ($k == "separator" || $v == "separator"): ?><li><hr/></li>
                            <?PHP else: ?><li><?PHP echo $this->Html->link($k, $v); ?></li><?PHP endif; ?>
                        <?PHP endforeach; ?>
                    </ul>
                </li>
                <?PHP endforeach; ?>
            </ul>
        </nav>
        <div id="contents"><?PHP echo $this->fetch('content'); ?></div>     
    </body>
</html>