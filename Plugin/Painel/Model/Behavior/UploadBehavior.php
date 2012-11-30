<?PHP
App::import('Vendor', 'Images.canvas');
class UploadBehavior extends ModelBehavior{
    
    public $settings;
    public $allowed=array('jpg','png','gif');    
    
    public function setup(Model $model, $config = array()) {
        parent::setup($model, $config);
        if(isset($model->UploadExtensions)) $this->allowed=$model->UploadExtensions;
        $this->settings=$model->UploadFields;
   }
    
    
    public function beforeValidate(Model $model) {
        parent::beforeValidate($model);
        $this->settings=$model->UploadFields;
        foreach($this->settings as $k=>$v){
            
            // VALIDATION START =====================================================================================================
            
            //If not set, it continues
            if(!isset($model->data[$model->name][$k])) continue;
            
            //If empty, it continues,deleting the image only
            if(empty($model->data[$model->name][$k])) continue;
            
            //If updating and file was not sent, unset the error value and continues
            if(isset($model->data[$model->name]['id']) && $model->data[$model->name][$k]['error']>0){
                unset($model->data[$model->name][$k]);
                continue;
            }            
            
            //GET THE FIELD
            $field=$model->data[$model->name][$k];
            
            //If the extension is not allowed, invalidates and continue
            if(!$this->isAllowed($field)){ $model->invalidate($k,'Extensão inválida'); continue; }
            
            // VALIDATION END ========================================================================================================
            
            //Get a new file name
            $name=$this->getFileName($field);
            
            //If the path doesnt exists, create it
            if(!file_exists($v)) mkdir($v,0777,true);
            
            //Set the destination path+file
            $destination="$v/$name";
            
            //Move the file with the new name to the destination
            if(!move_uploaded_file($model->data[$model->name][$k]['tmp_name'], $destination)){
                //If not moved, invalidate the field and set the model´s data to  null
                $model->invalidate ($k, 'Não foi possível enviar o arquivo, tente novamente');                
                $model->data[$model->name][$k]=null;
            } else {
                //If it´s moved, check the image sizes and resize it if necessary
                list($width,$height)=  getimagesize($destination);
                if($width>1000 || $height>3000){
                    $canvas=new canvas($destination);
                    $canvas->redimensiona(1000, 3000, 'proporcional');
                    $canvas->grava($destination);
                }
                //Set model´s data
                $model->data[$model->name][$k]=$destination;
            }
        }
        return true;
    }
    
    private function isAllowed($file){
        $extension=strtolower(pathinfo($file['name'],PATHINFO_EXTENSION));
        return in_array($extension, $this->allowed);
    }
    
    private function getFileName($file){
        return uniqid().'.'.strtolower(pathinfo($file['name'],PATHINFO_EXTENSION));
    }
    
    //DELETING FUNCTIONS

    //If the record is delete, get the data for upload´s exclusion
    public function beforeDelete(Model $model, $cascade = true){
        parent::beforeDelete($model,$cascade);
        $this->data=$model->read();
        return true;
    }
    
    public function afterDelete(Model $model){
        //Loops the fields and deletes
        $this->settings=$model->UploadFields;
        foreach($this->settings as $k=>$v){
            //Deletes the images in the loop
            @unlink($this->data[$model->name][$k]);
        }
        return true;
    }
    
    public function beforeSave(Model $model) {
        parent::beforeSave($model);
        $this->settings = $model->UploadFields;
        //pr($model); exit;
        //Checks if it´s updating
        if(isset($model->data[$model->name]['id']) && !empty($model->data[$model->name]['id'])){
            //Get the ID of current record
            $id=$model->data[$model->name]['id'];            
            
            //Get the field list separated by comma
            $fields=  implode(",", array_keys($this->settings));            
            
            //Get the fields values from the upload
            $data=array_shift(array_shift($model->query("SELECT $fields FROM ".$model->tablePrefix.$model->useTable." as $model->alias WHERE id='$id'")));
            
            //Loops found keys and values to check if upload is being updated
            foreach($data as $k=>$v){
                //If upload data exists and is not an array, delete it from the folder.
                if(isset($model->data[$model->name][$k]) && !is_array($model->data[$model->name][$k])){
                    @unlink($v);
                }
            }
        }
        return true;
    }
}