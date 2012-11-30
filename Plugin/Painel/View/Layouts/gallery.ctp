<!doctype html>
<html>
    
    <head>
        <meta charset="utf-8">
        <title>Amex admin v3.0</title>
        <?PHP
        echo $this->Html->css('Painel.reset', 'stylesheet/less');
        echo $this->Html->css('Painel.admin.less', 'stylesheet/less');
        echo $this->Html->css('Painel./jcrop/jquery.Jcrop.min.css');

        echo $this->Html->script('Painel.less');
        echo $this->Html->script('Painel.jquery');
        echo $this->Html->script('Painel./jcrop/jquery.Jcrop.min.js');
        ?>
    </head>

    <body>
        <nav id="mainmenu">
            <?PHP echo $this->Html->image('Painel.logo.png'); ?>           
            <ul class="menu">
                <li><a href="#">Galeria 01</a></li>
                <li><a href="#">Galeria 02</a></li>
                <li><a href="#">Galeria 03</a></li>
                <li><a href="#">Galeria 04</a></li>
            </ul>
        </nav>
        <div id="contents"><?PHP echo $this->fetch('content'); ?></div>
    </body>
    
</html>