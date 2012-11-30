<?PHP

class Group extends PainelAppModel {
    
    public $hasAndBelongsToMany = array(
        'Prefix'=>array(
            'className'=>'Painel.Prefix',
            'joinTable' => 'tb_group_prefix',
            'foreignKey'=>'group_id',
            'associationForeignKey'=>'prefix_id',
        ),
        'Sector'=>array(
            'className'=>'Painel.Sector',
            'joinTable'=>'tb_group_sector',
            'alias'=>'SJoin',
            'foreignKey'=>'group_id',
            'associationForeignKey'=>'sector_id',
        )
    );
}