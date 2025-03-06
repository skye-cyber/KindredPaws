USE KindredPaws;

CREATE TABLE Animals (
    animal_id VARCHAR(255) PRIMARY KEY,
    intake_type VARCHAR(255),
    in_date DATE,
    name VARCHAR(255),
    animal_type VARCHAR(255),
    age VARCHAR(255),
    animal_size VARCHAR(255),
    color VARCHAR(255),
    breed VARCHAR(255),
    gender VARCHAR(50),
    image_path VARCHAR(255),
    adoption_status VARCHAR(50)
);

CREATE TABLE Adopters (
    adopter_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    email VARCHAR(255),
    phone VARCHAR(20),
    address VARCHAR(255)
);

CREATE TABLE Adoptions (
    adoption_id INT AUTO_INCREMENT PRIMARY KEY,
    animal_id VARCHAR(255),
    adopter_id INT,
    adoption_date DATE,
    FOREIGN KEY (animal_id) REFERENCES Animals(animal_id),
    FOREIGN KEY (adopter_id) REFERENCES Adopters(adopter_id)
);
