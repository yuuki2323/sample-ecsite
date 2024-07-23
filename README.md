# sample-ecsite


## アプリ概要
laravelを用いたecサイト

**技術スタック**
- laravel(laravel sail)
- mysql
- tailwindcss

## 環境構築
** Docker コンテナ・ビルド起動 **
- Dockerコンテナをバックグラウンドで起動します。
``` ./vendor/bin/sail up -d ```
- Dockerコンテナ内でComposerを使用して依存関係をインストールします。
``` ./vendor/bin/sail composer install ```
- データベースのマイグレーションを実行します。
``` ./vendor/bin/sail artisan migrate ```
- データベースシーディングを実行します。
``` ./vendor/bin/sail artisan db:seed ```

## ブラウザ
トップページ：http://localhost
管理者ページログイン：https://localhost/admin/login