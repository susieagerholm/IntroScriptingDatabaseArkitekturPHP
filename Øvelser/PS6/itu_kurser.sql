mysql> CREATE TABLE itu_kurser (
  -> kursus_id varchar(10) NOT NULL,
  -> kursusnavn varchar(100) NOT NULL
  );
  
mysql> INSERT INTO itu_kurser (kursus_id, kursusnavn)
  -> VALUES ('DMPI', 'Multimedieproduktion paa internet');
  
mysql> INSERT INTO itu_kurser
  -> VALUES ('IWJX', 'Interactive Web Services with Java and XML');

mysql> INSERT INTO itu_kurser
  -> VALUES ('DSDI', 'Social Software and Implementation');

mysql> INSERT INTO itu_kurser
  -> VALUES ('DIND', 'Interaktionsdesign');

mysql> INSERT INTO itu_kurser
  -> VALUES ('KMP', 'Konceptudvikling på multimedieproduktioner');

mysql> INSERT INTO itu_kurser
  -> VALUES ('DSDS', 'Introduktion til scripting, databaser og systemarkitektur');  