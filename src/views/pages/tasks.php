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
                    <?php foreach ($task as $field) : ?>
                        <td><?= $field ?></td>
                    <?php endforeach ?>
                    <td>ações</td>
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