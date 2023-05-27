create database adet_final_project;
use adet_final_project;

create table registered_users(
    user_id int not null auto_increment,
    user_name varchar(255) not null,
    user_password text not null,
    primary key(user_id)
);