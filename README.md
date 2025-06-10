# Filament redirect

## Установка

```bash
composer require glorax/filament-redirect
```

Зарегистрируйте плагин в `/app/Providers/Filament/AdminPanelProvider.php`,если вы предпочитаете использовать графический интерфейс и браузер папок.

```php
->plugin(\Glorax\FilamentRedirect\FilamentRedirectPlugin::make())
```

## Публикация ресурсов

Вы можете опубликовать файл конфигурации, используя эту команду

```bash
php artisan vendor:publish --tag="filament-redirect-config"
```

Вы можете опубликовать файл языков, используя эту команду

```bash
php artisan vendor:publish --tag="filament-redirect-lang"
```

Вы можете опубликовать файл миграции, используя эту команду

```bash
php artisan vendor:publish --tag="filament-redirect-migrations"
```