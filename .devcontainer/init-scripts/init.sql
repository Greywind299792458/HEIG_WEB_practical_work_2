/* ----------------------------------------------------------------------- */
drop table if exists stairs;
create table stairs(
	stairs_id int auto_increment, 
	stairs_name varchar(255) not null, 
	num_steps int not null,
	primary key(stairs_id)
);

insert into stairs(stairs_name, num_steps)
values
    ('HEIG-main stairs',23),
    ('HEIG-upper levels',11),
    ('HEIG-lower levels',18),
	('HEIG-lower levels version 2',20),
	('HEIG-bus stop',25),
	('HEIG-near cafeteria',19);