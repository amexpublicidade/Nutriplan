<fieldset class="box">
    <legend>Prefixos</legend>
    <table class="tables">
        
        <thead>
            <tr>
                <td>Prefixo</td>
                <td class="edit">&nbsp;</td>
                <td class="edit">&nbsp;</td>
            </tr>
        </thead>
        
        <tbody>
            <?PHP foreach($prefixos as $prefixo): ?>
            <tr>
                <td><?=$prefixo['Prefix']['prefix']?></td>
                <td><?=$this->Admin->edit(array('action'=>'edit',$prefixo['Prefix']['id']))?></td>
                <td><?=$this->Admin->delete(array('action'=>'delete',$prefixo['Prefix']['id']))?></td>
            </tr>
            <?PHP endforeach; ?>
        </tbody>
        
    </table>
    <?=$this->element('Painel.paginator')?>
</fieldset>