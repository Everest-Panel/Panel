#!/bin/env

import docker

client = docker.DockerClient(base_url="unix:///var/run/docker.sock")

print(client.containers.list())