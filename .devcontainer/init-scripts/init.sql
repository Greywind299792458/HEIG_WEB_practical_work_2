/* ----------------------------------------------------------------------- */
drop table if exists Stairs;
create table stairs(
	stairs_id int auto_increment, 
	stairs_name varchar(255) not null, 
	num_steps int not null,
	primary key(stairs_id)
);