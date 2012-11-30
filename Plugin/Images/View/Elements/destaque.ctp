<?PHP
if(!isset($required)) $required=false;
$this->Html->script('/images/js/destaque.js',array('inline'=>false,'once'=>true));
$this->Html->css('/images/css/destaque.css',false,array('inline'=>false,'once'=>true));

$data=$this->data;
$data=array_shift($data);

$image=(isset($data[$name]) && !empty($data[$name]))?'/'.$data[$name]:'/images/img/noimage.png';
$thumb=(isset($data[$name]) && !empty($data[$name]) && !is_array($data[$name]))?$this->Image->crop($image,110,110):$this->Html->image('/images/img/noimage.png');

$link=$this->Html->link($thumb,$image,array('class'=>'fancybox','escape'=>false));
$id=$data['id'];
?>

<fieldset class="box destaque">    
    <legend><?=$label?></legend>
    <div class="image"><?PHP echo $link; ?></div>    
    <div class="right">
        <?PHP
        echo $this->Form->input($name,array("type"=>"file","label"=>false,'class'=>isset($class)?$class:null,'data-value'=>$data[$name],'id'=>$name));
        if(isset($data[$name])) echo $this->Html->link(__('Excluir imagem'),'#',array('class'=>'delete-image','data-field'=>$name));
        ?>
    </div>    
</fieldset>

<script>
    jQuery(function($){
        $("#<?=$name?>").change(function(){
            $(this).attr('data-value',this.value);
        });
    });
</script>