<?= view('template/pars/header') ?>

<body class="<?= isset($mini) ? 'sidebar-mini' : '' ?>">
    <div id="app">
        <div class="main-wrapper main-wrapper-1">

            <?= view('template/pars/navbar') ?>
            <?= view('template/pars/sidebar') ?>

            <!-- Main Content -->
            <div class="main-content">
                <?php if (session()->getFlashdata('error')) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?= session()->getFlashdata('error') ?>
                    </div>
                <?php endif ?>
                <?php if (session()->getFlashdata('warning')) : ?>
                    <div class="alert alert-warning" role="alert">
                        <?= session()->getFlashdata('warning') ?>
                    </div>
                <?php endif ?>
                <?php if (session()->getFlashdata('success')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->getFlashdata('success') ?>
                    </div>
                <?php endif ?>
                <div class="card card-body">