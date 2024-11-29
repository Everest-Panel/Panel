#!/bin/bash

# Startup Memory
xms="-Xms${STARTUP_MEMORY:-1}G"
# Max Memory
xmx="-Xmx${MAX_MEMORY:-4}G"
# Version
version="${VERSION:-1.12.2}"
# Build
build="${BUILD:-1620}"
# Link
link="https://api.papermc.io/v2/projects/paper/versions/${version}/builds/${build}/downloads/paper-${version}-${build}.jar"

if ! [ -f "/server/server.jar" ]; then
    curl --output /server/server.jar $link
fi

java $xms $xmx -XX:+DisableExplicitGC -Dterminal.jline=false -Dterminal.ansi=true -jar /server/server.jar nogui