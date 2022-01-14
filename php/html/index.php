<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>サンプルApp</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <?php
    try {
        $db = new PDO('mysql:dbname=blog;host=mysql;charset=utf8', 'root', 'root');
    } catch (PDOException $e) {
        print('データベース接続エラー:' . $e->getMessage());
    }
    $posts = $db->prepare('SELECT * FROM article ORDER BY created DESC');
    $posts->execute();
    ?>
    <?php foreach ($posts as $post) : ?>
        <section>

            <h2><?php print($post['title']); ?></h2>
            <p><?php print($post['id']); ?></p>
            <?php
            $date = date('Y/m/d', strtotime($post['created']));
            ?>
            <p class="time"><?php print($date); ?></p>
            <?php
            $tags = preg_split("/[\s,]+/", $post['tag']);
            foreach ($tags as $tag) :
            ?>
                <p># <?php print($tag); ?></p>
            <?php endforeach; ?>
        </section>
        <hr>
    <?php endforeach; ?>
</body>

</html>