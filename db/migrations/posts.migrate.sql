create table if not exists posts(
  id int not null primary key auto_increment,
  from_user_id INT NOT NULL,
  to_user_id  INT NOT NULL,  
  content varchar(250),
  created_at datetime,
  updated_at datetime
);
