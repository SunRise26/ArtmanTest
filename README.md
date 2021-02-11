# Artman test project

## Installation:

1. Build docker containers<br />
RUN (cd docker && docker-compose build)

2. Run docker containers<br />
RUN (cd docker && docker-compose up)<br />
!!! MySql need some time to initialize on first launch (takes about 1-2 minutes). Please, wait for the following message:<br />
[Server] /usr/sbin/mysqld: ready for connections. Version: '8.0.22'  socket: '/var/run/mysqld/mysqld.sock'  port: 3306  MySQL Community Server - GPL.

3. Generate composer vendor<br />
RUN (cd artman-test && composer install)

4. Copy .env settings<br />
RUN (cd artman-test && cp .env.example .env)<br />
!!! Generally, it is completely configured. MAIL_* configurations configured to use special email for testing, so you can leave them as they are.<br />
!!!!!!<br />
!!! ONE MORE THING. I've a little bit extended original task with user status (online/offline).<br />
!!! Now it has the following behavior:<br />
!!!    If user logged out or all user (e.g. from multiple browser clients) sessions expired, it will show offline status.<br />
!!!    But when user logged in, it will show status that was selected by user last time.<br />
!!!    Perhaps, you'd like to test this manually, so you can change SESSION_LIFETIME in env file to 1 (in minutes) or some other small values to speedup expiration of session.<br />
!!!!!!<br />

5. Migrations, seeders, etc<br />
RUN (cd artman-test && php artisan migrate)<br />
RUN (cd artman-test && php artisan db:seed)<br />
RUN (cd artman-test && php artisan passport:keys)<br />
RUN (cd artman-test && php artisan key:generate)<br />

6. Phew...
Now available on https://localhost (by default)<br />
Admin: https://localhost/admin

## Testing

1. .env.testing already prepared, just create "testing" database:<br />
(cd docker && docker-compose exec mysql mysql -u root --password=123456)<br />
CREATE DATABASE testing;
