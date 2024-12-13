# To make migration

## 1-create the migration file

```bash
    php artisan make:migration migration_Name
```

## 2-open the migartion file `database/migration/migration_name`

configure `up` and `down` methods

documentation link for more informations:

```bash
    https://laravel.com/docs/11.x/migrations#creating-tables
```

## 3-execute the migration

```bash
    php artisan migrate
```
