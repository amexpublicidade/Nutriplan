CKEDITOR.editorConfig = function( config ){
    
    // Define changes to default configuration here. For example:
    // config.language = 'fr';
    //config.enterMode = CKEDITOR.ENTER_BR;    
    /*
    //KCFINDER PLUGIN
    config.filebrowserBrowseUrl      = base+'/kcfinder/browse.php?type=files';
    config.filebrowserImageBrowseUrl = base+'/kcfinder/browse.php?type=images';
    config.filebrowserFlashBrowseUrl = base+'/kcfinder/browse.php?type=flash';
    config.filebrowserUploadUrl      = base+'/kcfinder/upload.php?type=files';
    config.filebrowserImageUploadUrl = base+'/kcfinder/upload.php?type=images';
    config.filebrowserFlashUploadUrl = base+'/kcfinder/upload.php?type=flash';
    */    
    //config.autoGrow
    
    config.uiColor = '#EEE';
    config.resize_dir='vertical';
    config.toolbar = 'MyToolbar';        
    config.toolbar_MyToolbar =[
        { name: 'styles', items : [ 'Styles','Format' ] },
        { name: 'basicstyles', items : ['Bold','Italic','Strike','-','RemoveFormat','TextColor','BGColor' ] },
        { name: 'paragraph', items : [ 'NumberedList','BulletedList','-','Outdent','Indent','-','Blockquote' ] },
        { name: 'links', items : [ 'Link','Unlink','Anchor' ] },
        //{ name: 'clipboard', items : ['Undo','Redo' ] },
        { name: 'editing', items : [ 'Find','Replace','-','SelectAll','-','Scayt' ] },
        { name: 'insert', items : [ 'Image','Flash','HorizontalRule','SpecialChar','YouTube'] },
        { name: 'tools', items : [ 'Maximize','Preview','Source'] },
    ];
};