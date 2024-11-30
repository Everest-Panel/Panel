create table Streams (
    uid char(13) primary key, 
    token char(96), 
    last_poll datetime, 
    name varchar(254)
)