CREATE TABLE customers (
  id INT( 10 ) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR( 250 ) NOT NULL UNIQUE
) ENGINE = innodb;

INSERT INTO customers VALUES ('', 'ITU'),(2, 'DTU'), ('', 'CBS');

CREATE TABLE shopitems (
  id INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR (250) NOT NULL UNIQUE,
  price DOUBLE NOT NULL
) ENGINE=innodb;

INSERT INTO shopitems VALUES ('', 'Skovl', 10.26), ('', 'Spade', 10.25), ('', 'Ske', 5);

CREATE TABLE customerorders (
  customerid INT (10) NOT NULL REFERENCES customers (id),
  shopitemid INT (10) NOT NULL,
  UNIQUE (customerid, shopitemid),
  FOREIGN KEY (customerid) REFERENCES customers (id)
) ENGINE=innodb;

INSERT INTO customerorders VALUES (1,1),(1,2),(1,3),(2,1),(2,2);


Spørgsmål 1: 

mysql> SELECT shopitems.name, COUNT(shopitemid) AS TOTAL 
FROM customerorders RIGHT JOIN shopitems 
ON shopitems.id = shopitemid 
GROUP BY shopitemid;
+-------+-------+
| name  | TOTAL |
+-------+-------+
| Skovl |     2 |
| Spade |     2 |
| Ske   |     1 |
+-------+-------+
3 rows in set (0.00 sec)



Spørgsmål 2: 
SELECT shopitems.name, COUNT(shopitemid) AS TOTAL 
FROM customerorders, shopitems 
WHERE shopitems.id = shopitemid 
GROUP BY shopitemid;
+-------+-------+
| name  | TOTAL |
+-------+-------+
| Skovl |     2 |
| Spade |     2 |
| Ske   |     1 |
+-------+-------+
3 rows in set (0.00 sec)

mysql> SELECT shopitems.name AS varenavn, COUNT(shopitemid) AS total_salg
    -> FROM shopitems LEFT JOIN customerorders
    -> ON shopitems.id = shopitemid
    -> GROUP BY shopitemid;
+----------+------------+
| varenavn | total_salg |
+----------+------------+
| kniv     |          0 |
| Skovl    |          2 |
| Spade    |          2 |
| Ske      |          1 |
+----------+------------+
4 rows in set (0.00 sec)

Spørgsmål 3: 

SELECT customers.name, COUNT(customerid) AS TOTAL 
FROM customers LEFT JOIN customerorders 
ON customers.id = customerid 
GROUP BY customers.id 
HAVING TOTAL = 0;
+------+-------+
| name | TOTAL |
+------+-------+
| CBS  |     0 |
+------+-------+
1 row in set (0.00 sec)


Spørgsmål 4:

SELECT customerid, customers.name, SUM(price) AS TOTAL 
FROM customers, shopitems, customerorders 
WHERE customers.id = customerid 
AND shopitems.id = shopitemid 
GROUP BY customers.name, customerid 
ORDER BY customerid ASC;

