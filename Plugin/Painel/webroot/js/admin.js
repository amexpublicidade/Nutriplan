jQuery(function($){
    
    //Menu function
    $("#mainmenu>.menu>li>a").click(function(){        
        var ul=$(this).parent().find('ul');
        var display=ul.css('display');        
        $("#mainmenu>.menu>li ul").slideUp();
        if(display=='none') ul.slideDown();
        return false;
    });
    
    $('.topbar-file input').change(function(e){
        var $this=this;
        var file=$(this).val();
        var extension=file.split('.');
        extension=extension[extension.length-1].toLowerCase();        
        if(extension!='jpg' && extension!='png' && extension != 'gif'){alert('Extensão inválida');}
        else{
            var reader=new FileReader();
            reader.onload=function(evt){
                var url=evt.target.result;
                var parent=$($this).parent().parent();
                var target=$($this).parent().parent().find('.target');
                var image=$('<img/>').attr('src',url).attr('width','100%').attr('alt','');
                target.html(image);
                $(image).Jcrop({
                    aspectRatio:1/1,
                    setSelect:[0,0,100,100]
                });
            }
            reader.readAsDataURL(e.target.files[0])
        }
    });
});