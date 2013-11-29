create table if not exists follows(
  id int not null primary key auto_increment,
  follower_user_id INT NOT NULL,
  followed_user_id  INT NOT NULL,    
  created_at datetime,
  updated_at datetime
);
