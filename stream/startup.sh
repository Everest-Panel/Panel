#!/bin/bash

trap stop_processes TERM

function stop_processes() {
    pkill -15 python3
    exit 1
}

/setup/env/bin/python3 /setup/stream.py &

while [ true ]; do
    sleep 1
done
