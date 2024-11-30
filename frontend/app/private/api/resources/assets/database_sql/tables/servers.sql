create table Servers (
    uid char(13) primary key, 
    name varchar(254),
    stream_uid char(13),
    Constraint Servers_Streams_uid Foreign Key (stream_uid) references Streams(uid),
    game varchar(254),
    type varchar(254),
    version varchar(254) default null,
    build varchar(254) default null,
    creation datetime default now()
)