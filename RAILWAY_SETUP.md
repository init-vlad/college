# Настройка для Railway

## Проблема "Forbidden" при логине в Filament на Railway

Эта проблема обычно связана с неправильными настройками HTTPS, прокси и сессий на Railway.

## Необходимые переменные окружения в Railway

Добавьте следующие переменные в настройки вашего проекта на Railway:

### Основные настройки

```
APP_ENV=production
APP_DEBUG=false
LOG_LEVEL=info
APP_URL=https://ваш-домен.railway.app
ASSET_URL=https://ваш-домен.railway.app
```

### Настройки сессий для HTTPS

```
SESSION_DRIVER=database
SESSION_LIFETIME=120
SESSION_ENCRYPT=false
SESSION_SECURE_COOKIE=true
SESSION_HTTP_ONLY=true
SESSION_SAME_SITE=lax
```

### Настройки прокси

```
TRUST_PROXIES=*
```

### Настройки кеша и очередей

```
CACHE_DRIVER=database
QUEUE_CONNECTION=database
```

### Настройки логирования

```
LOG_CHANNEL=stack
LOG_STACK=single
```

### Sanctum для SPA (если используется)

```
SANCTUM_STATEFUL_DOMAINS=ваш-домен.railway.app
```

## Изменения в коде

1. **Добавлено логирование в middleware** - теперь все запросы к Filament логируются
2. **Настроен TrustProxies** - для корректной работы с Railway прокси
3. **Обновлены CORS настройки** - добавлены пути для всех Filament панелей
4. **Детальное логирование аутентификации** - в EnsureUserHasRole middleware
5. **Исправлена ошибка "Session store not set on request"** - добавлены безопасные проверки сессии
6. **Кастомная страница входа** - с подробным логированием процесса аутентификации

## Отладка

После применения настроек:

1. Деплойте на Railway
2. Попробуйте войти в систему
3. Проверьте логи через Railway CLI:
    ```bash
    railway logs
    ```

Ищите в логах записи:

-   `Filament Request Started` - начало запроса
-   `Login form email field hydrated` - загрузка формы входа
-   `Filament login attempt started` - начало попытки входа
-   `Filament login successful` - успешный вход
-   `Filament login attempt failed` - неудачная попытка входа
-   `EnsureUserHasRole middleware triggered` - проверка ролей
-   `User authenticated` - успешная аутентификация
-   `Role mismatch - Access denied` - проблемы с ролями

## Дополнительные проверки

Если проблема остается:

1. Проверьте, что APP_URL правильно настроен
2. Убедитесь, что база данных доступна
3. Проверьте миграции таблицы sessions:
    ```bash
    railway run php artisan migrate
    ```

## Создание таблицы сессий

Если используете SESSION_DRIVER=database, убедитесь что таблица sessions создана:

```bash
railway run php artisan session:table
railway run php artisan migrate
```

## Очистка кеша на Railway

После изменений очистите кеш:

```bash
railway run php artisan config:clear
railway run php artisan cache:clear
railway run php artisan route:clear
railway run php artisan view:clear
```

## Частые проблемы и решения

### "Session store not set on request"

-   **Причина**: Middleware пытается обратиться к сессии до её инициализации
-   **Решение**: Добавлены проверки `$request->hasSession()` во всех middleware

### Ошибки CSRF токена

-   **Причина**: Неправильные настройки прокси или HTTPS
-   **Решение**: Настройте `TRUST_PROXIES=*` и `SESSION_SECURE_COOKIE=true`

### Редиректы с HTTPS на HTTP

-   **Причина**: Laravel не определяет HTTPS соединение через прокси
-   **Решение**: Добавлен ForceHttps middleware для принудительного HTTPS
