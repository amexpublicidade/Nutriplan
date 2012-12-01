<?PHP
$this->Fancybox->call();
echo $this->Form->create('Linha',array('url'=>array('controller'=>'linhas','action'=>'admin_add')));
?>

<fieldset class="box">
    <legend><?=$title?></legend>
    <?PHP
        echo $this->Form->input('title',array('label'=>__('Título')));
        echo $this->element("Painel.image",array("name"=>"thumb","label"=>"Thumb"));
    ?>
</fieldset>

<?PHP 
echo $this->Form->hidden('id');
echo $this->Form->end('Enviar');
?>

