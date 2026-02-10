# フリマアプリ模擬案件
## 環境構築
### Dockerビルド
1. git clone git@github.com:rh22120301/flea-market-test.git
2. cd flea-market-test
3. docker-compose up -d

### Laravel環境構築
1. docker-compose exec php bash
2. composer install
3. 「.env.example」ファイルを 「.env」ファイルに命名を変更。または、新しく.envファイルを作成
4. php artisan key:generate
6. php artisan migrate
7. php artisan db:seed
8. php artisan storage:link

### ER図
<img width="731" height="771" alt="flea-market-test" src="https://github.com/user-attachments/assets/0d11a5a6-0060-4181-97fb-a28ea5c31d56" />


### 使用技術(実行環境)
- PHP 8.1.34
- mysql  Ver 8.0.44
- Laravel Framework 8.83.8

### URL
- 開発環境：http://localhost/
- phpMyAdmin:：http://localhost:8080/
