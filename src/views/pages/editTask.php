<?php
$render('header'); 
$msg = '';
if (!empty($_SESSION['statusUpdateTask'])) {
    $msg = $_SESSION['statusUpdateTask'];
}

// var_dump( $task);
?>

<form action="<?= $base; ?>/editTask" method="post">
    <div class="mb-3" hidden>
        <input type="text" name="id" value="<?=$task['id'];?>">
    </div>
    <div class="mb-3">
        <input type="text" name="nameTask" class="form-control" id="taskName" placeholder="Nome da tarefa" value="<?=$task['task_name'];?>">
    </div>
    <div class="mb-3">
        <textarea class="form-control" name="infoTask" placeholder="Descreva os detalhes da tarefa" id="infoTask" style="height: 100px"><?=$task['task_info'];?></textarea>
    </div>
    <div class="mb-3">
        <label for="taskSchedule" class="form-label">Agendada para:</label>
        <input class="date" type="date" name="date" id="taskSchedule" value="<?=$task['task_schedule'];?>">
    </div>
    <button type="submit" class="btn btn-primary">Atualizar</button>
</form>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        let msg = "<?= $msg; ?>";

        if (msg.length > 0) {

            setTimeout(() => {

                alert(msg);
            }, 800);

            setTimeout(() => {

                <?php $_SESSION['statusUpdateTask'] = ''; ?>
            }, 2000);
        }
    })
</script>

<?php
$render('footer');
?>