/* ----------------------------------------------------------------------- */
drop table if exists stairs;
create table stairs(
	stairs_id int auto_increment, 
	stairs_name varchar(255) not null, 
	num_steps int not null,
	coordinates Point,
	is_indoor boolean not null,
	building_name varchar(255),
	starting_level varchar(255) not null,
	rating ENUM('le pire','bof','meh','epic') not null,
	special_feature varchar(255),
	primary key(stairs_id)
);
