<?PHP
if(!isset($label)) $label="Editor";
if(!isset($name)) $name="content";
?>

<fieldset class="box editor">
    <legend><?=$label?></legend>
    <nav class="buttons">
        <a class="bold" href="javascript:void(0)">Bold</a>
        <a class="bold" href="javascript:void(0)">Bold</a>
        <a class="bold" href="javascript:void(0)">Bold</a>
        <a class="bold" href="javascript:void(0)">Bold</a>
        <a class="bold" href="javascript:void(0)">Bold</a>
    </nav>
    <iframe class="editor" contenteditable="true" id="<?=$name?>">Content editable</iframe>
    <?PHP echo $this->Form->hidden($name); ?>
</fieldset>