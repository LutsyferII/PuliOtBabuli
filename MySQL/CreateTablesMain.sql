CREATE TABLE ammo(ammoid int not null auto_increment primary key,
caliber char(20) not null,
price int not null,
type char(30) not null);
CREATE TABLE customers(
customerid int not null auto_increment primary key,
name char(30) not null,
address char(40) not null,
city char(20) not null);

CREATE TABLE orders(
orderid int not null auto_increment primary key,
cusomerid int unsigned not null,
amount float(6,2),
date date not null);
create table order_items(
orderid int unsigned not null,
ammoid int not null,
quantity tinyint UNSIGNED,
PRIMARY KEY (orderid,ammoid));
create table ammo_reviews(
    ammoid int not null PRIMARY KEY,
    review text
);