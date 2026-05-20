<?php require_once('views/partials/head.php'); ?>

<hr class="page-top-divider">

<nav class="breadcrumbs container">
    <a href="/" class="breadcrumbs-link">
        Главная
    </a>
    <span class="breadcrumbs-separator">
        /
    </span>
    <span class="breadcrumbs-current">
        <?= $data['newsDetail']['title'] ?>
    </span>
</nav>

<h1 class="news-detail-title container">
    <?= $data['newsDetail']['title'] ?>
</h1>

<section class="news-section-detail">
    <div class="container">
        <span class="news-card-date">
            <?= htmlspecialchars(date('d.m.Y', strtotime($data['newsDetail']['date']))) ?>
        </span>
        <h2 class="news-detail-announce">
        <?= $data['newsDetail']['announce'] ?>
        </h2>
        <div class="news-detail-content">
        <?= $data['newsDetail']['content'] ?>
        </div>
        <a href="/" class="news-detail-back-btn">
            Назад к новостям
        </a>
    </div>
</section>
<?php require_once('views/partials/footer.php'); ?>
