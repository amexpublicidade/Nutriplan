<?PHP
echo $this->Form->create('Group',array('url'=>array('controller'=>'grupos','action'=>'admin_add')));
?>
<fieldset class="box">
    <legend><?=$title?></legend>
    <?PHP
    echo $this->Form->input('name',array('label'=>'Nome'));
    echo $this->Form->input('login_redirect',array('label'=>'Após logado vai para:'));
    echo $this->Form->input('logout_redirect',array('label'=>'Após deslogado vai para:'));
    ?>
</fieldset>

<fieldset class="box half">
    <legend>Prefixos permitidos</legend>
    <?PHP echo $this->Form->input('Prefix',array('multiple'=>'checkbox','label'=>false)); ?>
</fieldset>

<fieldset class="box">
    <legend>Ações permitidas</legend>
    <?PHP echo $this->Form->input('Sector',array('multiple'=>'checkbox','label'=>false,'options'=>$setores)); ?>
</fieldset>

<?PHP
echo $this->Form->hidden('id');
echo $this->Form->end('Enviar');
