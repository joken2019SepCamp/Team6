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
        <!-- 共通のフレーム -->
        <h1>掲示板 -技術書等の購入依頼-</h1> 
        <div id="side">
                <ul class="sidenav">
                        <li><a class="active" href="index.html">ホーム</a></li>
                        <li><a href="">部室にある参考書</a></li>
                        <li><a href="#contact">参考書のリクエスト</a></li>
                        <li><a href="">講習会資料</a></li>
                </ul>
        </div>
        <!--end-->

        <div id="main" class="modan">
                <section>
                        <h2>新規投稿</h2>
                        <form action="" method="post">
                            <div class="name"><span class="label">お名前:</span><input type="text" name="name" value=""></div>
                            <div class="honbun"><span class="label">本文:</span><textarea name="comment" cols="30" rows="3" maxlength="100" wrap="hard" placeholder="100字以内で入力してください。"></textarea></div>
                            <button type="submit">投稿</button>
                        </form>
                    </section>
                    <section class="submit">
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