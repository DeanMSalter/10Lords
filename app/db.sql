CREATE TABLE landlord (
  landlord_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  fname VARCHAR(50) NOT NULL,
  lname VARCHAR(50) NOT NULL,
  email VARCHAR(50) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL,
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE tenant (
  tenant_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  fname VARCHAR(50) NOT NULL,
  lname VARCHAR(50) NOT NULL,
  email VARCHAR(50) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL,
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE property (
  property_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  landlord_id int NOT NULL,
  property_name VARCHAR(255) NOT NULL,
);

CREATE TABLE occupant (
  occupant_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  property_id int NOT NULL,
  tenant_id int NOT NULL UNIQUE
);

CREATE TABLE chat (
  chat_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  property_id int NOT NULL,
  message VARCHAR(255) NOT NULL
);

CREATE TABLE images (
  id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  image VARCHAR(100) NOT NULL,
  image_text TEXT NOT NULL
);

SELECT occupant.occupant_id, tenant.fname, tenant.lname FROM Ocupant INNER JOIN tenant ON occupant.tenant_id = tenant.tenant_id where property_id = '$prop_id';

GRANT ALL PRIVILEGES ON mydb.* TO 'root'@'localhost' IDENTIFIED BY 'root';
