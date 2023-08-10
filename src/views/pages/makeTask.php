<?php
$render('header');
?>

<form action="">
    <div class="mb-3">
        <input type="email" class="form-control" id="taskName" placeholder="Nome da tarefa" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <textarea class="form-control" placeholder="Descreva os detalhes da tarefa" id="floatingTextarea2" style="height: 100px"></textarea>
    </div>
    <div class="mb-3">
        <label for="taskSchedule" class="form-label">Agendada para:</label>
        <input class="date" type="date" name="date" id="taskSchedule">
    </div>
    <button type="submit" class="btn btn-primary">Enviar</button>
</form>

<?php
$render('footer');
?>