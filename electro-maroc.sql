CREATE DATABASE IF NOT EXISTS electro_maroc;

USE electro_maroc;

CREATE TABLE IF NOT EXISTS admin(
    username VARCHAR(255) PRIMARY KEY,
    email VARCHAR(255),
    password VARCHAR(255)
);

INSERT INTO
    admin
VALUES
    (
        'nissay',
        'admin@gmail.com',
        '$2y$10$XX5EDjJ7PCVyaX7HIwPAJ.cFCykThrVidOCoji.NJ86uVxidLR/Ea'
    );

CREATE Table IF NOT EXISTS client (
    id int PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(255),
    email VARCHAR(255),
    password VARCHAR(255),
    tel VARCHAR(10),
    adress VARCHAR(255),
    ville VARCHAR(50)
    
);

CREATE TABLE IF NOT EXISTS category (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255),
    img VARCHAR(255),
    description VARCHAR(500)
);


INSERT INTO category (name, description) VALUES ('Computers', 'This is computers category') ;
INSERT INTO category (name, description) VALUES ('Tablets', 'This is tablets category') ;
INSERT INTO category (name, description) VALUES ('Phone', 'This is computers category') ;
INSERT INTO category (name, description) VALUES ('Accessoirs', 'This is Accessoirs category'); 
INSERT INTO category (name, description) VALUES ('Cameras', 'This is cameras category') ;
INSERT INTO category (name, description) VALUES ('Consoles', 'This is Consoles category') ;

CREATE TABLE IF NOT EXISTS product(
    id int PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255),
    img VARCHAR(255),
    code_bar VARCHAR(255),
    buyPrice DECIMAL,
    finalPrice DECIMAL,
    offrePrice DECIMAL,
    id_cat int ,
    FOREIGN KEY (id_cat) REFERENCES category(id) ON DELETE SET NULL
);
ALTER table product add COLUMN qte INT AFTER offrePrice;

CREATE TABLE IF NOT EXISTS commande(
    id_client INT,
    id_product INT,
    creation_date  DATETIME DEFAULT CURRENT_TIMESTAMP,
    sent_date  DATETIME DEFAULT CURRENT_TIMESTAMP,
    delivery_date  DATETIME DEFAULT CURRENT_TIMESTAMP,
    state ENUM('On Hold', 'Confirmed', 'Delivered', 'Canceled'),
    Foreign Key (id_client) REFERENCES client(id) ON DELETE SET NULL,
    Foreign Key (id_product) REFERENCES product(id) ON DELETE SET NULL
);
