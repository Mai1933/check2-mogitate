# もぎたて

## 環境構築

### Dicker ビルド

1. git clone リンク
2. docker-compose up -d --build
3. ＊MySQL は、OS によって起動しない場合があるのでそれぞれの PC に合わせて docker-compose.yml ファイルを編集してください。

### Laravel 環境構築

1. docker-compose exec php bash
2. composer install
3. .env.example ファイルから.env を作成し、環境変数を変更
4. php artisan key:generate
5. php artisan migrate
6. php artisan db:seed
7. php artisan storage:link

## 使用技術

・PHP 8.3
・Laravel 8.83.27
・MySQL 8.0.26

## ER 図(表示されない場合は再読み込みしてください。）

![ER drawio](https://github.com/user-attachments/assets/221367d2-80dd-4cf3-9ab8-f4c290d1763d)

## URL

・開発環境：http://localhost/
・phpMyAdmin:http://localhost:8080/
