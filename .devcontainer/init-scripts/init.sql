/* ----------------------------------------------------------------------- */
drop table if exists stairs;
create table stairs(
	id smallint auto_increment, 
	stairs_name varchar(255) not null, 
	num_steps int not null,
	is_indoor boolean not null,
	building_name varchar(255),
	starting_level varchar(255) not null,
	special_feature varchar(255),
	primary key(id)
);
drop table if exists accident;
create table accident(
	id smallint auto_increment,
	event_description varchar(255),
	destroyed_ego boolean not null,
	spilled_drink boolean not null,
	event_date datetime not null,
	noclip boolean not null,
	stairs_id smallint not null,
	primary key(id),
	constraint fk_stairs
    foreign key(stairs_id) 
        references stairs(id)
);