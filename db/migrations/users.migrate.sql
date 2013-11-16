create table if not exists users(
  id int not null primary key auto_increment,
  name varchar(50),
  last_name varchar(50),
  username varchar(25),
  password varchar(100),
  email varchar(30),
  gender varchar(1),
  city varchar(40),
  relationship_status varchar(30),
  birthday date,
  status char(1),
  created_at datetime,
  updated_at datetime
);
