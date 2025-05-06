# 🚀 Laravel 11 | Learning Project

<p align="center">
  <img src="https://laravel.com/img/logomark.min.svg" width="80" alt="Laravel Logo">
</p>

<p align="center">
  <strong>Привет, меня зовут zeragon, и я изучаю Laravel 11</strong>
</p>

---

## 📝 Описание проекта

Этот репозиторий содержит учебный проект на **Laravel 11**, в котором реализуется API с базовыми функциями. Проект создан с целью углубленного изучения фреймворка и практики разработки RESTful API.

### 🔧 Функционал
- ✅ Регистрация и авторизация пользователей  
- ✅ Выход из аккаунта и закрытие всех активных сессий  
- ✅ Удаление аккаунта пользователя  
- ✅ Отправка "постов" (с возможностью загрузки изображений в Storage)  
- ✅ Получение публичных уведомлений о новых постах  

---

## ⏳ Работа в процессе...

Проект находится в стадии активной разработки. Следи за обновлениями!

---

## 🛠 Технологии

- [Laravel 11](https://laravel.com/docs/11.x)
- Laravel Sanctum (API Authentication)
- PHP 8.3
- MySQL
- Laravel Storage (локальное и облачное хранение файлов)

---

## 🧪 Как запустить проект локально?

1. Клонируй репозиторий:
```bash
git clone https://github.com/ZeragonAnachronised/laravel_11_learning.git
```

2. Перейди в папку проекта:
```bash
cd laravel_11_learning
```

3. Установи зависимости:
```bash
composer install
```

4. Настрой `.env` файл:
```bash
cp .env.example .env
php artisan key:generate
```

5. Запусти миграции:
```bash
php artisan migrate
```

6. Запусти сервер:
```bash
php artisan serve
```

Теперь API доступен по адресу: `http://127.0.0.1:8000`
