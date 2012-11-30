<fieldset class="box">
    <legend>Setores bloqueados</legend>
   
    <table class="tables">
        
        <thead>
            <tr>
                <td>Plugin</td>
                <td>Controller</td>
                <td>Action</td>
                <td class="edit">&nbsp;</td>
                <td class="edit">&nbsp;</td>
            </tr>
        </thead>
        
        <tbody>
            <?PHP foreach($setores as $setor): ?>
            <tr>
                <td><?=$setor['Sector']['plugin']?></td>
                <td><?=$setor['Sector']['controller']?></td>
                <td><?=$setor['Sector']['action']?></td>
                <td><?=$this->Admin->edit(array('action'=>'edit',$setor['Sector']['id']))?></td>
                <td><?=$this->Admin->delete(array('action'=>'delete',$setor['Sector']['id']))?></td>
            </tr>
            <?PHP endforeach; ?>
        </tbody>
        
    </table>
    <?=$this->element('Painel.paginator');?>
</fieldset>