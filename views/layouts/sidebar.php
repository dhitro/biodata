<?php $level = Yii::$app->user->identity->level;
$request = Yii::$app->request;

$search = $request->get('search');
?>
<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.php?r=site/index">Biodata</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.php?r=site/index">Bio</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Menu</li>
            <li class="nav-item dropdown active">
                <a href="index.php?r=site/index" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Biodata</span></a>
                <ul class="dropdown-menu">
                    <?php
                    if ($level == 2) {
                    ?>
                        <li class="active"><a class="nav-link" href="index.php?r=site/index">Entry Data</a></li>
                    <?php } ?>
                    <?php
                    if ($level == 1) {
                    ?>
                        <li><a class="nav-link" href="index.php?r=site/pdf&search=<?= $search ?>">Cetak</a></li>
                    <?php } ?>
                </ul>
            </li>

        </ul>
        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-rocket"></i> Template Oleh Stisla
            </a>
        </div>
    </aside>
</div>