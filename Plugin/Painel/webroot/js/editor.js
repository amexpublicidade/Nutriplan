jQuery(function($){
    
    $('iframe.editor').each(function(i,e){
        e.contentDocument.designMode="on";
        e.contentDocument.selection.createRang().pasteHTML('ok');
    });
    
});