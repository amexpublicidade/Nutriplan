<?PHP
$this->Html->css('Painel.customfields.less','stylesheet/less',array('inline'=>false));
$title=(isset($title))?$title:"Campos";
if(isset($data)):
?>
<fieldset class="box plusfield cores">
    <legend><?PHP echo $title; ?></legend>    
    <div class="fields">
        <?PHP if(!empty($data)): $i=0; foreach($data as $cor): ?>
        <div class="pfield cfield_<?=$i?>" data-rel="<?=$i?>">
            <input type="text" name="data[Cor][<?=$i?>][cor]" placeholder="Cor" value="<?=$cor['cor']?>" />
            <input type="text" name="data[Cor][<?=$i?>][referencia]" placeholder="Referencia" value="<?=$vid['referencia']?>" />
            <button class="remove">Remover</button>
        </div>
        <?PHP $i++; endforeach; endif; ?>
    </div>    
    <div class="button"><button class="add-field">Adicionar</button></div>
</fieldset>

<script type="text/javascript">
    
    var fields=<?PHP echo isset($data)?count($data):0; ?>;
    
    jQuery(function(){
       
       $('.add-field').click(function(){
           var color = '<div class="pfield cfield_'+fields+'" data-rel="'+fields+'">';
           color+='<div class="photo-box"></div>';
           color+='<div class="inputs">';
           color+='<input type="text" name="data[Cor]['+fields+'][cor]" placeholder="Cor" />';
           color+='<input type="text" name="data[Cor]['+fields+'][referencia]" placeholder="Referência" />';
           color+='<button class="remove">Remover</button></div>';
           color+='</div>';
           $('.plusfield>.fields').append(color);
           fields++;
           return false;
       });
       
       $('button.remove').live('click',function(){
           var field = $(this).parent().parent().attr("data-rel");
           $("div[data-rel="+field+"]").detach();
           return false;
       });

        
       
    });
    
</script>

<?PHP endif; ?>