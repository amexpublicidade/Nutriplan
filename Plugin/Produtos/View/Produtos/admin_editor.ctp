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

<?PHP echo $this->element("Painel.multiupload"); ?>

<fieldset class="box plusfield cores">
    <legend>Cores</legend>    
    <div class="fields">
        <?PHP if(!empty($this->data['Cor'])): $i=0; foreach($this->data['Cor'] as $cor): ?>
        <div class="vid_<?=$i?>" data-rel="<?=$i?>">
            <input type="text" name="data[Cor][<?=$i?>][cor]" placeholder="Cor" value="<?=$cor['cor']?>" />
            <input type="text" name="data[Cor][<?=$i?>][referencia]" placeholder="Refer�ncia" value="<?=$vid['referencia']?>" />
            <button class="remove">Remover</button>
        </div>
        <?PHP $i++; endforeach; endif; ?>
    </div>    
    <div class="button"><button class="add-field">Adicionar</button></div>
</fieldset>

<?PHP

echo $this->Form->hidden('id');
echo $this->Form->end('Enviar');
?>

<script type="text/javascript">
    
    var fields=<?PHP echo isset($this->data['Cor'])?count($this->data['Cor']):0; ?>;
    
    jQuery(function(){
       
       $('.add-field').click(function(){
           var color = '<div class="cfield_'+fields+'" data-rel="'+fields+'">';
           color+='<input type="text" name="data[Cor]['+fields+'][cor]" placeholder="Cor" />';
           color+='<input type="text" name="data[Cor]['+fields+'][referencia]" placeholder="Refer�ncia" />';
           color+='<button class="remove">Remover</button>';
           color+='</div>';
           $('.plusfield>.fields').append(color);
           fields++;
           return false;
       });
       
       $('button.remove').live('click',function(){
           var field = $(this).parent().attr("data-rel");
           $("div[data-rel="+field+"]").detach();
           return false;
       });       
       
    });
    
</script>