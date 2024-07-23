# sample-ecsite


## アプリ概要
laravelを用いたecサイト

**技術スタック**
- laravel(laravel sail)
- mysql
- tailwindcss

## 環境構築
**windowsの方はUBUNTUを使う**
**既存のアプリケーション用の Composer 依存関係のインストール**
``` docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php82-composer:latest \
    composer install --ignore-platform-reqs
```
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
