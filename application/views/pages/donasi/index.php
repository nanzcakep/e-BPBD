<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donasi Here</title>
</head>
<body>
    <h1>Donasi masuk surga amin</h1>
    <ul>
        <?php foreach ($data->result() as $posko) : ?>
            <li><?= $posko->posko ?></li>
        <?php endforeach; ?>

    </ul>
</body>
</html>