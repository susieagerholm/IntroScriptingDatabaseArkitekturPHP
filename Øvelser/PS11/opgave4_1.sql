CREATE TABLE va_person (
pid INT AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(200) NOT NULL,
email VARCHAR(200) UNIQUE NOT NULL,
passwd VARCHAR(10) NOT NULL
) TYPE=InnoDB;

CREATE TABLE va_question (
qid INT AUTO_INCREMENT PRIMARY KEY,
pid INT NOT NULL,
sent DATE,
head VARCHAR(200) NOT NULL
) TYPE=InnoDB;

INSERT INTO va_person (pid, email, name, passwd)
VALUES (1, 'panic@itu.dk', 'Arne Glenstrup', '4567');

INSERT INTO va_person (pid, email, name, passwd)
VALUES (2, 'nh@itu.dk', 'Niels Hallenberg', '2345');

INSERT INTO va_person (pid, email, name, passwd)
VALUES (3, 'mael@itu.dk', 'Martin Elsman', '9347');

INSERT INTO va_question (qid, pid, head) 
VALUES (1, 3, 'Do you like PHP?');

INSERT INTO va_question (qid, pid, head) 
VALUES (2, 2, 'Did you get any X-Mas presents this year?');

INSERT INTO va_question (qid, pid, head) 
VALUES (3, 1, 'Have you heard about the course Distributed Systems?'); 

CREATE TABLE va_answer (
qid INT,
pid INT,
ans CHAR(1), 
FOREIGN KEY (qid) REFERENCES va_question (qid),
FOREIGN KEY (pid) REFERENCES va_person (pid)
) TYPE=InnoDB;

CREATE UNIQUE INDEX answer_qid_pid ON va_answer (qid, pid);

INSERT INTO va_answer (qid, pid) VALUES
(1, 1), (1, 2), (2, 1), (2, 3);

SELECT va_answer.qid, head, ans, name, email 
FROM va_question, va_person, va_answer 
WHERE va_answer.qid = va_question.qid 
AND va_answer.pid = 3 AND va_question.pid = va_person.pid;
