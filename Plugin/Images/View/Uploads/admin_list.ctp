<?PHP
//pr($images);
foreach($images as $image):
    extract(array_shift($image));
    //$thumb=$this->Html->url("/thumbs/thumb/150x150/img/galleries/$filename");
    $thumb=$this->Html->url("/images/image/crop/150x150/img/galleries/$filename");
    $image=$this->Html->url("/img/galleries/$filename");
    $delete=$this->Html->url(array('controller'=>'uploads','action'=>'delete','admin'=>true,$id));
    $legend=$this->Html->url(array('controller'=>'uploads','action'=>'title','admin'=>true,'plugin'=>'images'));
?>

    <li data-id="<?=$id?>">
        <a href="<?=$image?>" class="fancybox" data-fancybox-group="4ffc873933651"><img src="<?=$thumb?>" alt="" /></a>
        <a href="<?=$delete?>" class="delete-button">Excluir</a>
        <a href="<?=$legend?>" class="legend-button">Título</a>
    </li>

<?PHP endforeach; ?>