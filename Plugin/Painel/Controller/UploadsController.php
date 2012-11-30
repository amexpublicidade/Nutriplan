<?PHP
App::import("Vendor","Painel.valums");
App::import("Vendor","Painel.canvas");
App::import("Vendor","Painel.Uploader");
class UploadsController extends PainelAppController{
    
    public $uses=array('Painel.Image');
    
    public function admin_add(){
        $this->autoRender=false;
        $max=intval(ini_get('upload_max_filesize'))*1024*1024;
        if(!file_exists('img/galleries')) mkdir('img/galleries',0777,true);
        $uploader = new qqFileUploader(array(),$max);
        $result = $uploader->handleUpload('img/galleries/');
        $filename=$result['filename'];
        $file="img/galleries/$filename";
        Uploader::resize($file);        
        if($db=$this->Image->save(array('filename'=>$result['filename']))){
            //pre(array_merge($result,$db['Image']));
            $return=array_merge($result,$db['Image']);
            echo json_encode($return);
        }
    }
    
    public function admin_cover($id,$oldid=NULL){
        $this->autoRender=false;
        if(isset($oldid)) $this->Image->save(array('id'=>$oldid,'cover'=>0));
        if(isset($id)){
            if($this->Image->save(array('id'=>$id,'cover'=>1))){
                echo json_encode(array('success'=>true));
            }else{
                echo json_encode(array('success'=>false));
            }
        }
    }
    
    public function admin_title(){
        $this->autoRender=false;
        $db=$this->Image->save(array(
            'id'=>$_REQUEST['id'],
            'title'=>$_REQUEST['legend'],
        ));
        $return=array_merge(array('success'=>true),$db['Image']);
        echo json_encode($return);
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
        foreach($_REQUEST as $k=>$v):
            $this->Image->save($v);
        endforeach;
    }
    
    public function admin_list($id){
        $this->layout=false;
        $this->set('id',$id);
        $this->set('images',$this->Image->find('all',array('conditions'=>array('ref_id'=>$id),'order'=>'order ASC')));
    }
}