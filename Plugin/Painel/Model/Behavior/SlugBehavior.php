<?PHP
class SlugBehavior extends ModelBehavior{
    
    public function beforeSave(Model $model) {
        parent::beforeSave($model);        
        $setup=$model->actsAs['Painel.Slug'];
        pre($setup);
    }
    
}