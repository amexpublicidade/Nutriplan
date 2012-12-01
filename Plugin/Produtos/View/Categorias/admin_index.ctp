<fieldset class="box">
    <legend>Categorias</legend>
    
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
            <?PHP foreach($categorias as $categoria): ?>
            <tr>
                <td><?=$categoria['Categoria']['title']?></td>
                <td><?=$categoria['Categoria']['cdate']?></td>
                <td><?=$categoria['Categoria']['mdate']?></td>
                <td><?=$this->Admin->edit(array('action'=>'edit',$categoria['Categoria']['id']))?></td>
                <td><?=$this->Admin->delete(array('action'=>'delete',$categoria['Categoria']['id']))?></td>
            </tr>
            <?PHP endforeach; ?>
        </tbody>
        
    </table>
    
    <?=$this->element('Painel.paginator')?>
    
</fieldset>