#!/bin/env

import docker

client = docker.DockerClient(base_url="unix:///var/run/docker.sock")

for container in client.containers.list():
    print(container.name)