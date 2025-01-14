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

# 8

# 9

# 10
