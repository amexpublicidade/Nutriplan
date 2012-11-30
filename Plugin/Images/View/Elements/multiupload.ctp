<?PHP
$this->Html->script("/images/valums/fileuploader.js", array('inline' => false));
$this->Html->script("/images/js/jquery.sortable.js",array('inline'=>false));
$this->Html->css('/images/css/uploader.css', false, array('inline' => false));
$pid=$uid;

//UNIQUE ID
/*
$newdata=$this->data;
$pdata=array_shift($newdata);
$pid = uniqid();
$uid = isset($pdata['uid']) ? $pdata['uid'] : uniqid();
echo $this->Form->hidden('uid', array('value' => $uid));
 * 
 */
//END OF UNIQUE ID

$delete=$this->Html->url(array('controller'=>'uploads','action'=>'delete','admin'=>true,'plugin'=>'images'));
$legend=$this->Html->url(array('controller'=>'uploads','action'=>'title','admin'=>true,'plugin'=>'images'));
?>

<fieldset class="box">
    <legend>Imagens</legend>
    <div class="multiupload button"><div id="button-<?= $pid ?>">Enviar arquivos</div></div>
    <ul id="multi-<?=$pid?>" class="multiupload ul"></ul>
</fieldset>

<script type="text/javascript">
    var base='<?= $this->base ?>';
    var pid='<?= $pid ?>';
    var ul=$("#multi-<?=$pid?>");
    var hasImages=false;
    var li={};

    jQuery(function($){
        new qq.FileUploaderBasic({
            button:document.getElementById('button-<?= $pid ?>'),
            action:'<?= $this->Html->url(array('controller' => 'uploads', 'action' => 'add', 'admin' => true, 'plugin' => 'images', $uid)) ?>',
            onSubmit:function(id,filename){
                li[id]=$('<li><span></span></li>')
                ul.append(li[id]);
            },
            onProgress:function(id,filename,loaded,total){
                li[id].find('span').css('height',loaded/total*100+'%');
            },
            onComplete:function(id,filename,response){
                li[id].attr('data-id',response.id);
                li[id].html('');
                
                //Image link
                var link=$("<a />").attr('href',base+'/img/galleries/'+response.filename).attr('class','fancybox').attr('data-fancybox-group','<?=$pid?>');
                var img=$('<img />').attr('src',base+'/images/image/crop/150x150/img/galleries/'+response.filename);
                link.append(img);                
                li[id].append(link);
                
                var del=$('<a>Excluir</a>').attr('href','<?=$delete?>/'+response.id).attr('class','delete-button');
                var title=$('<a>Título</a>').attr('href','<?=$legend?>/'+response.id).attr('class','legend-button');
                li[id].append(del);
                li[id].append(title);
            }
        });
        
        $('a.legend-button').live('click',function(e){
            if(legenda=prompt('Digite a legenda da imagem')){
                var href=$(this).attr('href');
                var id=$(this).parent().attr('data-id');
                
                $.ajax({
                    url:'<?=$legend?>',
                    dataType:'jsonp',
                    data:{
                        id:id,
                        legend:legenda
                    },
                    success:function(data){                        
                    }
                });
            }
            return false;
        });
        
        $('.multiupload').sortable({
            placeholder:'multiupload-placeholder',
            stop:function(){
                var data={};
                $("#multi-<?=$pid?>>li").each(function(){
                    var id=$(this).attr('data-id');
                    var index=$(this).index();
                    data[id]={order:index,id:id}
                });
                $.getJSON('<?=$this->Html->url(array('controller'=>'uploads','action'=>'order','admin'=>true,'plugin'=>'images'))?>',data,function(data){
                });
            }
        });
        
        $(".multiupload .delete-button").live('click',function(){
            var $this=$(this);
            var href=$this.attr('href');
            $.getJSON(href,function(result){
                if(result.success){
                    $this.parent().detach();
                }
            });
            return false;
        });
        
        $("a.fancybox").fancybox();
        
        $.ajax({
            url:'<?=$this->Html->url(array('controller'=>'uploads','action'=>'list','admin'=>true,'plugin'=>'images',$uid))?>',
            success:function(data){
                $('#multi-<?=$pid?>').html(data);
            }
        });
    })
</script>