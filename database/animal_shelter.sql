-- Create the Animals table
CREATE TABLE Animals (
    animal_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    species VARCHAR(255),
    breed VARCHAR(255),
    age INT,
    gender VARCHAR(50),
    description TEXT,
    image_path VARCHAR(255),
    adoption_status VARCHAR(50),
    date_added DATE
);

-- Create the Adopters table
CREATE TABLE Adopters (
    adopter_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    email VARCHAR(255),
    phone VARCHAR(20),
    address VARCHAR(255)
);

-- Create the Adoptions table
CREATE TABLE Adoptions (
    adoption_id INT AUTO_INCREMENT PRIMARY KEY,
    animal_id INT,
    adopter_id INT,
    adoption_date DATE,
    FOREIGN KEY (animal_id) REFERENCES Animals(animal_id),
    FOREIGN KEY (adopter_id) REFERENCES Adopters(adopter_id)
);
