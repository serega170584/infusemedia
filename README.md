# infusemedia
infusemedia

- Deploy environment

    
        docker-compose build --no-cache && docker-compose up  

- Enter inside container

  
        docker-compose exec backend sh

- Upload database through dump file


        mysql -h db --user=root --password=secret infusemedia < dump.sql
- External host for mysql - localhost:3300, user - root, password - secret, database - infusemedia

- Visit pages http://localhost:3100/index1.html and http://localhost:3100/index2.html and we can see view_count changes in table visit.

- We can see files index1.html and index2.html inside frontend directory. banner.php and dump.sql with other code files inside backend directory.