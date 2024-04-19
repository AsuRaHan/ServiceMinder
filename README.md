<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# ServiceMinder

### Efficient Maintenance Management Made Easy

Цифровая система управления техническим обслуживанием производственного оборудования - `ServiceMinder` представляет собой программное обеспечение, которое позволяет автоматизировать и оптимизировать процессы обслуживания оборудования. Эта система обычно включает в себя функции мониторинга состояния оборудования, планирования и отслеживания технических работ, а также анализа данных для принятия решений по оптимизации процессов обслуживания.

С помощью `ServiceMinder` можно эффективно планировать технические работы, следить за сроками их выполнения, контролировать качество обслуживания и своевременно реагировать на возможные проблемы. Такая система также позволяет сократить затраты на обслуживание за счет оптимизации процессов и ресурсов

`ServiceMinder` - помогает повысить эффективность производства, улучшить надежность оборудования и снизить риски простоев и аварийных ситуаций. Она является важным инструментом для современных предприятий, стремящихся к оптимизации своей производственной деятельности.

# Установка и настройка
`composer install` - Установить все библиотеки PHP

`php artisan migrate` - Запустить миграции

`php artisan db:seed` - Заполнить БД тестовыми данными (если это необходимо)

`npm run dev` - Запустить VITE для разработки фронтэнд части

`npm run build` - Собрать фронтэнд часть

## Основные команды Artisan Laravel

Создание контроллера

`php artisan make:controller UserController`

Создание view *.blabe.php

`php artisan make:view greeting`

Создание миграции

`php artisan make:migration create_users_table`

Создание модели

`php artisan make:model User`

Создание сидера

`php artisan make:seeder UserSeeder`

Создание ресурсного контроллера

`php artisan make:controller PostController --resource`

Создание миграции для определенной таблицы

`php artisan make:migration add_votes_to_users_table --table=users`

Создание фабрики

`php artisan make:factory PostFactory`

Откат последней миграции

`php artisan migrate:rollback`

### Команды относятся для lighthouse

`php artisan lighthouse:query LatestPost` - Создает запрос

# Некоторые подсказки по разработки

В заголовок fetch запроса надо включить авторизацию

```
{
"Authorization": "Bearer VJCz1DCpmdvB9WatqvWbXBP2RN8geZQlrQatUnWIBJCdbAyTl3UsdOuio3VE"
}
```


***
## About Laravel

Laravel - это веб-фреймворк с экспрессивным и элегантным синтаксисом. Мы считаем, что разработка должна быть приятным и творческим процессом, чтобы быть по-настоящему удовлетворительной. Laravel упрощает разработку, облегчая обычные задачи, используемые во многих веб-проектах.

- [Простой, быстрый маршрутизационный движок](https://laravel.com/docs/routing).
- [Мощный контейнер внедрения зависимостей](https://laravel.com/docs/container).
- Несколько вариантов хранения [сессий](https://laravel.com/docs/session) и [кэша](https://laravel.com/docs/cache).
- Экспрессивный, интуитивно понятный ORM для работы с [базой данных](https://laravel.com/docs/eloquent).
- Независимость от базы данных при использовании [миграций схемы](https://laravel.com/docs/migrations).
- [Надежная обработка фоновых задач](https://laravel.com/docs/queues).
- [Вещание событий в реальном времени](https://laravel.com/docs/broadcasting).

Laravel доступен, мощный и предоставляет необходимые инструменты для создания крупных и надежных приложений.

## Learning Laravel

Laravel имеет самую обширную и подробную [документацию ](https://laravel.com/docs) и библиотеку видеоуроков среди всех современных веб-фреймворков, что делает его легким в освоении.

Вы также можете попробовать [Laravel Bootcamp](https://bootcamp.laravel.com),  где вы будете проведены через создание современного приложения на Laravel с нуля.

Если вам не хочется читать, [Laracasts](https://laracasts.com) вам может помочь. Laracasts содержит тысячи видеоуроков по различным темам, включая Laravel, современный PHP, юнит-тестирование и JavaScript. Развивайте свои навыки, изучая наш обширный видеоархив.

## Разработчики этого приложения

- **[Иван Колотилкин](https://rrdev.ru/)**

### Лицензия

Фреймворк Laravel — это программное обеспечение с открытым исходным кодом, лицензированное под лицензией [MIT license](https://opensource.org/licenses/MIT).
