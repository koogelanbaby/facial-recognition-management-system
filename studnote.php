<?php include 'Admin/Notes.php';?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="styles.css">
    <title>Notes</title>
</head>

<body>
    <div class="transparent">
        <table>
            <thead>
                <th>Chapter</th>
                <th>Link</th>
            </thead>
            <tbody>
                <?php foreach ($files as $file): ?>
                <tr>
                    <td><?php echo $file['name']; ?></td>
                    <td><a href="studnote.php?file_id=<?php echo $file['id'] ?>">Download</a></td>
                </tr>
                <?php endforeach;?>

            </tbody>
        </table>
    </div>
</body>

</html>
