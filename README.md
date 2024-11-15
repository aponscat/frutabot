# FrutaBot

First set the variable TELEGRAM_TOKEN=xxx.yyy in your .env file

Create a Telegram bot using the following commands:

## Ngrok

Is better to start the first two commands in separate windows to control the daemons

```sh
# Serve the laravel application in port 8000
php artisan serve
# Connect ngrok public url to laravel
ngrok http http://localhost:8000
# Connect Telegram to the public url of ngrok (that connects to local environment)
php artisan bot:set-webhook-ngrok
```

## Direct connection
```sh
# Connect Telegram to the public url of ngrok (that connects to local environment)
php artisan bot:set-webhook https://xxx.yy.com
```



You can inspect the ngrok traffic using this url:
<http://localhost:4040/inspect/http>

## Tests

To run the tests:

```sh
php artisan test
```

## Resources

- <https://botman.io/>
- <https://github.com/orgs/botman/repositories?language=&type=all>
- <https://medium.com/@NomadNotes/botman-in-laravel-a-comprehensive-guide-9096ab4aa4a5>
- <https://medium.com/@prevailexcellent/how-to-build-a-telegram-bot-with-referral-system-with-laravel-11-and-botman-2-0-step-by-step-guide-0fc1e43aca65>
- <https://serhii.io/posts/telegram-bot-with-botman-and-latest-laravel-version>
