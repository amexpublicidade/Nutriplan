<?PHP
App::import('Vendor','Painel.ModelHash');
class Sector extends PainelAppModel{
    
    public $validate=array(
        'controller'=>array('rule'=>'notEmpty','message'=>'Preencha o campo "controller"'),
        'action'=>array('rule'=>'notEmpty','message'=>'Preencha o campo "action"'),
    );
    
    public $hasAndBelongsToMany=array(
        'Group'=>array(
            'className'=>'Painel.Group',
            'joinTable'=>'tb_group_sector',
            'foreignKey'=>'sector_id',
            'associationForeignKey'=>'group_id',
        ),
    );    
}