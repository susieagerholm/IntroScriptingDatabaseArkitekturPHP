CREATE TABLE store (
    id      int          PRIMARY KEY AUTO_INCREMENT,
    name    varchar(400) NOT NULL,
    pic_url varchar(400),
    address varchar(400)
  ) TYPE = InnoDB;

  CREATE TABLE dish (
    id       int          PRIMARY KEY AUTO_INCREMENT,
    store_id int          NOT NULL, INDEX (store_id),
    name     varchar(400) NOT NULL,
    FOREIGN KEY (store_id) REFERENCES store (id)
  ) TYPE = InnoDB;


INSERT INTO store (id, name, pic_url, address)
  VALUES (1, 'Didim Pizza Pasta og Grill', 'http://didim.dk/didim.jpg',
	  'Vibevej 35, 2400 Kbh. NV. Tlf. 38100571 - Så har vi det klar når De kommer');

  INSERT INTO dish (id, store_id, name)
  VALUES (1, 1, 'No 9: Pepperoni. Kr. 38,-');

  INSERT INTO dish (id, store_id, name)
  VALUES (2, 1, 'No 24: Hawaii. Kr. 38,-');

  INSERT INTO dish (id, store_id, name)
  VALUES (3, 1, 'No 36: Didim Bøf. Kr. 40,-');
