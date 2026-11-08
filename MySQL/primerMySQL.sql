GRANT ALL
on *
to chel IDENTIFIED BY 'passwordHuy'
with grant option;
REVOKE ALL
ON *
FROM chel;
grant usage
on ammo.*
to dude IDENTIFIED by 'ThisIsWendsdayMyDude';
grant select, insert, UPDATE, DELETE, index, alter, create,DROP
on ammo.*
to dude;
CREATE TABLE ammo(ammoid int not null auto_increment primary key,
caliber char(20),
price int,
type char(30));
select orders.orderid, orders.amount, orders.date from customers, orders where customers.name="Санитар" and customers.customerid=orders.customerid;
select customers.name
from customers, orders, order_items, ammo
where customers.customerid =orders.customerid
and orders.orderid = order_items.orderid
and order_items.ammoid = ammo.ammoid
and ammo.nazv like '%7.62% ';
select customers.customerid, customers.name
from customers left join orders
using (customerid)
where orders.orderid is null;
customers as с, orders as о, order_iterns as oi, books as b;
select cl.name, c2.name, cl.city
from customers as cl, customers as c2
where cl.city = c2.city
and cl.name != c2.name;
select name, address
from customers
order by name ;
select orders.customerid, avg (orders.amount),customers.name
from orders,customers where orders.customerid = customers.customerid
group by customerid
HAVING avg (orders.amount)>50;
UPDATE ammo set price=price+5 WHERE mass>8 Limit 5