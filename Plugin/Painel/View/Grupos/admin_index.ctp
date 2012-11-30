<fieldset class="box">
    <legend>Grupos de usuários</legend>
    <table class="tables">
        <thead>
            <tr>
                <td>Nome</td>
                <td class="edit">&nbsp;</td>
                <td class="edit">&nbsp;</td>
            </tr>
        </thead>
        
        <tbody>
            <?PHP foreach($grupos as $grupo): ?>
            <tr>
                <td><?=$grupo['Group']['name']?></td>
                <td><?=$this->Admin->edit(array('action'=>'edit',$grupo['Group']['id']))?></td>
                <td><?=$this->Admin->delete(array('action'=>'delete',$grupo['Group']['id']))?></td>
            </tr>
            <?PHP endforeach; ?>
        </tbody>
    </table>
    <?=$this->element('Painel.paginator')?>
</fieldset>