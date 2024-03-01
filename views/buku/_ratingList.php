<ul id="rating-list">
    <?php if ($book_rating) : ?>
        <?php foreach ($book_rating as $user_rating) : ?>
            <li><?= $user_rating->rating ?> stars - <?= $user_rating->ulasan ?></li>
        <?php endforeach ?>
    <?php else : ?>
        <li>No Rating</li>
    <?php endif ?>
</ul>