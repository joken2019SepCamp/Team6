<?php
$fp = fopen('data.csv', 'a+b');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    fputcsv($fp, [$_POST['name'], $_POST['comment']]);
    rewind($fp);
}
while ($row = fgetcsv($fp)) {
    $rows[] = $row;
}
fclose($fp);
?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="./main_frame.css">
        <link rel="stylesheet" href="./bulletin_board.css">
        <title>chat</title>
    </head>

    <body>
        <h1>掲示板 -本の貸し借り-</h1> 
        <div id="side" class="cp_navi">
                <div id="cp_sidenav" class="sidenav">
                    <a href="#" id="home">Home</a>
                    <a href="#" id="news">News</a>
                    <a href="#" id="contact">Contact</a>
                    <a href="#" id="about">About</a>
                </div>
        </div>

        <div id="main" class="skyblue">
                <section>
                        <h2>新規投稿</h2>
                        <form action="" method="post">
                            <div class="name"><span class="label">お名前:</span><input type="text" name="name" value=""></div>
                            <div class="honbun"><span class="label">本文:</span><textarea name="comment" cols="30" rows="3" maxlength="100" wrap="hard" placeholder="100字以内で入力してください。"></textarea></div>
                            <button type="submit">投稿</button>
                        </form>
                    </section>
                    <section class="toukou">
                        <h2>投稿一覧</h2>
                        <?php if (!empty($rows)): ?>
                            <ul>
                            <?php foreach ($rows as $row): ?>
                            <li><?=$row[1]?> (<?=$row[0]?>)</li>
                            <?php endforeach; ?>
                            </ul>
                        <?php else: ?>
                        <p>投稿はまだありません</p>
                        <?php endif; ?>
                    </section>
        </div>
    </body>
</html>