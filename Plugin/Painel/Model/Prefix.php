<?PHP
class Prefix extends PainelAppModel{

    public $hasAndBelongsToMany=array(
        'Group'=>array(
            'className'=>'Painel.Group',
            'joinTable'=>'tb_group_prefix',
            'foreignKey'=>'prefix_id',
            'associationForeignKey'=>'group_id',
        ),
    );
}