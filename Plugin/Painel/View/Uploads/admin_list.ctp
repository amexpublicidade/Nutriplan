<?PHP
foreach($images as $image):
    extract(array_shift($image));
    //$thumb=$this->Html->url("/thumbs/thumb/150x150/img/galleries/$filename");
    $thumb=$this->Html->url("/painel/image/crop/150x150/img/galleries/$filename");
    $image=$this->Html->url("/img/galleries/$filename");
    $delete=$this->Html->url(array('plugin'=>'painel','controller'=>'uploads','action'=>'admin_delete',$id));
    $legend=$this->Html->url(array('plugin'=>'painel','controller'=>'uploads','action'=>'admin_title'));
    $coveru=$this->Html->url(array('plugin'=>'painel','controller'=>'uploads','action'=>'admin_cover',$id));
    $covertext=(!empty($cover) && $cover==true)?"Capa":"Usar como capa";
?>

    <li data-id="<?=$id?>">
        <?PHP if(isset($title) && !empty($title)): ?>
        <div class="legend"><?=$title?></div>
        <?PHP endif; ?>
        <a href="<?=$image?>" class="fancybox" data-fancybox-group="4ffc873933651"><img src="<?=$thumb?>" alt="" /></a>
        <a href="<?=$delete?>" class="delete-button">Excluir</a>
        <a href="<?=$legend?>" class="legend-button">Título</a>
        <a href="<?=$coveru?>" class="cover-button<? if(!empty($cover) && $cover==true){?> covered<? } ?>"><?=$covertext?></a>
    </li>

<?PHP endforeach; ?>