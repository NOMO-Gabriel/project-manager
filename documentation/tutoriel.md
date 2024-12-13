## install mysql with docker

    ```bash
       docker run --name mysql-container -e MYSQL_ALLOW_EMPTY_PASSWORD=yes -e MYSQL_DATABASE=project_manager -p 3305:3306 -d mysql:latest

    ```
## verify
    ```bash
        docker ps
    ```

### run he database
    ```bash

        docker exec -it mysql-container mysql 
    ```
### 

### create a user

    ```bash
        ALTER USER 'root'@'%' IDENTIFIED BY 'root';
FLUSH PRIVILEGES;
    ```

### now you can connect with command 
```bash
    docker exec -it mysql-container mysql -u root -p

```


### if database don't allow external connexion:

"ALTER USER 'root'@'%' IDENTIFIED BY 'root';
GRANT ALL PRIVILEGES ON *.* TO 'root'@'%' WITH GRANT OPTION;
FLUSH PRIVILEGES;
"


#### export database

"docker exec -i mysql-container mysqldump -u root -p --no-data jeu_medical > schema.sql
"


### to fill data into db:
"# Assuming your MySQL container is named 'mysql-container' and your database is 'jeu_medical'


#### Copy the SQL file to the container
nagigate to directory /doc/data

docker cp /fakedata.sql mysql-container:/tmp/data.sql

#### Execute the SQL file inside the container
docker exec -i mysql-container mysql -u root -p 
use jeu_medical;
source /tmp/data.sql;
