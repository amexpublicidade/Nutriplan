<?PHP

App::uses("Painel.Image", "Model");

class GalleryBehavior extends ModelBehavior {
    
    private $Image;
    private $images;
    private $id;
    
    public function __construct() {
        parent::__construct();
        $this->Image=ClassRegistry::init("Painel.Image");
    }
    
    //save the reference id from post
    public function afterSave(Model $model, $created) {
        parent::afterSave($model, $created);
        if(isset($model->data['Image']) && !empty($model->data['Image'])){
            foreach($model->data['Image'] as $k=>$v){
                $this->Image->save(array(
                    'id'=>$v['id'],
                    'ref_id'=>$model->data[$model->name]['id'])
                 );
            }
        }
        
    }

    public function afterFind(Model $model, $results, $primary) {
        parent::afterFind($model, $results, $primary);
        foreach ($results as $k => $v) {
            if (!isset($v[$model->name])) continue;
            if (!isset($v[$model->name]['id'])) continue;
            $results[$k]['Gallery'] = $this->Image->find('all', array('conditions' => array('ref_id' => $v[$model->name]['id']),'order'=>'order ASC'));
        }
        $this->removeGarbage(); //remove photos without reference
        return $results;
    }
    
    public function beforeDelete(Model $model, $cascade = true) {
        parent::beforeDelete($model, $cascade);
        
        $this->id=$model->field('id');
        $this->images=$this->Image->find('all',array('conditions'=>array('ref_id'=>$this->id)));
        return true;
    }
    
    public  function afterDelete(Model $model) {
        parent::afterDelete($model);
        $this->Image->deleteAll(array('ref_id'=>$this->id));
        foreach($this->images as $image){
            $image=$image['Image']['filename'];
            if(file_exists("img/galleries/$image")) @unlink("img/galleries/$image");
        }
        return true;
    }
    
    private function removeGarbage(){
        $images=$this->Image->find("all",array('conditions'=>array('ref_id'=>NULL,'deadline <='=>date('Y-m-d H:i:s'))));
        foreach($images as $image){
            $image=array_shift($image);
            $file=$image['filename'];
            $this->Image->delete($image['id']);
            if(file_exists("img/galleries/$file")) @unlink("img/galleries/$file");
        }
    }

}