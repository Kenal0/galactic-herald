<?php require('views/head.php') ?>

<main class="main-content" style="background-image: url('/uploads/<?= htmlspecialchars($data['mainImage']) ?>');">
    <section class="hero-banner container">
        <h1 class="hero-title"><?= htmlspecialchars($data['mainTitle']) ?></h1>
        <p class="hero-text"><?= htmlspecialchars(strip_tags($data['mainAnnounce'])) ?></p>
    </section>
</main>
