# PHP
Install PHP:
```shell
$ sudo add-apt-repository -y ppa:ondrej/php
$ sudo apt update
$ sudo apt install php7.4
```
Change version PHP:
```shell
$ sudo update-alternatives --config php
```
# MySQL
Connect as 'adminusername' to your MySQL server:
```shell
$ mysql -u 'adminusername' -p
```
Create the database:
```shell
> CREATE DATABASE 'databasename' COLLATE utf8mb4_general_ci;
```
Show all database:
```shell
> SHOW DATABASES;
```
Delete the database:
```shell
> DROP DATABASE 'databasename';
```
# Docker
Build the container image:
```shell
docker build -t getting-started .
```
Start container:
```shell
docker run -dp 3000:3000 getting-started
```
Or create a volume:
```shell
docker volume create todo-db
```
And start container with volume:
```shell
docker run -dp 3000:3000 -v todo-db:/etc/todos getting-started
```
Get the ID of the container:
```shell
docker ps
```
Stop and remove a container:
```shell
docker rm -f <the-container-id>
```
Create a new repo at DockerHub:
```shell
- Click the Create Repository button,
- For the repo name, use getting-started. Make sure the Visibility is Public,
- Click the Create button!
```
Rename image with your Docker ID:
```shell
docker tag getting-started YOUR-USER-NAME/getting-started
```
Push command:
```shell
docker push YOUR-USER-NAME/getting-started
```
To run our container to support a development workflow:
```shell
docker run -dp 3000:3000 \
     -w /app -v "$(pwd):/app" \
     node:12-alpine \
     sh -c "yarn install && yarn run dev"
```
Create dump DB:
```shell
docker exec -it crs_mysql bash

mysqldump -p -u root wp > wp.sql
```
# Docker-compose
Build image using the docker-compose.yml:
```shell
docker-compose build
```
Start up the application stack using the docker-compose.yml:
```shell
docker-compose up -d
docker-compose up --build
```
To tear it all down:
```shell
docker-compose down
```
Removing all images:
```shell
docker images -a
docker rmi $(docker images -a -q)
```
Removing all containers:
```shell
docker ps -a
docker rm $(docker ps -a -q)
```
# Stop Apache2:
```shell
sudo service apache2 stop
```
# Laravel
If you're developing on Linux and Docker is already installed, 
you can use a simple terminal command to create 
a new Laravel project. For example, to create 
a new Laravel application in a directory named "example-app", 
you may run the following command in your terminal:
```bash
curl -s https://laravel.build/example-app | bash
```
After the project has been created, you can navigate 
to the application directory and start Laravel Sail. 
Laravel Sail provides a simple command-line interface 
for interacting with Laravel's default Docker configuration:
```bash
cd example-app
./vendor/bin/sail up
```
