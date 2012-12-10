SELECT va_answer.qid, va_question.head, COUNT(ans) 
FROM va_answer, va_question 
WHERE va_answer.qid = va_question.qid 
AND ans='y' 
GROUP BY va_answer.qid;
+------+------------------------------------------------+------------+
| qid  | head                                           | COUNT(ans) |
+------+------------------------------------------------+------------+
|    2 | Did you get any X-Mas presents this year?      |          1 |
|   19 | Have you heard about the course XML processing |          1 |
+------+------------------------------------------------+------------+
2 rows in set (0.00 sec)

SELECT va_answer.qid, va_question.head, COUNT(ans) 
FROM va_answer, va_question 
WHERE va_answer.qid = va_question.qid 
AND ans='n' 
GROUP BY va_answer.qid;
+------+------------------------------------------------------+------------+
| qid  | head                                                 | COUNT(ans) |
+------+------------------------------------------------------+------------+
|    3 | Have you heard about the course Distributed Systems? |          1 |
+------+------------------------------------------------------+------------+
1 row in set (0.00 sec)

SELECT va_answer.qid, va_question.head, COUNT(ans) 
FROM va_answer, va_question 
WHERE va_answer.qid = va_question.qid 
GROUP BY va_answer.qid;
+------+------------------------------------------------------+------------+
| qid  | head                                                 | COUNT(ans) |
+------+------------------------------------------------------+------------+
|    1 | Do you like PHP?                                     |          0 |
|    2 | Did you get any X-Mas presents this year?            |          1 |
|    3 | Have you heard about the course Distributed Systems? |          1 |
|    5 | Can you program in JAVA?                             |          0 |
|    6 | Have you heard about the course Multimedia?          |          0 |
|   16 | Can you program in TCL?                              |          0 |
|   19 | Have you heard about the course XML processing       |          1 |
+------+------------------------------------------------------+------------+
7 rows in set (0.00 sec)
