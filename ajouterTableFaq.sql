


CREATE TABLE faq
(
  id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  id_user_question INT,
  id_user_reponse INT DEFAULT NULL,
  question VARCHAR(255),
  reponse VARCHAR(255) DEFAULT NULL,
  visible BOOLEAN DEFAULT FALSE
)
