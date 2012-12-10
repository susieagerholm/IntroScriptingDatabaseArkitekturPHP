SELECT (p_titel) FROM projektbors;

INSERT INTO projektbors (p_titel, p_tekst, admin_navn, admin_mail, admin_pass) VALUES (
'Regn med tcl',
'Formålet med projektet er at finde ud af, hvordan tcl kan bruges til at skrive programmer 
til lommeregnere og PDAer',
'Hans Jensen',
'haj@itu.dk',
'1234haj'
);

UPDATE projektbors SET p_titel = 'VAKS med tcl' WHERE p_titel = 'WAP med tcl';