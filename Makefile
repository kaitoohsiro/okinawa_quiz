do-count:
	heroku pg:psql -c "select sum(number_of_correct)/5 from quiz_difficulty;"
play-data:
	heroku pg:psql -c "select * from quiz_difficulty;"