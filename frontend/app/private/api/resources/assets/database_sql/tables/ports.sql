create table Ports (
    uid char(13) primary key,
    stream_uid char(13),
    server_uid char(13),
    port int,
    prot char(3),
    constraint Ports_Streams_uid foreign key (stream_uid) references Streams(uid),
    constraint Ports_Servers_uid foreign key (server_uid) references Servers(uid)
)