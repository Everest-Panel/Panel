-- Devon Edwards & Trent Miller
-- Everest Panel
create table Server_Grants (
    uuid char(36) primary key,
    user_uuid char(36),
    server_uuid char(36),
    constraint Server_Grants_Users_uuid foreign key (user_uuid) references Users(uuid),
    constraint Server_Grants_Servers_uuid foreign key (server_uuid) references Servers(uuid)
)