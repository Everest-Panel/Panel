#!/bin/bash


if [ ! -f /stream/installed ]; then
    7z a /bak.7z /stream
    rm -r /stream/*
    mv /setup/* /stream
    mv /bak.7z /stream
    touch /stream/installed
fi

/stream/env/bin/python3 /stream/stream.py

while [ true ]; do
    sleep 1;
done