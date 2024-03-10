--Запуск mailer
symfony open:local:webmail
--запуск web сервера
symfony server:start -d
--Запуск очередей
symfony console messenger:consume async -vv
symfony console debug:autowiring messenger
--Конфигурация messenger:
php bin/console debug:config FrameworkBundle messenger


--Посмотреть очереди с ошибками
symfony console messenger:failed:show
--Перезапуск очередей с ошибками
symfony console messenger:failed:retry -vv


--Запуск тестов Symfone(standart)
symfony php bin/phpunit
