<?PHP //
$this->Html->script("Painel./valums/fileuploader.js",array('inline'=>false));
$this->Html->script("Painel./js/jquery.sortable.js",array('inline'=>false));
$this->Html->css('Painel./css/uploader', false, array('inline' => false));

$galleriesc=(isset($galleriesc))?$galleriesc++:1;

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

$delete=$this->Html->url(array('controller'=>'uploads','action'=>'admin_delete','plugin'=>'painel'));
$legend=$this->Html->url(array('controller'=>'uploads','action'=>'admin_title','plugin'=>'painel'));
$cover=$this->Html->url(array('controller'=>'uploads','action'=>'admin_cover','plugin'=>'painel'));
?>

<fieldset class="box">
    <legend>Imagens</legend>
    <div class="multiupload button"><div id="button-<?= $galleriesc ?>">Enviar arquivos</div></div>
    <ul id="multi-<?=$galleriesc?>" class="multiupload ul"></ul>
</fieldset>

<script type="text/javascript">
    var base='<?= $this->base ?>';
    //var pid='<?= $galleriesc ?>';
    var ul=$("#multi-<?=$galleriesc?>");
    var hasImages=false;
    var li={};
    var counter=0;

    jQuery(function($){
        new qq.FileUploaderBasic({
            button:document.getElementById('button-<?= $galleriesc ?>'),
            action:'<?= $this->Html->url(array('controller' => 'uploads', 'action' => 'admin_add', 'plugin' => 'painel')) ?>',
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
                var link=$("<a />").attr('href',base+'/img/galleries/'+response.filename).attr('class','fancybox').attr('data-fancybox-group','<?=$galleriesc?>');
                var img=$('<img />').attr('src',base+'/painel/image/crop/150x150/img/galleries/'+response.filename);
                var input=$('<input />').attr('type','hidden').attr('name','data[Image]['+counter+'][id]').attr('value',response.id);
                link.append(img);                
                li[id].append(link);
                li[id].append(input);
                var del=$('<a>Excluir</a>').attr('href','<?=$delete?>/'+response.id).attr('class','delete-button');
                var title=$('<a>Título</a>').attr('href','<?=$legend?>/'+response.id).attr('class','legend-button');
                var cover=$("<a>Usar como capa</a>").attr('href','<?=$cover?>/'+response.id).attr('class','cover-button');
                li[id].append(del);
                li[id].append(title);
                li[id].append(cover);
                counter++;
            }
        });
        
        $('a.legend-button').live('click',function(){
            var $this=$(this);
            if(legenda=prompt('Digite a legenda da imagem')){
                var href=$this.attr('href');
                var id=$this.parent().attr('data-id');
                $.ajax({
                    url:'<?=$legend?>',
                    dataType:'json',
                    data:{
                        id:id,
                        legend:legenda
                    },
                    success:function(data){
                        if(data.success){
                                if($this.parent().find('.legend').length > 0){
                                    $this.parent().find('.legend').text(data.title);
                                }else{
                                    var tit=$("<div>"+data.title+"</div>").attr('class','legend');
                                    $this.parent().prepend(tit);
                                }
                        }
                    }
                });
            }
            return false;
        });
        
        $('.multiupload').sortable({
            placeholder:'multiupload-placeholder',
            stop:function(){
                var data={};
                $("#multi-<?=$galleriesc?>>li").each(function(){
                    var id=$(this).attr('data-id');
                    var index=$(this).index();
                    data[id]={order:index,id:id}
                });
                $.getJSON('<?=$this->Html->url(array('controller'=>'uploads','action'=>'admin_order','plugin'=>'painel'))?>',data,function(data){
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
        
        $('.multiupload .cover-button').live('click', function(){
            var $this=$(this);
            var href=$this.attr('href');
            $('.cover-button').each(function(){
                if($(this).hasClass('covered')){
                    href+='/'+$(this).parent().attr('data-id');
                    $(this).removeClass('covered').text('Usar como Capa');
                }
            });            
            $.getJSON(href,function(result){
                if(result.success){
                    $this.text('Capa')
                    $this.addClass('covered');
                }
            });
            return false;
        });
        
        $("a.fancybox").fancybox();
        <?PHP if(!empty($this->data['Produto']['id'])): ?>
        $.ajax({
            url:'<?=$this->Html->url(array('controller'=>'uploads','action'=>'admin_list','plugin'=>'painel',$this->data['Produto']['id']))?>',
            success:function(data){
                $('#multi-<?=$galleriesc?>').html(data);
            }
        });
        <?PHP endif; ?>
    })
</script>