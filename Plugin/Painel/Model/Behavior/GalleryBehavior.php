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
                $this->Image->save(array('id'=>$v['id'],'ref_id'=>$model->data['Produto']['id']));
            }
        }
    }

    public function afterFind(Model $model, $results, $primary) {
        parent::afterFind($model, $results, $primary);
        foreach ($results as $k => $v) {
            if (!isset($v[$model->name])) continue;
            if (!isset($v[$model->name]['ref_id']) || empty($v[$model->name]['ref_id'])){
                $this->Image->deleteAll(array('id'=>$v[$model->name]['id']));
                continue;
            }
            $results[$k]['Gallery'] = $this->Image->find('all', array('conditions' => array('ref_id' => $v[$model->name]['id']),'order'=>'order ASC'));
        }
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
        $this->Image->deleteAll(array('uid'=>$this->uid));
        foreach($this->images as $image){
            $image=$image['Image']['filename'];
            if(file_exists("img/galleries/$image")) @unlink("img/galleries/$image");
        }
        return true;
    }

}