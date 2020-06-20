create database idea_bank;
use idea_bank;



create table user(user_id int primary key auto_increment,
				   name varchar(50) unique not null,
				   MWpoints int,
				   password varchar(250) not null);



create table post(post_id varchar(200)  not null primary key, 
		name varchar(50), 
		current_status varchar(30),
		post_creation_time datetime,
		post_text text,
		type varchar(20),
		post_heading text,
		foreign key(name) references user(name));


create table comment(comment_id varchar(200) not null primary key, 
			comment_content text,
			name varchar(50) , 
			post_id varchar(200),
			foreign key(name) references user(name));



create table contributors(post_id varchar(200),
						  c_name varchar(50),
						  contribution int,
						  foreign key(c_name) references user(name),
						  foreign key(post_id) references post(post_id),
						  primary key(post_id,c_name));


-- insert into user values (2,"gsingh",1000,"123");
