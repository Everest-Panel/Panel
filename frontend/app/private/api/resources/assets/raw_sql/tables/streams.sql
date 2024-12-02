-- Devon Edwards & Trent Miller
-- Everest Panel
create table Streams (
    uuid char(36) primary key, 
    token char(96), 
    last_poll datetime, 
    name varchar(254)
)