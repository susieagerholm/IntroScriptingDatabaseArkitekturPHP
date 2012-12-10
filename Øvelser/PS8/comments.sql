CREATE TABLE comments ( 
id INT NOT NULL PRIMARY KEY AUTO_INCREMENT, 
url VARCHAR(200) NOT NULL, 
insertdate DATETIME, name VARCHAR(100), 
email VARCHAR(100), 
text TEXT 
);

INSERT INTO comments (url, insertdate, name, email, text) VALUES ( 
'http://itu.dk/stud/f2008/DSDS/saba/index.html', 
now(), 
'Martin Elsman', 
'mael@itu.dk', 
'Great page!'
);

// Vis alle kommentarer
SELECT text FROM comments;

// Indsæt en kommentar
INSERT INTO comments (url, insertdate, name, email, text) VALUES (
'http://itu.dk/stud/f2008/DSDS/saba/index.html', 
now(), 
'Jens Hansen', 
'jh@itu.dk'
'Der mangler vist lidt kode!'
);

// Slet kommentarer fra Jens Hansen, den brokkerøv! 
DELETE FROM comments 
WHERE name = 'Jens Hansen';

//Opdater til Martins nye mail-adresse
UPDATE comments SET email = 'martin@itu.dk'
WHERE email = 'mael@itu.dk';
