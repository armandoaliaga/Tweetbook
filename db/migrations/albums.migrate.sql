create table if not exists albums(
    id             INT not null primary key            AUTO_INCREMENT,
    user_id        INT            NOT NULL,
    name           VARCHAR(25)    NOT NULL,
    description    VARCHAR(50),
    created_at datetime,
    updated_at datetime
);
