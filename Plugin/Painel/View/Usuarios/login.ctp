<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Área administrativa</title>
<?PHP
echo $this->Html->css('Painel.login.less.css?'.time(),'stylesheet/less');
echo $this->Html->script('Painel.less');
?>
</head>
<body>    
    <div id="login">       
        <?PHP echo $this->Html->image('Painel.login/logo.png',array('id'=>'logo')); ?>
        <div class="inner">
            <h1 class="title">Login</h1>
            <?PHP
            echo $this->Form->create('User',array('id'=>'login-form'));
            echo $this->Form->input('username',array('label'=>'Usuário','autocomplete'=>'off'));
            echo $this->Form->input('password',array('label'=>'Senha','autocomplete'=>'off'));
            echo $this->Html->link('Esqueci minha senha','/recover_password',array('class'=>'recover-password'));
            echo $this->Form->end('Login');
            ?>
        </div>
        <div class="reflex"></div>
    </div>    
</body>
</html>