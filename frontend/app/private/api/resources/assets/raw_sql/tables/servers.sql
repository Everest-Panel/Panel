-- Devon Edwards & Trent Miller
-- Everest Panel
create table Servers (
    uuid char(36) primary key, 
    name varchar(254),
    stream_uuid char(36),
    game varchar(254),
    type varchar(254),
    version varchar(254) default null,
    build varchar(254) default null,
    creation datetime default NOW(),
    Constraint Servers_Streams_uuid Foreign Key (stream_uuid) references Streams(uuid)
)