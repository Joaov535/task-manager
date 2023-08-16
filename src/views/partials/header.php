<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Manager</title>
    <link rel="stylesheet" href="<?= $base; ?>/assets/styles/style.css">
    <link rel="stylesheet" href="<?= $base; ?>/assets/styles/bootstrap-5.3.0-dist/css/bootstrap.css">
</head>

<body>
    <header>

        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-journals" viewBox="0 0 16 16">
            <path d="M5 0h8a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2 2 2 0 0 1-2 2H3a2 2 0 0 1-2-2h1a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1H1a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v9a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1H3a2 2 0 0 1 2-2z" />
            <path d="M1 6v-.5a.5.5 0 0 1 1 0V6h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V9h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 2.5v.5H.5a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1H2v-.5a.5.5 0 0 0-1 0z" />
        </svg>
        <div class="header">
            <a href="<?= $base; ?>" style="text-decoration:none; color:white">Task Manager</a>
        </div>
        <?php if (isset($_SESSION['UserLogged'])) : ?>
            <div class="userLogged">
                Bem vindo, <?= $_SESSION['UserLogged']['username']; ?>!
            </div>
        <?php endif; ?>
        <?php if (isset($_SESSION['UserLogged'])) : ?>
            
                <a href="<?= $base; ?>/logout" role="button" class="btn btn-outline-danger  btn-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="36" fill="currentColor" class="bi bi-power" viewBox="1 0 13 16">
                        <path d="M7.5 1v7h1V1h-1z" />
                        <path d="M3 8.812a4.999 4.999 0 0 1 2.578-4.375l-.485-.874A6 6 0 1 0 11 3.616l-.501.865A5 5 0 1 1 3 8.812z" />
                    </svg>
                </a>
            
        <?php endif; ?>
    </header>

    <div class="content">