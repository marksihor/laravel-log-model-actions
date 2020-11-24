# laravel-log-model-actions

## Installing

```shell
 composer require marksihor/laravel-log-model-actions
```

## Migrations

```shell
php artisan vendor:publish --provider="MarksIhor\\LogModelActions\\LogModelActionsServiceProvider" --tag=migrations
```

## Usage
1. Run the migration.
2. Use Logable trait (MarksIhor\LogModelActions\Logable) in the model You need to log actions.
3. Done.

## License

MIT
