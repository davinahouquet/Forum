CREATE TABLE user(
   id_user INT NOT NULL AUTO_INCREMENT,
   pseudo VARCHAR(15) NOT NULL,
   role VARCHAR(20),
   email VARCHAR(25) NOT NULL,
   password VARCHAR(225) NOT NULL,
   registerDate DATE NOT NULL,
   PRIMARY KEY(id_user)
);

CREATE TABLE category(
   id_category INT NOT NULL AUTO_INCREMENT,
   categoryName VARCHAR(50) NOT NULL,
   PRIMARY KEY(id_category)
);

CREATE TABLE topic(
   id_topic INT NOT NULL AUTO_INCREMENT,
   locked TINYINT,
   name VARCHAR(50) NOT NULL,
   title VARCHAR(20) NOT NULL,
   creationDate DATE NOT NULL,
   id_category INT NOT NULL,
   id_user INT NOT NULL,
   PRIMARY KEY(id_topic),
   FOREIGN KEY(category_id) REFERENCES category(id_category),
   FOREIGN KEY(user_id) REFERENCES user(id_user)
);

CREATE TABLE post(
   id_post INT NOT NULL AUTO_INCREMENT,
   content TEXT NOT NULL,
   creationDate DATE NOT NULL,
   id_user INT NOT NULL,
   id_topic INT NOT NULL,
   PRIMARY KEY(id_post),
   FOREIGN KEY(user_id) REFERENCES user(id_user),
   FOREIGN KEY(topic_id) REFERENCES topic(id_topic)
);


INSERT INTO category(id_category, categoryName) VALUES ('1', 'Sport');
INSERT INTO category(id_category, categoryName) VALUES ('2', 'Nature');
INSERT INTO category(id_category, categoryName) VALUES ('3', 'Animaux');
INSERT INTO category(id_category, categoryName) VALUES ('4', 'Cuisine');
INSERT INTO category(id_category, categoryName) VALUES ('5', 'Cinéma');

INSERT INTO user(id_user, username, ROLE, email, PASSWORD, registerDate) VALUES ('2', 'Jenna', 'user', 'jenna@hotmail.fr', '123', '2023-09-06');
INSERT INTO user(id_user, username, ROLE, email, PASSWORD, registerDate) VALUES ('3', 'Chloe', 'user', 'chloe@hotmail.fr', '123', '2023-09-06');
INSERT INTO user(id_user, username, ROLE, email, PASSWORD, registerDate) VALUES ('4', 'Mike', 'user', 'mike@hotmail.fr', '123', '2023-09-06');
INSERT INTO user(id_user, username, ROLE, email, PASSWORD, registerDate) VALUES ('5', 'Heloise', 'user', 'heloise@hotmail.fr', '123', '2023-09-06');

INSERT INTO topic (id_topic, LOCKED, NAME, title, creationDate, category_id, user_id) VALUES ('2', '0', 'Champignons', 'Quels champignons sont les meilleurs?', '2023-09-06', '2', '5');
INSERT INTO topic (id_topic, LOCKED, NAME, title, creationDate, category_id, user_id) VALUES ('3', '0', 'Menthe', 'La menthe à des fins thérapeutiques', '2023-09-06', '2', '4');