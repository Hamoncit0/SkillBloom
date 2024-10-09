CREATE DATABASE db_SkillBloom;

USE DATABASE db_SkillBloom;

CREATE TABLE rol (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(20) NOT NULL UNIQUE,
    description VARCHAR(255),
    createdAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE user (
    id INT AUTO_INCREMENT PRIMARY KEY,
    firstName VARCHAR(50) NOT NULL,
    lastName VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL UNIQUE,
    gender ENUM('m', 'f', 'o') NOT NULL,
    password VARCHAR(20) NOT NULL,
    birthdate DATE NOT NULL,
    pfpPath VARCHAR(255),
    idRol INT NOT NULL,
    status ENUM(
        'blocked',
        'active',
        'deleted'
    ) DEFAULT 'active',
    createdAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updatedAt TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deletedAt TIMESTAMP,
    FOREIGN KEY (idRol) REFERENCES rol (id)
);

CREATE TABLE category (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(20) NOT NULL UNIQUE,
    description VARCHAR(255),
    createdAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updatedAt TIMESTAMP,
    deletedAt TIMESTAMP
);

CREATE TABLE course (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    description TEXT NOT NULL,
    previewImagePath VARCHAR(255) NOT NULL,
    previewVideoPath VARCHAR(255) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    createdAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updatedAt TIMESTAMP,
    deletedAt TIMESTAMP,
    idCategory INT NOT NULL,
    idInstructor INT NOT NULL,
    FOREIGN KEY (idCategory) REFERENCES category (id),
    FOREIGN KEY (idInstructor) REFERENCES user (id)
);

CREATE TABLE level (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    description TEXT NOT NULL,
    contentPath VARCHAR(255) NOT NULL,
    createdAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updatedAt TIMESTAMP,
    deletedAt TIMESTAMP
);

CREATE TABLE course_level (
    id INT AUTO_INCREMENT PRIMARY KEY,
    idCourse INT NOT NULL,
    idLevel INT NOT NULL,
    levelOrder INT NOT NULL,
    FOREIGN KEY (idCourse) REFERENCES course (id) ON DELETE CASCADE,
    FOREIGN KEY (idLevel) REFERENCES level (id) ON DELETE CASCADE
);

CREATE TABLE review (
    id INT AUTO_INCREMENT PRIMARY KEY,
    idUser INT,
    idCourse INT,
    review TEXT,
    rating TINYINT NOT NULL,
    CHECK (
        rating >= 0
        AND rating <= 5
    ),
    createdAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    deletedAt TIMESTAMP,
    FOREIGN KEY (idUser) REFERENCES user (id),
    FOREIGN KEY (idCourse) REFERENCES course (id)
);

CREATE TABLE kardex (
    id INT AUTO_INCREMENT PRIMARY KEY,
    enrolledAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    lastEntry TIMESTAMP,
    endDate TIMESTAMP,
    status ENUM(
        'uninitiated',
        'in progress',
        'finished'
    ) NOT NULL DEFAULT 'uninitiated',
    progress DECIMAL(5, 2) DEFAULT 0.00,
    idUser INT,
    idCourse INT,
    lastLevel INT,
    FOREIGN KEY (idUser) REFERENCES user (id) ON DELETE CASCADE,
    FOREIGN KEY (idCourse) REFERENCES course (id) ON DELETE CASCADE,
    FOREIGN KEY (lastLevel) REFERENCES level (id) ON DELETE SET NULL
);

CREATE TABLE chat (
    id INT AUTO_INCREMENT PRIMARY KEY,
    idUser1 INT NOT NULL,
    idUser2 INT NOT NULL,
    createdAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (idUser1) REFERENCES user (id) ON DELETE CASCADE,
    FOREIGN KEY (idUser2) REFERENCES user (id) ON DELETE CASCADE,
    UNIQUE (idUser1, idUser2)
);

CREATE TABLE messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    idChat INT NOT NULL,
    idSender INT NOT NULL,
    content TEXT NOT NULL,
    createdAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (idChat) REFERENCES chat (id) ON DELETE CASCADE,
    FOREIGN KEY (idSender) REFERENCES user (id) ON DELETE CASCADE
)

CREATE TABLE payment_method (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL UNIQUE,
    description VARCHAR(255),
    createdAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE sale (
    id INT AUTO_INCREMENT PRIMARY KEY,
    idUser INT NOT NULL, -- Usuario que realiza la compra
    total DECIMAL(10, 2) NOT NULL, -- Total de la venta
    createdAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    idPaymentMethod INT,
    FOREIGN KEY (idUser) REFERENCES user (id) ON DELETE CASCADE,
    FOREIGN KEY (idPaymentMethod) REFERENCES payment_method (id) ON DELETE CASCADE
);

CREATE TABLE sale_detail (
    id INT AUTO_INCREMENT PRIMARY KEY,
    idSale INT NOT NULL,
    idCourse INT NOT NULL, -- Curso que se compró
    price DECIMAL(10, 2) NOT NULL, -- Precio del curso en el momento de la compra
    FOREIGN KEY (idSale) REFERENCES sale (id) ON DELETE CASCADE,
    FOREIGN KEY (idCourse) REFERENCES course (id) ON DELETE CASCADE
);