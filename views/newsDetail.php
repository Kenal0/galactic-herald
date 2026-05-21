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
        <div class="news-detail-left">
        <span class="news-card-date">
            <?= htmlspecialchars(date('d.m.Y', strtotime($data['newsDetail']['date']))) ?>
        </span>
        <h2 class="news-detail-announce">
        <?= strip_tags($data['newsDetail']['announce']) ?>
        </h2>
        <div class="news-detail-content">
        <?= $data['newsDetail']['content'] ?>
        </div>
        <a href="/?page=<?= $data['currentPage'] ?>#news-section" class="news-detail-back-btn">
            Назад к новостям
        </a>
        </div>
        <div class="news-detail-right">
            <img src="/uploads/<?= $data['newsDetail']['image'] ?>" alt="Изображение к новости" class="news-detail-img">
        </div>
    </div>
</section>
<?php require_once('views/partials/footer.php'); ?>
