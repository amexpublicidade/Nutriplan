<?PHP
echo $this->Form->create('Sector',array('url'=>array('controller'=>'setores','action'=>'add')));
?>

<fieldset class="box">
    <legend><?=$title?></legend>    
    <?PHP
    echo $this->Form->input('plugin');
    echo $this->Form->input('controller');
    echo $this->Form->input('action');
    ?>    
</fieldset>

<fieldset class="box half">
    <legend>Grupos permitidos</legend>
    <?PHP
    echo $this->Form->input('Group',array('multiple'=>'checkbox','label'=>false));
    ?>
</fieldset>

<?PHP
echo $this->Form->hidden('id');
echo $this->Form->end('Enviar');
?>