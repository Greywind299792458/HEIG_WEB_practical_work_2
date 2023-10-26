/* ----------------------------------------------------------------------- */
drop table if exists stairs;
create table stairs(
	stairs_id int auto_increment, 
	stairs_name varchar(255) not null, 
	num_steps int not null,
	coordinates Point not null,
	is_indoor boolean not null,
	building_name varchar(255),
	starting_level int,
	rating ENUM('argh','meh','ok','wee'),
	special_feature varchar(255),
	primary key(stairs_id)
);
