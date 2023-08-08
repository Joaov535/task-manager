<?php $render('header');

if (!empty($_SESSION['RegMsg'])) {
    $msg = $_SESSION['RegMsg'];
}
if (!empty($_SESSION['err'])) {
    $msg = $_SESSION['err'];
}
?>

<form action="<?= $base; ?>/signUp" method="post">
    <div class="mb-3">
        <label for="username" class="form-label">Usuário</label>
        <input type="text" name="username" class="form-control" placeholder="Username">
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Senha</label>
        <input type="password" name="password" class="form-control" placeholder="********">
    </div>
    <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Aceito os <a href="">termos de usuário</a></label>
    </div>
    <button type="submit" class="btn btn-primary" disabled>Cadastrar</button>
</form>

<?php $render('footer'); ?>

<script>
    let msg = "<?= $msg; ?>";
    document.addEventListener('DOMContentLoaded', () => {

        if (msg.length > 0) {

            window.alert(msg);
            <?php $_SESSION['RegMsg'] = ''; ?>
        }
    })


    let checkbox = document.querySelector('#exampleCheck1');
    let button = document.querySelector('.btn');

    document.addEventListener('click', () => {

        if (checkbox.checked) {
            button.disabled = false;
        } else {
            button.disabled = true;
        }
    })
</script>