Проект реализован на базе фреймворка Symfony3.

Для его запуска нужно запустить `composer install` из папки с ним (если composer не установлен: http://symfony.com/doc/current/cookbook/composer.html).

Настройки подключения к БД находятся в `app/config/parameters.yml`.

БД необходимо создать, команда `bin/console doctrine:schema:create`.
Затем загрузить значения по умолчанию: `bin/console doctrine:fixtures:load`.

Теперь его можно запускать в браузере.
Точка входа — `web/app_dev.php`.
