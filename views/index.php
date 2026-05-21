<?php require_once('views/partials/head.php') ?>

<main class="main-content" style="background-image: url('/uploads/<?= htmlspecialchars($data['mainImage']) ?>');">
    <section class="hero-banner container">
        <h1 class="hero-title"><?= htmlspecialchars($data['mainTitle']) ?></h1>
        <p class="hero-text"><?= htmlspecialchars(strip_tags($data['mainAnnounce'])) ?></p>
    </section>
</main>

<section class="news-section container" id="news-section">
    <div class="news-header">
        <h1 class="news-section-title">Новости</h1>
    </div>

    <div class="four-news">
        <?php foreach ($data['fourNews'] as $news) : ?>
            <a href="/news?id=<?= (int)$news['id'] ?>" class=news-card-link>
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
                    <span class="news-card-btn">
                    Подробнее
                    </span>
                 </article>
            </a>
        <?php endforeach; ?>
    </div>

    <nav class="news-pagination">

        <?php if ($data['currentPage'] > 1) : ?>
            <a href="?page=<?= $data['currentPage'] - 1 ?>#news-section" class="pagination-item pagination-prev">
        <?php endif; ?>
        <?php for ($i = $data['pagination']['startPage'] ; $i <= $data['pagination']['endPage']; $i++) : ?>
            <?php if ($i === $data['currentPage']) : ?>
                <span class="pagination-item pagination-item-active">
                    <?= $i ?>
                </span>
            <?php else : ?>
                 <a href="?page=<?= $i ?>#news-section" class="pagination-item">
                     <?= $i ?>
                 </a>
            <?php endif; ?>
        <?php endfor; ?>

        <?php if ($data['currentPage'] < $data['totalPages']) : ?>
            <a href="?page=<?= $data['currentPage'] + 1 ?>#news-section" class="pagination-item pagination-next">
            </a>
        <?php endif; ?>

    </nav>
</section>

<?php require_once('views/partials/footer.php'); ?>
