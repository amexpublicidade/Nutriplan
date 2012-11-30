<fieldset class="box">
    <legend>Produtos Cadastrados</legend>
    
    <table class="tables">
        
        <thead>
            <tr>
                <td><?=$this->Paginator->sort('titulo','Título');?></td>
                <td><?=$this->Paginator->sort('created','Cadastrado em');?></td>
                <td><?=$this->Paginator->sort('modified','Alterado em');?></td>
                <td class="edit"></td>
                <td class="edit"></td>
            </tr>
        </thead>
        
        <tbody>
            <?PHP foreach($produtos as $produto): ?>
            <tr>
                <td><?=$produto['Produto']['titulo']?></td>
                <td><?=$produto['Produto']['cdate']?></td>
                <td><?=$produto['Produto']['mdate']?></td>
                <td><?=$this->Admin->edit(array('action'=>'edit',$produto['Produto']['id']))?></td>
                <td><?=$this->Admin->delete(array('action'=>'delete',$produto['Produto']['id']))?></td>
            </tr>
            <?PHP endforeach; ?>
        </tbody>
        
    </table>
    
    <?=$this->element('Painel.paginator')?>
    
</fieldset>