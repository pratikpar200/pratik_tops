<?php
// 5. Practical Example: Multiple Tables and SQL Queries
// Ans:

echo "<h2>SQL Queries Reference</h2>";
echo "<pre><code style='background:#f4f4f4; display:block; padding:10px;'>";

$sql_content = <<<SQL
-- 1. Create Tables
CREATE TABLE students (
    id INT PRIMARY KEY,
    name VARCHAR(50),
    age INT
);

CREATE TABLE marks (
    student_id INT,
    subject VARCHAR(50),
    marks INT
);

-- 2. INSERT Data
INSERT INTO students VALUES (1, 'Rahul', 20);
INSERT INTO students VALUES (2, 'Amit', 22);

INSERT INTO marks VALUES (1, 'Math', 80);
INSERT INTO marks VALUES (2, 'Math', 90);

-- 3. SELECT Query
SELECT * FROM students;

-- 4. UPDATE Query
UPDATE students
SET age = 21
WHERE id = 1;

-- 5. DELETE Query
DELETE FROM students
WHERE id = 2;

-- 6. WHERE, AND, OR, NOT
SELECT * FROM students
WHERE age > 18 AND name = 'Rahul';

-- 7. LIKE
SELECT * FROM students
WHERE name LIKE 'R%';

-- 8. GROUP BY & HAVING
SELECT subject, AVG(marks) AS avg_marks
FROM marks
GROUP BY subject
HAVING avg_marks > 50;

-- 9. LIMIT & OFFSET
SELECT * FROM students
LIMIT 1 OFFSET 1;

-- 10. IN Operator
SELECT * FROM students
WHERE id IN (1, 2);

-- 11. Subquery
SELECT name FROM students
WHERE id IN (
    SELECT student_id FROM marks WHERE marks > 80
);
SQL;

echo htmlspecialchars($sql_content);
echo "</code></pre>";
?>
