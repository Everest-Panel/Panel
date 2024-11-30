create table Server_Grants (
    uid char(13) primary key,
    user_uid char(13),
    server_uid char(13),
    constraint Server_Grants_Users_uid foreign key (user_uid) references Users(uid),
    constraint Server_Grants_Servers_uid foreign key (server_uid) references Servers(uid)
)