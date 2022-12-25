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
        'admin',
        'admin@gmail.com',
        '$2y$10$NvWves86xxb3LylAxZ2AD.fE6u71bHCt8EfJQH.b53vEnzIVrKz7G'
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

CREATE TABLE IF NOT EXISTS commande(
    id_client INT,
    id_product INT,
    creation_date  DATETIME DEFAULT CURRENT_TIMESTAMP,
    sent_date  DATETIME DEFAULT CURRENT_TIMESTAMP,
    delivery_date  DATETIME DEFAULT CURRENT_TIMESTAMP,
    state VARCHAR(20) 
    Foreign Key (id_client) REFERENCES client(id) ON DELETE SET NULL,
    Foreign Key (id_product) REFERENCES product(id) ON DELETE SET NULL
);
