## To Run Project

- clone repository to the folder

- go inside folder `cd <your_folder_with_project>`

- run command `cp .env.example .env`

- set next variables

APP_URL= change <type_host_here>

DB_USERNAME=

DB_PASSWORD=

DOCKER_HOST_PORT=80 in case that port is occupied already change it

- add to the /etc/hosts APP_URL (only the <type_host_here>)

<type_host_here> = mytest.loc

**/etc/hosts**

127.0.0.1 mytest.loc www.mytest.loc

- run `docker-compose up -d`

- run `docker exec -it d-app bash`

- run `php artisan key:generate`

- run `php artisan migrate --seed`

- open in your browser APP_URL link (with defined port)

- to see Users press link Users (top right corner)

## Checklist

- import users NOT
- database YES
- select users YES
- select per page option YES
- pagination YES
- department with users YES
- 404 page presents "from the box"
