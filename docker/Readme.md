# Build the container image:
```shell
docker build -t getting-started .
```
# Start container:
```shell
docker run -dp 3000:3000 getting-started
```
# Or create a volume:
```shell
docker volume create todo-db
```
# And start container with volume:
```shell
docker run -dp 3000:3000 -v todo-db:/etc/todos getting-started
```
# Get the ID of the container:
```shell
docker ps
```
# Stop and remove a container:
```shell
docker rm -f <the-container-id>
```
# Create a new repo at DockerHub:
```shell
- Click the Create Repository button,
- For the repo name, use getting-started. Make sure the Visibility is Public,
- Click the Create button!
```
# Rename image with your Docker ID:
```shell
docker tag getting-started YOUR-USER-NAME/getting-started
```
# Push command:
```shell
docker push YOUR-USER-NAME/getting-started
```
# To run our container to support a development workflow:
```shell
docker run -dp 3000:3000 \
     -w /app -v "$(pwd):/app" \
     node:12-alpine \
     sh -c "yarn install && yarn run dev"
```
# Build image using the docker-compose.yml:
```shell
docker-compose build
docker-compose up --build
```
# Start up the application stack using the docker-compose.yml:
```shell
docker-compose up -d
```
# To tear it all down:
```shell
docker-compose down
```
# Removing all images
````
docker images -a
docker rmi $(docker images -a -q)
````
# Removing all containers
````
docker ps -a
docker rm $(docker ps -a -q)
````