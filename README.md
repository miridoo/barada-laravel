# barada-laravel

barada laravel is a helper for project which use barada.

to migrate barada migrations, you should use 
```
$ php artisan barada:migrate
```

to update the migrations table after some hard edit in your database or after a barada reset, you should use

```
$ php artisan barada:migrate mapped
```