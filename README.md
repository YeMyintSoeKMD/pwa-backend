### Installation Step
1. ``` git clone {repo} ```
2. ``` composer install ```
3. Copy ``` .env.example ``` to ``` .env ``` and setup database
4. ``` php artisan key:generate ```
5. ``` php artisan migrate ```
6. ``` php artisan serve ```
7. Optinal step (to create fake data)
- ``` php artisan tinker ```
- ``` App\Models\Blog::factory()->count(10)->create(); ```

### Get Public and Private Keys
1. ``` composer require minishlink/web-push ```
2. ``` php artisan tinker ```
3. ``` use Minishlink\WebPush\VAPID; ```
4. ``` VAPID::createVapidKeys(); ```

- "publicKey" => "BCKU6syjcBdoV3EO3w-k8nior__YBYCTtBPDeD5oqGTwG5D6WVCOdGk2TCOaMQhcJK6-9MvNSAqlb_97CWXshmU"
- "privateKey" => "ongKJvvPRVBWXF_KFWrPZt4eRaRoV7gXc15kSDwp-sY",
