SELECT users.uid, users.name, SUM(distance) AS Total
FROM users, trips
WHERE users.uid = trips.uid
AND cid = 2
GROUP BY users.uid, users.name
ORDER BY Total

mysql> SELECT companies.cid, SUM(distance) AS total
    -> FROM users, companies, trips
    -> WHERE users.uid = trips.uid 
    -> AND users.cid = companies.cid
    -> GROUP BY companies.cid, users.cid;
