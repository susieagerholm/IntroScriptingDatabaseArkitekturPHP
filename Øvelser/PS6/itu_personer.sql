mysql> CREATE TABLE itu_personer (
person_id int NOT NULL,
email varchar(100),
navn varchar(100) NOT NULL,
tilknytning varchar(20)
);

mysql> INSERT INTO itu_personer
VALUES ('11', 'cas@itu.dk', 'Christoffer Andreas Viggo Soya', 'underviser');

mysql> INSERT INTO itu_personer
VALUES ('21', 'jma@itu.dk', 'Jacob Michael Avlund', 'underviser');

mysql> INSERT INTO itu_personer
VALUES ('22', 'mj@itu.dk', 'Martynas Jusevicius', 'hjælpelærer');

mysql> INSERT INTO itu_personer
VALUES ('31', 'jkp@itu.dk', 'Jens Kaaber Pors', 'underviser');

mysql> INSERT INTO itu_personer
VALUES ('32', 'lll@itu.dk', 'Lotte Lund Larsen', 'hjælpelærer');

mysql> INSERT INTO itu_personer
VALUES ('41', 'ts@itu.dk', 'Tomas Sokoler', 'underviser');

mysql> INSERT INTO itu_personer
VALUES ('42', 'pbs@itu.dk', 'Peter Busk Stehr', 'underviser');

mysql> INSERT INTO itu_personer
VALUES ('51', 'en@itu.dk', 'Elise Nørrekjær', 'underviser');

mysql> INSERT INTO itu_personer
VALUES ('61', 'jh@itu.dk', 'Jonas Holbech', 'underviser');

