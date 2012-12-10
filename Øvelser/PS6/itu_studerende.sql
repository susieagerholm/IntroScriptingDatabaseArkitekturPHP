mysql> CREATE TABLE itu_studerende (
person_id int primary key NOT NULL,
kursus_id varchar(10) NOT NULL,
FOREIGN KEY (person_id) REFERENCES itu_personer(person_id),
FOREIGN KEY (kursus_id) REFERENCES itu_kurser(kursus_id)
);

mysql> INSERT INTO itu_studerende
    -> VALUES ('101', 'DSDS');
