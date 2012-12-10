mysql> CREATE TABLE itu_kursusansvar (
kursus_id varchar(10) NOT NULL,
person_id int NOT NULL,
semester varchar(5) NOT NULL,
FOREIGN KEY (kursus_id) REFERENCES itu_kurser(kursus_id),
FOREIGN KEY (person_id) REFERENCES itu_personer(person_id)
) TYPE=InnoDB;

mysql> INSERT INTO itu_kursusansvar VALUES ('DMPI', '11', 'F2008');
mysql> INSERT INTO itu_kursusansvar VALUES ('IWJX', '21', 'F2008');
mysql> INSERT INTO itu_kursusansvar VALUES ('IWJX', '22', 'F2008');
mysql> INSERT INTO itu_kursusansvar VALUES ('DSDI', '31', 'F2008');
mysql> INSERT INTO itu_kursusansvar VALUES ('DSDI', '32', 'F2008');
mysql> INSERT INTO itu_kursusansvar VALUES ('DIND', '41', 'F2008');
mysql> INSERT INTO itu_kursusansvar VALUES ('DIND', '42', 'F2008');
mysql> INSERT INTO itu_kursusansvar VALUES ('KMP', '51', 'F2008');
mysql> INSERT INTO itu_kursusansvar VALUES ('DSDS', '61', 'F2008');

 

