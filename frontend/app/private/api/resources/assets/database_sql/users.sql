create table Users (
    uid char(13) primary key, 
    username varchar(40), 
    password char(128), 
    fname varchar(254), 
    lname varchar(254), 
    email varchar(254), 
    creation datetime default now()
)