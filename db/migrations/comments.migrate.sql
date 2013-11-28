create table if not exists comments(
  id int not null primary key auto_increment,
  post_id INT NOT NULL, 
  user_id INT NOT NULL, 
  content varchar(250),
  created_at datetime,
  updated_at datetime
);
