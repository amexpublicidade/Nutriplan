<fieldset class="box">
    <legend>Usuários cadastrados</legend>
    
    <table class="tables">
        
        <thead>
            <tr>
                <td>Usuário</td>
                <td>Nome</td>
                <td>E-mail</td>
                <td>Grupo</td>
                <td>Registrado em</td>
                <td class="edit"></td>
                <td class="edit"></td>
            </tr>
        </thead>
        
        <tbody>
            <?PHP foreach($users as $user): ?>
            <tr>
                <td><?=$user['User']['username']?></td>
                <td><?=$user['User']['name']?></td>
                <td><?=$user['User']['email']?></td>
                <td><?=$user['Group']['name']?></td>
                <td><?=$user['User']['cdate']?></td>
                <td><?=$this->Admin->edit(array('action'=>'edit',$user['User']['id']))?></td>
                <td><?=$this->Admin->delete(array('action'=>'delete',$user['User']['id']))?></td>
            </tr>
            <?PHP endforeach; ?>
        </tbody>
        
    </table>
    
    <?=$this->element('Painel.paginator')?>
    
</fieldset>