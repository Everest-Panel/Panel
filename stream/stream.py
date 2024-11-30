#!/bin/env

import docker, requests, os, json, time, signal # type: ignore

class GracefulKiller:
  kill_now = False
  def __init__(self):
    signal.signal(signal.SIGINT, self.exit_gracefully)
    signal.signal(signal.SIGTERM, self.exit_gracefully)

  def exit_gracefully(self, signum, frame):
    self.kill_now = True


if __name__ == "__main__":

    killer = GracefulKiller()

    client = docker.DockerClient(base_url="unix:///var/run/docker.sock")    
    token = os.getenv("TOKEN")
    site = os.getenv("SITE")

    while killer.kill_now != True:

        print("Collecting Containers...")
        for container in client.containers.list():
           print(container.name)
        print(f"Collected {len(client.containers.list())} Containers...")
        time.sleep(1)
