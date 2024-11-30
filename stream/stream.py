#!/bin/env

import docker, requests, os, json

client = docker.DockerClient(base_url="unix:///var/run/docker.sock")

token = os.getenv("TOKEN")
site = os.getenv("SITE")

for container in client.containers.list():
    print(container.name)
