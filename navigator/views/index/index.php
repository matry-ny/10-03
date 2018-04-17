<?php

/**
 * @var string $dir
 * @var array $items
 */

?>

<div class="row">
    <div class="col-lg-12">
        <a href="/directories/create?rout=<?= $dir ?>" class="btn btn-success">Create directory</a>
        <a href="/files/create?rout=<?= $dir ?>" class="btn btn-success">Create file</a>
        <a href="/files/upload?rout=<?= $dir ?>" class="btn btn-success">Upload file</a>
        <a href="/directories/delete?rout=<?= $dir ?>" class="btn btn-danger">Delete directory</a>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <ul>
            <?php foreach ($items as $item): ?>
                <li><a href="<?= $item['action'] ?>"><?= $item['name'] ?></a></li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
