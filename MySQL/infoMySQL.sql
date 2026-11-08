mysql -u username -p ;//-p - значит с поролем. Подключение к MySQL
mysqld//Запуск MySQL;
GRANT privilages [columns] ON item TO username [IDENTIFIED BY 'password'] [WITH GRANT OPTION]
//Присвоение привелегий(Перечесляются через ,) пользователю. item - база или таблица. *.* (item) - все базы данных и таблицы. 
dbname.* | dbname.tablename ;
WITH GRANT OPTION - можно передавать свои привелегии. ;

CREATE DATABASE name; Создание базы данных.;
REVOKE привелегия [(columns)]
ON item                 Отнять привелегию на Item у username
FROM username; 
REVOKE GRANT OPTION Забирает привелегию полученную через "WITH GRANT OPTION" на Item у username
ON item
FROM username;
grant select, insert, UPDATE, DELETE, index, alter, create,DROP;
select, insert, delete, update; Минимум необходимый. Достаточный.;
use databasename; Подключение к базе.
mysql dbname -h hostname -u username -p; Подключение к конкретной базе при входе.
CREATE TABLE tablename(columns); 
show tables; Показать таблицы.
describe tablename; Информация о таблице.
insert into ammo (nazv,caliber,price,type) values ("7.62x39 об. АПЗ","7.62x39",29,"WP");
insert into ammo set nazv="7.62x39 об. АПЗ",caliber="7.62x39",price=29,type="WP";
select columnname from tablename [where columnname=value].[];
mysql -h host -u ammo -p < ammo_insert. sql
ALTER TABLE tablename ADD COLUMN COLUMNname VARCHAR(255) NOT NULL AFTER othercolumn;
ORDER BY columnname [ASC|DESC]; Упорядочивание вывода комманды SELECT. ASC - стандартная сортировка. DESC - обратная сортировка.
limit 2, 3; Ограничение количества отображаемых строк SELECT. Первое значение - откуда начинать. Второе значение - сколько строк.
UPDATE tablename
SET columnl=expressionl, column2=expression2,
[WHERE condition]
[LIMIT number]; Изменение значения в строке.
DELETE FROM table
[WHERE condition] [LIMIT number];
FLUSH PRIVILEGES;
mysqld:
--skip-name-resolve
--secure

>myisamchk --analyze путь_к_базе_данных_ту8д1/таблица
OPTIMIZE TABLE имя_таблицы;
LOAD DATA INFILE;