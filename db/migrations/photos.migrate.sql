create table if not exists  photos(
    id                INT    not null primary key AUTO_INCREMENT,
    album_id          INT             NOT NULL,
    file_name         VARCHAR(250)    NOT NULL,
    file_tmp_name         VARCHAR(250),
    description       VARCHAR(100),
    file_type    VARCHAR(40)    NOT NULL,
    file_size   INT    NOT NULL,
    created_at datetime,
    updated_at datetime
);
