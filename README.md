# Apach + MySQL + phpMyAdmin on Docker

clone し、docker compose up をしたら、[localhost:8080](localhost:8080) にアクセスします。
phpMyAdmin のログイン画面が表示されるので、ユーザー:`root` , パスワード:`root` を入力する。
blog データベースがあるので、`sql/article.sql`を実行し、article テーブルを作成する。
article テーブルに適当なデータを入れて、[localhost:8000](localhost:8000)にアクセスすると、入力したデータが表示される。

---

メモ

```sh
docker exec -it mysql_container bash

mysql -uroot -proot

show databases;

use blog;

show variables like 'hostname';
```
