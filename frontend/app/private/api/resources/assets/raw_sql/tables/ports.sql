-- Devon Edwards & Trent Miller
-- Everest Panel
create table Ports (
    uuid char(36) primary key,
    stream_uid char(36),
    server_uid char(36),
    port int,
    prot char(3),
    constraint Ports_Streams_uuid foreign key (stream_uuid) references Streams(uuid),
    constraint Ports_Servers_uuid foreign key (server_uuid) references Servers(uuid)
)