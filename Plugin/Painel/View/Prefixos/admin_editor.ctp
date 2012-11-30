<?PHP
echo $this->Form->create('Prefix',array('url'=>array('controller'=>'prefixos','action'=>'add')));
?>

<fieldset class="box">
    <legend><?=$title?></legend>
    <?PHP
    echo $this->Form->input('prefix',array('label'=>'Prefixo'));
    ?>
</fieldset>

<fieldset class="box half">
    <legend>Grupos</legend>
    <?PHP
    echo $this->Form->input('Group',array('multiple'=>'checkbox','label'=>false));
    ?>
</fieldset>

<?PHP
echo $this->Form->hidden('id');
echo $this->Form->end('Enviar');
?>