<?php
$render('header');
$msg = '';
if (!empty($_SESSION['sendTask'])) {
    $msg = $_SESSION['sendTask'];
}
?>

<form action="<?= $base; ?>/makeTask" method="post">
    <div class="mb-3">
        <input type="text" name="nameTask" class="form-control" id="taskName" placeholder="Nome da tarefa">
    </div>
    <div class="mb-3">
        <textarea class="form-control" name="infoTask" placeholder="Descreva os detalhes da tarefa" id="infoTask" style="height: 100px"></textarea>
    </div>
    <div class="mb-3">
        <label for="taskSchedule" class="form-label">Agendada para:</label>
        <input class="date" type="date" name="date" id="taskSchedule">
    </div>
    <button type="submit" class="btn btn-primary">Enviar</button>
</form>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        let msg = "<?= $msg; ?>";

        if (msg.length > 0) {

            setTimeout(() => {

                alert(msg);
            }, 800);

            setTimeout(() => {

                <?php $_SESSION['sendTask'] = ''; ?>
            }, 2000);
        }
    })
</script>

<?php
$render('footer');
?>