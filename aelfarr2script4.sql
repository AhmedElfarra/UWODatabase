USE aelfarr2assign2db;

CREATE VIEW viewCourses
AS SELECT oC.otherCourseName, o.nameofUniversity, o.abbreviation, o.city, w.courseName
FROM OtherUniversity o, OtherCourses oC, equivalence e, WesternUniversityCourses w
WHERE w.westernCourseCode = e.westernCourseCode
AND w.westernCourseCode = oC.courseCode AND e.uniID = oC.uniID
AND oC.uniID = o.uniID AND oC.courseYear = "1";

SELECT * FROM viewCourses;
SELECT * FROM view WHERE abbreviation="UofT" ORDER BY WesternUniversityCourses.courseName;

SELECT * FROM OtherUniversity;
DELETE FROM OtherUniversity WHERE abbreviation LIKE "%cord%";
SELECT * FROM OtherUniversity;
DELETE FROM OtherUniversity WHERE WesternUniversityCourses.westernCourseCode = "cs0020";
--  Cannot be deleted because of Foreign key constraint
SELECT * FROM OtherUniversity;

SELECT *
FROM OtherCourses, OtherUniversity WHERE OtherUniversity.uniID = OtherCourses.uniID;
DELETE OtherCourses FROM OtherCourses INNER JOIN OtherUniversity ON OtherCourses.uniID = OtherUniversity.uniID
WHERE OtherUniversity.city="Waterloo";
SELECT * FROM OtherCourses, OtherUniversity WHERE OtherUniversity.uniID = OtherCourses.uniID;

SELECT * FROM viewCourses;

