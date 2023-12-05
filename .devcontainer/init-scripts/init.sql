DROP TABLE IF EXISTS stairs;
CREATE TABLE Stairs(
	id INT AUTO_INCREMENT, 
	stairs_name VARCHAR(255) NOT NULL, 
	num_steps INT NOT NULL,
	is_indoor boolean NOT NULL,
	building_name VARCHAR(255),
	starting_level VARCHAR(255) NOT NULL,
	special_feature TEXT,
	PRIMARY KEY (id)
);

DROP TABLE IF EXISTS Ratings;
CREATE TABLE Ratings (
    id INT AUTO_INCREMENT,
    stairs_id INT NOT NULL UNIQUE,
    rating enum('1', '2', '3', '4', '5') NOT NULL,
    review TEXT,
    is_favorite BOOLEAN DEFAULT false NOT NULL,
	PRIMARY KEY (id),
    FOREIGN KEY (stairs_id) REFERENCES Stairs(id)
);