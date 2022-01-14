<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>php7.2-apache</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <?php
    try {
        $db = new PDO('mysql:dbname=blog;host=mysql;charset=utf8', 'root', 'root');
    } catch (PDOException $e) {
        print('データベース接続エラー:' . $e->getMessage());
    }
    //
    //データベースから取得
    $posts = $db->prepare('SELECT * FROM article ORDER BY created DESC');
    //LIMIT ?,5の?に入るのはint型ではないといけないので型指定できるbindParam(1, $start, PDO::PARAM_INT)を使う
    $posts->execute();
    //
    //var_dump($posts);
    ?>
    <?php foreach ($posts as $post) : ?>
        <section>
            <a href="view.php?id=<?php print(htmlspecialchars($post['id'], ENT_QUOTES)); ?>" class="view_title">
                <h2><?php print(htmlspecialchars($post['title'], ENT_QUOTES)); ?></h2>
            </a>
            <div class="inline-block">
                <img class="timeImage" src="images/time.png" alt="画像">
            </div>
            <?php
            //createdを整形する
            $date = date('Y/m/d', strtotime($post['created']));
            ?>
            <div class="inline-block">
                <p class="time"><?php print(htmlspecialchars($date, ENT_QUOTES)); ?></p>
            </div>
            <?php
            $tags = preg_split("/[\s,]+/", $post['tag']);
            //print_r($keywords);
            foreach ($tags as $tag) :
            ?>
                <div class="inline-block">
                    <a href="searchTag.php?searchTag=<?php print($tag); ?>" class="tag"><?php print('#' . htmlspecialchars($tag, ENT_QUOTES)); ?></a>
                </div>
            <?php endforeach; ?>
        </section>
    <?php endforeach; ?>
</body>

</html>