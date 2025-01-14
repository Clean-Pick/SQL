# 1
# SELECT *
# FROM students

# 2
# SELECT nom
# FROM students

# 3
# SELECT prenom, nom, datenaissance, school.school
# FROM students
#          JOIN school ON students.school = school.idschool

# 4
# SELECT prenom, nom, genre
# FROM students
# WHERE genre = 'F'

# 5
# SELECT s.prenom, s.nom, sch.school
# FROM students s
#          JOIN school sch ON s.school = sch.idschool
# WHERE s.school = (SELECT school
#                   FROM students
#                   WHERE nom = 'Addy'
#                   LIMIT 1);

# 6
# SELECT prenom
# FROM students
# ORDER BY prenom DESC
# LIMIT 2

# 7
# INSERT INTO students (nom, prenom, datenaissance, genre, school)
# VALUES ('Ginette', 'Dalor', 19300101, 'F', 1);
#
# SELECT *
# FROM students
# WHERE prenom = 'Dalor';

# 8
# UPDATE students
# SET prenom = 'Omer',
#     genre  = 'M'
# WHERE prenom = 'Dalor';
#
# SELECT *
# FROM students
# WHERE nom = 'Ginette';

# 9
# DELETE
# FROM students
# WHERE idStudent = 3

# 10
# UPDATE school
# SET school = CASE
#                  WHEN idschool = 1 THEN 'Liege'
#                  WHEN idschool = 2 THEN 'Gent'
#     END
# WHERE idschool IN (1, 2);
#
# SELECT *
# FROM school;
