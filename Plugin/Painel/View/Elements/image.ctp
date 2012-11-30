<fieldset class="box" id="<?=$name?>">
    <legend><?=$label?></legend>
    <?PHP echo $this->Form->input('thumb',array('type'=>'file','div'=>'input file topbar-file','label'=>'Selecione um arquivo')); ?>
    <div class="target"></div>
</fieldset>