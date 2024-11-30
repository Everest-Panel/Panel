docker stop everest_stream
docker rm everest_stream
docker run --name everest_stream -it -v "/var/run/docker.sock:/var/run/docker.sock" -d everest/stream:latest