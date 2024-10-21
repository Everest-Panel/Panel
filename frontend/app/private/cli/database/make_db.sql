DROP TABLE Everest.Users;

CREATE TABLE Everest.Users
(
    uuid char(36) primary key, 
    fname varchar(254), 
    lname varchar(254), 
    email varchar(254),
    password char(128)
);

INSERT INTO Everest.Users (uuid, fname, lname, email, password) VALUES 
(
    "xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx",
    "Everest",
    "Panel",
    "everest.support@osbeorn.net",
    "680acd5c2015268b8f1fca4b44cfbd48bf7bd66e10d4016673f0e7dd577e02ccb4c2da3f280b8bf326fa9b0e197029cdb524e23769f9ca6ea13f93d5819d6262"
);

DROP TABLE Everest.Crests;
CREATE TABLE Everest.Crests
(
    uuid char(36) primary key,
    name varchar(254)
);

DROP TABLE Everest.Streams;
CREATE TABLE Everest.Streams
(
    uuid char(36) primary key,
    name varchar(254),
    token char(128)
);

DROP TABLE Everest.Containers;
CREATE TABLE Everest.Containers
(
    uuid char(36) primary key,
    name varchar(254)
);