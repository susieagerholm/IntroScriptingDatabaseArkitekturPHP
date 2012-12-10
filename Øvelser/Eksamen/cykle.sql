CREATE TABLE companies (
cid INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
name VARCHAR(250) NOT NULL
) ENGINE=InnoDB;

INSERT INTO companies (cid, name) VALUES
(1, 'ITU'), (2, 'DTU'), (3, 'KUA');

CREATE TABLE users (
uid INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
name VARCHAR(100) NOT NULL,
passwd VARCHAR(40) NOT NULL,
cid INT NOT NULL,
email VARCHAR(200) NOT NULL UNIQUE,
INDEX (cid),
FOREIGN KEY (cid) REFERENCES companies (cid)
) ENGINE=InnoDB;

INSERT INTO users (uid, name, passwd, cid, email) VALUES
(1, 'Lars', 'hemmeligt1', 1, 'lars@itu.dk'),
(2, 'Egon', 'hemmeligt2', 1, 'egon@itu.dk'),
(3, 'Marie', 'hemmeligt3', 2, 'marie@dtu.dk'),
(4, 'Ulla', 'hemmeligt4', 2, 'ulla@dtu.dk'),
(5, 'Bent', 'hemmeligt5', 3, 'bent@kua.dk');

CREATE TABLE trips (
tid INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
uid INT NOT NULL,
distance DOUBLE NOT NULL,
tripdate DATE NOT NULL,
FOREIGN KEY (uid) REFERENCES users (uid)
) ENGINE=InnoDB;

INSERT INTO trips (uid, distance, tripdate) VALUES
(1, 3.1, now()), (4, 20.0, now()), (3, 5.7, now());