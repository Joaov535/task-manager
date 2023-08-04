<?php $render('header'); ?>

<form action="<?= $base; ?>/signUp" method="post">
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Usuário</label>
        <input type="email" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Username">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Senha</label>
        <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="********">
    </div>
    <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Aceito os <a href="">termos de usuário</a></label>
    </div>
    <button type="submit" class="btn btn-primary" disabled>Cadastrar</button>
</form>

<?php $render('footer'); ?>

<script>
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