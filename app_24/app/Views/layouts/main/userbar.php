<div class="container-fluid bg-info p-2">
    <div class="row">
        <div class="col">[LOGO]</div>
        <div class="col text-end"><?= session()->user->username ?> | <a href="<?= site_url('/logout') ?>">Logout</a></div>
    </div>
</div>