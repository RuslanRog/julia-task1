<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://unpkg.com/@picocss/pico@1.*/css/pico.min.css">
    <title>Document Layout title: <?= $pageTitle ?></title>
</head>
<body>

<h1><?= $pageTitle ?></h1>
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
        <tr>
            <td><?= print_r($pageId); ?></td>
            <td><?= print_r($pageFriendly); ?></td>
            <td><?= print_r($pageTitle); ?></td>
            <td><?= print_r($pageDescription); ?></td>
        </tr>
    </tbody>
</table>

</body>
</html>
