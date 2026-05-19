<?php require('views/head.php') ?>

<main class="main-content" style="background-image: url('/uploads/<?= htmlspecialchars($data['mainImage']) ?>');">
    <section class="hero-banner container">
        <h1 class="hero-title"><?= htmlspecialchars($data['mainTitle']) ?></h1>
        <p class="hero-text"><?= htmlspecialchars(strip_tags($data['mainAnnounce'])) ?></p>
    </section>
</main>

<section class="news-header container">
    <h1 class="news-section-title">Новости</h1>
</section>

<section class="four-news container">
        <?php foreach ($data['fourNews'] as $news) : ?>
            <article class="news-card">
                <span class="news-card-date">
                    <?= htmlspecialchars(date('d.m.Y', strtotime($news['date']))) ?>
                </span>
                <h2 class="news-card-title">
                    <?= htmlspecialchars($news['title']) ?>
                </h2>
                <p class="news-card-text">
                    <?= htmlspecialchars(strip_tags($news['announce'])) ?>
                </p>
                <a href="/new?id=" class="news-card-btn">
                    Подробнее
                    <img src="/images/Arrow1.svg" class="news-card-btn-img">
                </a>
            </article>
        <?php endforeach; ?>
</section>

