<fieldset class="box">
    <legend>Linhas</legend>
    
    <table class="tables">
        
        <thead>
            <tr>
                <td><?=$this->Paginator->sort('title','Título');?></td>
                <td><?=$this->Paginator->sort('created','Cadastrado em');?></td>
                <td><?=$this->Paginator->sort('modified','Alterado em');?></td>
                <td class="edit"></td>
                <td class="edit"></td>
            </tr>
        </thead>
        
        <tbody>
            <?PHP foreach($linhas as $linha): ?>
            <tr>
                <td><?=$linha['Linha']['title']?></td>
                <td><?=$linha['Linha']['cdate']?></td>
                <td><?=$linha['Linha']['mdate']?></td>
                <td><?=$this->Admin->edit(array('action'=>'edit',$linha['Linha']['id']))?></td>
                <td><?=$this->Admin->delete(array('action'=>'delete',$linha['Linha']['id']))?></td>
            </tr>
            <?PHP endforeach; ?>
        </tbody>
        
    </table>
    
    <?=$this->element('Painel.paginator')?>
    
</fieldset>