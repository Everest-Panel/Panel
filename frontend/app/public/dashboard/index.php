<?php 

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Everest Panel | Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="/api/dump/?type=styles&file=default.css">
        <link rel="stylesheet" type="text/css" href="/api/dump/?type=styles&file=dashboard.css">
    </head>
    <body>
        <div id="servers">
            <div class="server">
                <div class="banner">
                    <img src="/api/dump/?type=images&file=arksurvivalevolved_banner.jpg">
                </div>
                <div class="stats">
                    <div class="stat">
                        <div class="icon">
                            <img src="/api/dump/?type=images&file=servers.png" class="icon">
                        </div>
                        <div class="text">
                            Ark Survival Evolved
                        </div>
                    </div>
                    <div class="stat">
                        <div class="icon">
                            <img src="/api/dump/?type=images&file=microchip.png" class="icon">
                        </div>
                        <div class="text">
                            <?php $statS = random_int(1, 70); echo $statS."%"?>
                        </div>
                        <div class="graph">
                            <div class="dat" style="width: <?php echo 100-$statS."%";?>"></div>
                            <div class="total"></div>
                        </div>
                    </div>
                    <div class="stat">
                        <div class="icon">
                            <img src="/api/dump/?type=images&file=memory.png" class="icon">
                        </div>
                        <div class="text">
                            <?php $statS = random_int(1, 70); $statSM = random_int($statS, 100); $statP = 100-($statS/$statSM*100); echo $statS."GiB / ".$statSM."GiB"?>
                        </div>
                        <div class="graph">
                            <div class="dat" style="width: <?php echo($statP)."%"?>;"></div>
                            <div class="total"></div>
                        </div>
                    </div>
                    <div class="stat">
                        <div class="icon">
                            <img src="/api/dump/?type=images&file=harddrive.png" class="icon">
                        </div>
                        <div class="text">
                            <?php $statS = random_int(1, 70); $statSM = random_int($statS, 100); $statP = 100-($statS/$statSM*100); echo $statS."GiB / ".$statSM."GiB"?>
                        </div>
                        <div class="graph">
                            <div class="dat" style="width: <?php echo($statP)."%"?>;"></div>
                            <div class="total"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="server">
                <div class="banner">
                    <img src="/api/dump/?type=images&file=beamng_banner.png">
                </div>
                <div class="stats">
                    <div class="stat">
                        <div class="icon">
                            <img src="/api/dump/?type=images&file=servers.png" class="icon">
                        </div>
                        <div class="text">
                            BeamNG
                        </div>
                    </div>
                    <div class="stat">
                        <div class="icon">
                            <img src="/api/dump/?type=images&file=microchip.png" class="icon">
                        </div>
                        <div class="text">
                            <?php $statS = random_int(1, 70); echo $statS."%"?>
                        </div>
                        <div class="graph">
                            <div class="dat" style="width: <?php echo($statS)."%"?>;"></div>
                            <div class="total"></div>
                        </div>
                    </div>
                    <div class="stat">
                        <div class="icon">
                            <img src="/api/dump/?type=images&file=memory.png" class="icon">
                        </div>
                        <div class="text">
                            <?php $statS = random_int(1, 70); $statSM = random_int($statS, 100); $statP = 100-($statS/$statSM*100); echo $statS."GiB / ".$statSM."GiB"?>
                        </div>
                        <div class="graph">
                            <div class="dat" style="width: <?php echo($statP)."%"?>;"></div>
                            <div class="total"></div>
                        </div>
                    </div>
                    <div class="stat">
                        <div class="icon">
                            <img src="/api/dump/?type=images&file=harddrive.png" class="icon">
                        </div>
                        <div class="text">
                            <?php $statS = random_int(1, 70); $statSM = random_int($statS, 100); $statP = 100-($statS/$statSM*100); echo $statS."GiB / ".$statSM."GiB"?>
                        </div>
                        <div class="graph">
                            <div class="dat" style="width: <?php echo($statP)."%"?>;"></div>
                            <div class="total"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="server">
                <div class="banner">
                    <img src="/api/dump/?type=images&file=factorio_banner.png">
                </div>
                <div class="stats">
                    <div class="stat">
                        <div class="icon">
                            <img src="/api/dump/?type=images&file=servers.png" class="icon">
                        </div>
                        <div class="text">
                            Factorio
                        </div>
                    </div>
                    <div class="stat">
                        <div class="icon">
                            <img src="/api/dump/?type=images&file=microchip.png" class="icon">
                        </div>
                        <div class="text">
                            90%
                        </div>
                        <div class="graph">
                            <div class="dat" style="width: 10%;"></div>
                            <div class="total"></div>
                        </div>
                    </div>
                    <div class="stat">
                        <div class="icon">
                            <img src="/api/dump/?type=images&file=memory.png" class="icon">
                        </div>
                        <div class="text">
                            4GiB / 10GiB
                        </div>
                        <div class="graph">
                            <div class="dat" style="width: 60%;"></div>
                            <div class="total"></div>
                        </div>
                    </div>
                    <div class="stat">
                        <div class="icon">
                            <img src="/api/dump/?type=images&file=harddrive.png" class="icon">
                        </div>
                        <div class="text">
                            2GiB / 10GiB
                        </div>
                        <div class="graph">
                            <div class="dat" style="width: 80%;"></div>
                            <div class="total"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="server">
                <div class="banner">
                    <img src="/api/dump/?type=images&file=minecraft_banner.jpg">
                </div>
                <div class="type">
                    Minecraft
                </div>
            </div>
            <div class="server">
                <div class="banner">
                    <img src="/api/dump/?type=images&file=satisfactory_banner.png">
                </div>
                <div class="type">
                    Satisfactory
                </div>
            </div>
            <div class="server">
                <div class="banner">
                    <img src="/api/dump/?type=images&file=spaceengineers_banner.jpg">
                </div>
                <div class="type">
                    Space Engineers
                </div>
            </div>
        </div>
    </body>
</html>