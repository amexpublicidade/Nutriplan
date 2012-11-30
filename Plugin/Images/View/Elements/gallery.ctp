<?PHP if(count($images)): ?>
<h1 class="images gallery"><?=__("Imagens")?></h1>
<?PHP
foreach($images as $image):
    $img=$image['Image']['filename'];
    $image=$this->Html->url("/img/galleries/$img");
    $thumb=$this->Thumbs->thumb("/img/galleries/$img",$width,$height);
?>
<a href="<?=$image?>" class="fancybox" data-fancybox-group="gallery"><?=$thumb?></a>
<?PHP
endforeach;
endif;
?>