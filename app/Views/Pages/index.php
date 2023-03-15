<h1>Pages</h1>

<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Friendly</th>
        <th>Title</th>
        <th>Description</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($pages as $page): ?>
        <tr>
            <td><?= $page['id'] ?></td>
            <td><a href="<?= $page['friendly'] ?>"><?= $page['friendly'] ?></a></td>
            <td><?= $page['title'] ?></td>
            <td><?= $page['description'] ?></td>
        </tr>
    <?php endforeach ?>
    </tbody>
</table>
