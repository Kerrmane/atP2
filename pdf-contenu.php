<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF</title>
</head>
<body>
    <h1>LIste</h1>
    <table>
        <thead>
            <th>id</th>
            <th>n</th>
            <th>tel</th>
        </thead>
        <tbody>
            <?php foreach ($clients as $client): ?>
                <td><?=$client['numero_client']?></td> 
                <td><?=$client['raison_sociale']?></td>
                <td><?=$client['code_ape']?></td>
            <?php endforeach; ?>
        </tbody>
    </table>
    
</body>
</html>