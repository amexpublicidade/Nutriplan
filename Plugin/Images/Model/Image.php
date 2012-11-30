<?PHP
class Image extends ImagesAppModel{
    
    public $filename;
    
    public function beforeDelete($cascade = true) {
        parent::beforeDelete($cascade);
        $this->filename=$this->field('filename',array('id'=>$this->id));
        return true;
    }
    
    public function afterDelete() {
        parent::afterDelete();
        unlink("img/galleries/$this->filename");
        return true;
    }
}