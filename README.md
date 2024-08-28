### Installation Step
1. ``` git clone {repo} ```
2. ``` composer install ```
3. Copy ``` .env.example ``` to ``` .env ``` and setup database
4. ``` php artisan migrate ```
5. ``` php artisan serve ```

### Get Public and Private Keys
``` composer require minishlink/web-push ```
``` php artisan tinker ```
``` use Minishlink\WebPush\VAPID; ```
``` VAPID::createVapidKeys(); ```

"publicKey" => "BCKU6syjcBdoV3EO3w-k8nior__YBYCTtBPDeD5oqGTwG5D6WVCOdGk2TCOaMQhcJK6-9MvNSAqlb_97CWXshmU",
"privateKey" => "ongKJvvPRVBWXF_KFWrPZt4eRaRoV7gXc15kSDwp-sY",
