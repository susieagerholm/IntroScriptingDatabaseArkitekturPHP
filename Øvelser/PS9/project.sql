CREATE TABLE projektbors (
p_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
p_titel VARCHAR(60) NOT NULL,
p_tekst text,
admin_navn VARCHAR(30) NOT NULL,
admin_mail VARCHAR(30) NOT NULL,
admin_pass VARCHAR(10) NOT NULL
) TYPE=InnoDB;

CREATE UNIQUE INDEX p_titel on projektbors (p_titel);

INSERT INTO projektbors (p_titel, p_tekst, admin_navn, admin_mail, admin_pass) VALUES (
'Man on the moon', 
'Projektet består i at få en mand til månen. Vi søger en tcl-programmør og en astronaut. 
Projektdeltagere: 
<a href="mailto:kenneth@itu.dk">Kenneth Riis</a>, 
<a href="mailto:mael@itu.dk">Martin Elsman</a>', 
'Martin Elsman', 
'mael@itu.dk',
'1234mael'
);

INSERT INTO projektbors (p_titel, p_tekst, admin_navn, admin_mail, admin_pass) VALUES (
'WAP med tcl',
'Formålet med dette projekt er at undersøge hvorledes tcl kan bruges til at skrive WAP
programmer',
'Martin Elsman',
'mael@itu.dk',
'4321mael'
);