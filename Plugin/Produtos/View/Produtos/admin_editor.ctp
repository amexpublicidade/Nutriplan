<?PHP
$this->Fancybox->call();
echo $this->Form->create('Produto',array('url'=>array('controller'=>'produtos','action'=>'admin_add')));
?>

<fieldset class="box">
    <legend><?=$title?></legend>
    <?PHP
        echo $this->Form->input('titulo',array('label'=>__('Título')));
        echo $this->Form->input('referencia',array('label'=>__('Referência')));
        echo $this->Form->input('fator',array('label'=>__('Fator de Multiplicação')));
        echo $this->Form->input('descricao',array('label'=>__('Descrição'),'class'=>'ckeditor'));
        echo $this->Form->input('excerpt',array('label'=>__('Resumo')));
        echo $this->Form->input('especificacao',array('label'=>__('Especificação Técnica')));
        //echo $this->Form->input('group_id',array('label'=>'Grupo'));
    ?>
</fieldset>

<?PHP 
echo $this->element("Painel.multiupload");
$data=(isset($this->data['Cor']))?$this->data['Cor']:array();
echo $this->element("Produtos.custom",array("data"=>$data)); 
echo $this->Form->hidden('id');
echo $this->Form->end('Enviar');
?>

