-- Lisää CREATE TABLE lauseet tähän tiedostoon
CREATE TABLE Customer(
  id SERIAL PRIMARY KEY, -- SERIAL tyyppinen pääavain pitää huolen, että tauluun lisätyllä rivillä on aina uniikki pääavain. Kätevää!
  name varchar(50) NOT NULL, -- Muista erottaa sarakkeiden määrittelyt pilkulla!
  password varchar(50) NOT NULL
);

CREATE TABLE Vendor(
  id SERIAL PRIMARY KEY, -- SERIAL tyyppinen pääavain pitää huolen, että tauluun lisätyllä rivillä on aina uniikki pääavain. Kätevää!
  name varchar(50) NOT NULL, -- Muista erottaa sarakkeiden määrittelyt pilkulla!
  password varchar(50) NOT NULL,
  invitation int

);
CREATE TABLE Product(
  id SERIAL PRIMARY KEY,
  product_id INTEGER REFERENCES Customer(id), -- Viiteavain Customer-tauluun
  name varchar(50) NOT NULL,
  purchased boolean DEFAULT FALSE,
  description varchar(400),
  expirationdate DATE,
  published DATE,
  publisher varchar(50),
  category varchar(50),
  price Integer
);

CREATE TABLE Grocery(
  id SERIAL PRIMARY KEY,
  customer_id INTEGER REFERENCES Customer(id), -- Viiteavain Customer-tauluun
  name varchar(50) NOT NULL,
  address varchar(50) NOT NULL,
  phone varchar(50),
  mail varchar(50),
  openinhours varchar(50)
);
