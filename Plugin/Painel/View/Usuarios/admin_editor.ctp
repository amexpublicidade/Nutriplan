<?PHP echo $this->Form->create('User',array('url'=>array('controller'=>'usuarios','action'=>'add'))); ?>

<fieldset class="box">
    <legend><?=$title?></legend>
    <?PHP
        echo $this->Form->input('name',array('label'=>__('Nome')));
        echo $this->Form->input('email',array('label'=>__('E-mail')));
        echo $this->Form->input('group_id',array('label'=>'Grupo'));
    ?>
</fieldset>

<fieldset class="box">
    <legend>Informações de login</legend>
    <?PHP
        echo $this->Form->input('username',array('label'=>__('Usuário')));
        echo $this->Form->input('password',array('label'=>__('Senha'),'value'=>''));
        echo $this->Form->input('password_retype',array('label'=>__('Repita a senha'),'value'=>'','type'=>'password'));
    ?>
</fieldset>

<?PHP
echo $this->Form->hidden('id');
echo $this->Form->end('Enviar');
?>