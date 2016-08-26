-- Lisää INSERT INTO lauseet tähän tiedostoon
INSERT INTO Customer (name, password) VALUES ('matti', 'matti123');
INSERT INTO Customer (name, password) VALUES ('op','op123');
INSERT INTO Vendor (name, password, invitation) VALUES ('Jouni', 'ÄKÄSLOMPOLO', 5);
INSERT INTO Vendor (name, password, invitation) VALUES ('Vesa Keskinen', 'Tuuri', 6);
INSERT INTO Reviews (name, description, shop, grade) VALUES ('Huono', 'Surkea asiakaspalvelu', 'Prisma', 1);
INSERT INTO Reviews (name, description, shop, grade) VALUES ('Hyvä', 'Hyvä asiakaspalvelu', 'Alepa', 4);

INSERT INTO Product (name, description, published, publisher, category, expirationdate, price) VALUES ('Olvi', 'Lager -olut', '1800-11-11', 'Iisalmen panimo',  'olut', '2017-11-11', '2');  
INSERT INTO Product (name, description, published, publisher, category, expirationdate, price) VALUES ('Karhu', 'Lager -olut', '1500-11-11', 'Stadin panimo',  'olut', '2017-11-11', '1');  
INSERT INTO Product (name, description, published, publisher, category, expirationdate,  price) VALUES ('Lapin Kulta', 'Lager -olut', '1700-11-11', 'Hartwall', 'olut', '2017-11-11', '1');  
INSERT INTO Product (name, description, published, publisher, category, expirationdate, price) VALUES ('Sandels', 'Lager -olut', '1800-11-11', 'Sinebrykoff', 'olut', '2017-11-11', '2');  

INSERT INTO Grocery (name, address, phone, mail, openinhours) VALUES ('Citymarket', 'Rantaharju', '0503024420', 'citymarket@kesko.fi', '08:00-22:00');
INSERT INTO Grocery (name, address, phone, mail, openinhours) VALUES ('Prisma', 'Iso omena', '050305555', 'sryhma@.fi', '08:00-22:00');
INSERT INTO Grocery (name, address, phone, mail, openinhours) VALUES ('Lidl', 'Otaniem', '050303333', 'onhalpa@lidl.fi', '08:00-22:00');
INSERT INTO Grocery (name, address, phone, mail, openinhours) VALUES ('K-market', 'Jokela', '0503024420', 'kmarket@kesko.fi', '08:00-22:00');


