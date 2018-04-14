<?php

/**
 * @var array $comments
 */

?>
<form action="/comments/create" method="post">
    <div class="form-group">
        <label>Author name</label>
        <input type="text" name="author" class="form-control">
    </div>
    <div class="form-group">
        <label>Comment</label>
        <textarea name="comment" class="form-control"></textarea>
    </div>

    <input type="submit" value="Create" class="btn btn-success">
</form>

<table class="table table-striped">
<?php foreach ($comments as $comment): ?>
    <tr>
        <td><?= $comment['author'] ?></td>
        <td><?= $comment['comment'] ?></td>
        <td>
            <a href="/comments/update?id=<?= $comment['file'] ?>" class="btn btn-sm btn-warning">Update</a>
            <a href="/comments/delete?id=<?= $comment['file'] ?>" class="btn btn-sm btn-danger">Delete</a>
        </td>
    </tr>
<?php endforeach; ?>
</table>
