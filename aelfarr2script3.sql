SHOW DATABASES;
USE aelfarr2assign2db;


-- Query 1

SELECT courseName FROM WesternUniversityCourses;

-- Query 2

SELECT DISTINCT (courseCode) FROM OtherCourses;

-- Query 3

SELECT * FROM WesternUniversityCourses ORDER BY courseName ASC;

-- Query 4

SELECT westernCourseCode, courseName
FROM WesternUniversityCourses WHERE weight="0.5";

-- Query 5

SELECT courseCode, otherCourseName
FROM OtherCourses, OtherUniversity
WHERE OtherUniversity.uniID = OtherCourses.uniID
AND OtherUniversity.nameofUniversity = "University Of Toronto";

-- Query 6

SELECT otherCourseName, abbreviation
FROM OtherCourses, OtherUniversity
WHERE OtherCourses.uniID = OtherUniversity.uniID
AND otherCourseName LIKE "%Introduction%";

-- Query 7

SELECT otherCourseName, abbreviation, courseName, dateStamp
FROM OtherCourses, OtherUniversity, WesternUniversityCourses, equivalence
WHERE OtherUniversity.uniID = OtherCourses.uniID
AND equivalence.uniID = OtherCourses.uniID
AND equivalence.courseCode = OtherCourses.courseCode
AND equivalence.dateStamp > DATE_SUB(CURDATE(), INTERVAL 5 YEAR)
AND equivalence.westernCourseCode = WesternUniversityCourses.westernCourseCode;


-- Query 8

SELECT otherCourseName, abbreviation
FROM OtherCourses, OtherUniversity, equivalence
WHERE equivalence.westernCourseCode = "cs1026"
AND OtherCourses.uniID = OtherUniversity.uniID
AND equivalence.uniID = OtherCourses.uniID
AND equivalence.courseCode = OtherCourses.courseCode;

-- Query 9

SELECT count(*) FROM OtherCourses, equivalence
WHERE equivalence.westernCourseCode="cs1026"
AND equivalence.courseCode = OtherCourses.courseCode
AND equivalence.uniID = OtherCourses.uniID;

-- Query 10

SELECT courseName, otherCourseName, abbreviation
FROM WesternUniversityCourses, OtherCourses, equivalence, OtherUniversity
WHERE equivalence.uniID = OtherCourses.uniID
AND equivalence.courseCode = OtherCourses.courseCode
AND OtherUniversity.uniID = OtherCourses.uniID
AND OtherUniversity.city = "Waterloo"
AND OtherUniversity.province = "ON"
AND WesternUniversityCourses.westernCourseCode = equivalence.westernCourseCode;

-- Query 11

SELECT Distinct(nameofUniversity)
FROM OtherUniversity, equivalence
WHERE OtherUniversity.uniID NOT IN (SELECT uniID FROM equivalence);

-- Query 12

SELECT DISTINCT courseName, WesternUniversityCourses.westernCourseCode
FROM WesternUniversityCourses, OtherCourses, equivalence
WHERE OtherCourses.courseYear="3" OR OtherCourses.courseYear = "4"
AND equivalence.uniID = OtherCourses.uniID
AND equivalence.courseCode = OtherCourses.courseCode
AND WesternUniversityCourses.westernCourseCode = equivalence.westernCourseCode;

-- Query 13

SELECT courseName
FROM WesternUniversityCourses, equivalence
WHERE WesternUniversityCourses.westernCourseCode = equivalence.westernCourseCode
GROUP BY WesternUniversityCourses.courseName HAVING Count(*) > 1;

-- Query 14
SELECT
WesternUniversityCourses.westernCourseCode AS "Western Course Number",
WesternUniversityCourses.courseName AS "Western Course Name",
WesternUniversityCourses.weight AS "Course Weight",
OtherCourses.otherCourseName AS "Other University Course Name",
OtherUniversity.nameofUniversity AS "University Name",
OtherCourses.weight AS "Other Course Weight"
FROM OtherCourses, equivalence, WesternUniversityCourses, OtherUniversity
WHERE WesternUniversityCourses.westernCourseCode = equivalence.westernCourseCode
AND equivalence.courseCode = OtherCourses.courseCode
AND equivalence.uniID = OtherCourses.uniID
AND OtherCourses.uniID = OtherUniversity.uniID
AND WesternUniversityCourses.weight != OtherCourses.weight;

