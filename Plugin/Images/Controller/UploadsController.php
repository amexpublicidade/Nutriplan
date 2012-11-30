<?PHP
class UploadsController extends ImagesAppController{
    
    public function admin_add($uid){
        $this->autoRender=false;
        $max=intval(ini_get('upload_max_filesize'))*1024*1024;
        if(!file_exists('img/galleries')) mkdir('img/galleries',0777,true);
        $uploader = new qqFileUploader(array(),$max);
        $result = $uploader->handleUpload('img/galleries/');
        $filename=$result['filename'];
        $file="img/galleries/$filename";
        Uploader::resize($file);        
        if($db=$this->Image->save(array('uid'=>$uid,'filename'=>$result['filename']))){
            echo json_encode(array_merge($result,$db['Image']));
        }
    }
    
    public function admin_title(){
        $this->autoRender=false;
        $db=$this->Image->save(array(
            'id'=>$_REQUEST['id'],
            'title'=>$_REQUEST['legend'],
        ));
        echo json_encode(array('success'=>true));
    }
    
    public function admin_delete($id){
        $this->autoRender=false;
        if($this->Image->delete($id)){
            echo json_encode(array('success'=>true));
        } else {
            echo json_encode(array('success'=>false));
        }
    }
    
    public function admin_order(){
        $this->autoRender=false;
        $this->Image->saveAll($_REQUEST);
    }
    
    public function admin_list($uid){
        $this->layout=false;
        $this->set('uid',$uid);
        $this->set('images',$this->Image->find('all',array('conditions'=>array('uid'=>$uid),'order'=>'order ASC')));
    }
}