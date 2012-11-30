<?PHP

App::uses("Images.Image", "Model");

class GalleryBehavior extends ModelBehavior {
    
    private $Image;
    private $images;
    private $uid;
    
    public function __construct() {
        parent::__construct();
        $this->Image=ClassRegistry::init("Images.Image");
    }

    public function afterFind(Model $model, $results, $primary) {
        parent::afterFind($model, $results, $primary);
        foreach ($results as $k => $v) {
            if (!isset($v[$model->name])) continue;
            if (!isset($v[$model->name]['uid'])) continue;
            $results[$k]['Gallery'] = $this->Image->find('all', array('conditions' => array('uid' => $v[$model->name]['uid']),'order'=>'order ASC'));
        }
        return $results;
    }
    
    public function beforeDelete(Model $model, $cascade = true) {
        parent::beforeDelete($model, $cascade);
        $this->uid=$model->field('uid');
        $this->images=$this->Image->find('all',array('conditions'=>array('uid'=>$this->uid)));
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