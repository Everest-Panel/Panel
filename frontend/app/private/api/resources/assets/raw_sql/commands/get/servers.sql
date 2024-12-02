-- Devon Edwards & Trent Miller
-- Everest Panel
SELECT
    Ports.uuid AS "port_uuid",
    Ports.prot AS "port_prot",
    Ports.port AS "port_port",
    Streams.uuid AS "stream_uuid", 
    Streams.name AS "stream_name",
    Servers.uuid AS "server_uuid" 
    Servers.name AS "server_name" 
    
FROM
    Ports 

INNER JOIN 
    Streams 
ON
    Streams.uuid = Ports.stream_uuid 

INNER JOIN 
    Servers 
ON
    Servers.uuid = Ports.server_uuid 

WHERE 
    Streams.token = "[STREAM_TOKEN]"
