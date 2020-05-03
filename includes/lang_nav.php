    <nav class="mt-5">
        <?php foreach ($link_data as $link) : ?>
        <a class="btn btn-info" href="<?= $link['url'] ?>"><?= $link['label'] ?></a>
        <?php endforeach; ?>
    </nav>