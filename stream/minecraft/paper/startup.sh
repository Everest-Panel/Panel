#!/bin/bash

# Startup Memory
xms="-Xms${STARTUP_MEMORY:-1}G"
# Max Memory
xmx="-Xmx${MAX_MEMORY:-2}G"
# Version
version="${VERSION:-1.12.2}"
# Build
build="${BUILD:-1620}"
# Link
link="https://api.papermc.io/v2/projects/paper/versions/${version}/builds/${build}/downloads/paper-${version}-${build}.jar"

cd /server

if ! [ -f "server.jar" ]; then
    curl --output server.jar $link
fi

if ! [ -f "eula.txt" ]; then
    cp /server_files/eula.txt eula.txt
fi

java $xms $xmx -XX:+DisableExplicitGC -Dterminal.jline=false -Dterminal.ansi=true -jar server.jar nogui