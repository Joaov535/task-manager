<?php
$render('header');
?>
<a href="<?= $base ?>/makeTask">Adicionar Tarefa</a>


<table class="table table-striped">
    <thead>
        <th>Tarefa</th>
        <th>Informações</th>
        <th>Data</th>
        <th>Ações</th>
    </thead>
    <tbody>
        <?php if (!empty($tasks)) : ?>
            <?php foreach ($tasks as $task) : ?>
                <tr>
                    <td><?=$task['task_name'];?></td>
                    <td><?=$task['task_info'];?></td>
                    <td><?=$task['task_schedule'];?></td>
                    <td><a href="<?=$base;?>/editTask?id=<?=$task['id']?>">Editar</a> | <a href="<?=$base;?>/delete?id=<?=$task['id'];?>">Excluir</a></td>
                </tr>
            <?php endforeach; ?>
        <?php else : ?>
            <tr>
                <td>Sem dados</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

<?php
$render('footer');
?>