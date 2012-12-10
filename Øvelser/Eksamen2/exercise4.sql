CREATE TABLE Visit (
vid int PRIMARY KEY AUTO_INCREMENT,
restaurant varchar (30) NOT NULL,
date date NOT NULL,
time time NOT NULL
) type = InnoDB;
CREATE TABLE Member (
mid int PRIMARY KEY AUTO_INCREMENT,
name varchar (50) NOT NULL,
email varchar (50) NOT NULL UNIQUE,
password varchar (20) NOT NULL
) type = InnoDB;

INSERT INTO Member (mid, name, email, password)
VALUES (1, 'Margrethe', 'mor@amalienborg.dk', 'cigaret');
INSERT INTO Member (mid, name, email, password)
VALUES (2, 'Frede', 'frede@fredensborg.dk', 'snorkel');
INSERT INTO Member (mid, name, email, password)
VALUES (3, 'Henrik', 'henrik@amalienborg.dk', 'vin');
INSERT INTO Member (mid, name, email, password)
VALUES (4, 'Mary', 'mary@fredensborg.dk', 'hophophop');
INSERT INTO Member (mid, name, email, password)
VALUES (5, 'Joachim', 'joachim@schackenborg.dk', 'traktor');

INSERT INTO Visit (vid, restaurant, date, time)
VALUES (1, 'De Gaulle', '2004-05-19', '19:00');
INSERT INTO Visit (vid, restaurant, date, time)
VALUES (2, 'Le Basilic', '2004-05-27', '19:30');
INSERT INTO Visit (vid, restaurant, date, time)
VALUES (3, 'Era Ora', '2004-06-09', '19:00');

CREATE TABLE Diner (
    -> vid INT NOT NULL,
    -> mid INT NOT NULL,
    -> rating INT, 
    -> FOREIGN KEY (vid) REFERENCES Visit(vid),
    -> FOREIGN KEY (mid) REFERENCES Member(mid),
    -> PRIMARY KEY (vid, mid)
    -> ) TYPE = InnoDB;
Query OK, 0 rows affected, 1 warning (0.05 sec)

SELECT Visit.vid, date, time, restaurant, 
COUNT(mid) AS deltagere, AVG(rating) AS gennemsnit 
FROM Visit LEFT JOIN Diner ON Visit.vid = Diner.vid 
WHERE date < now() 
GROUP BY Visit.vid 
ORDER BY date, time;


