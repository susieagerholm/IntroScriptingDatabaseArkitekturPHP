CREATE TABLE vp_person (
id INT AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(100) NOT NULL,
email VARCHAR(100) NOT NULL,
password VARCHAR(100) NOT NULL
) TYPE=InnoDB;

CREATE TABLE vp_projector (
id INT AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(100)
) TYPE=InnoDB;

INSERT INTO vp_person (id, name, email, password) VALUES
(1, 'John Paulin', 'paulin@itu.dk', 'yes!');

INSERT INTO vp_person (id, name, email, password) VALUES
(2, 'Niels Hallenberg', 'nh@itu.dk', 'no!');

INSERT INTO vp_projector (id, name) VALUES (1, 'Projector 1');

INSERT INTO vp_projector (id, name) VALUES (2, 'Projector 2');

INSERT INTO vp_projector (id, name) VALUES (3, 'Projector 3');

Problem 4.1
mysql> SELECT name, email FROM vp_person;
+------------------+---------------+
| name             | email         |
+------------------+---------------+
| John Paulin      | paulin@itu.dk |
| Niels Hallenberg | nh@itu.dk     |
+------------------+---------------+
2 rows in set (0.00 sec)

Problem 4.2
SELECT COUNT(id) AS Number_of_projectors FROM vp_projector;

Problem 4.3

CREATE TABLE vp_reservation (
projector_id INT NOT NULL,
person_id INT NOT NULL,
res_date DATE NOT NULL,
FOREIGN KEY (projector_id) REFERENCES vp_projector (id),
FOREIGN KEY (person_id) REFERENCES vp_person (id),
PRIMARY KEY (projector_id, res_date)
) TYPE=InnoDB;

Problem 4.4

INSERT INTO vp_reservation (projector_id, person_id, res_date) VALUES
(2, 1, "2001-02-06");

INSERT INTO vp_reservation (projector_id, person_id, res_date) VALUES
(1, 2, "2001-02-08");

Problem 4.5

SELECT projector_id, vp_projector.name, person_id, vp_person.name, email 
FROM vp_reservation, vp_projector, vp_person 
WHERE res_date="2001-02-06" 
AND vp_person.id = vp_reservation.person_id 
AND vp_projector.id = vp_reservation.projector_id;

Problem 4.6

 SELECT vp_projector.id, name
    -> FROM vp_projector LEFT JOIN vp_reservation
    -> ON id = projector_id
    -> AND res_date = '2001-02-08'
    -> GROUP BY vp_projector.id, name
    -> HAVING COUNT(res_date) = 0;
