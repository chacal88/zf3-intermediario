#./vendor/bin/doctrine-module orm:convert-mapping --filter="(Veiculos|Clientes|Enderecos|Telefones)" --from-database --namespace='Avaliacao\Entity\'  annotation module/Avaliacao/src/Entity
#./vendor/bin/doctrine-module orm:generate:entities --filter='Avaliacao\\Entity' --generate-annotations --generate-methods -- module/Avaliacao/src/Entity

#./vendor/bin/doctrine-module orm:convert-mapping --filter="Users" --from-database --namespace='User\Entity\'  annotation module/User/src/Entity
#./vendor/bin/doctrine-module orm:generate:entities --filter='User\\Entity\\User' --generate-annotations --generate-methods -- module/User/src/Entity


./vendor/bin/doctrine-module orm:convert-mapping --filter="(WebMotors)" --from-database --namespace='Avaliacao\Entity\'  annotation module/Avaliacao/src/Entity



CREATE TABLE post ( id INTEGER PRIMARY KEY AUTOINCREMENT, title varchar(100) NOT NULL, content TEXT NOT NULL);
insert into post(title, content) values('Post 1', 'Content 1');
insert into post(title, content) values('Post 2', 'Content 2');
insert into post(title, content) values('Post 3', 'Content 3');
insert into post(title, content) values('Post 4', 'Content 4');

CREATE TABLE comments
(
  id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
  content TEXT NOT NULL,
  post_id INTEGER NOT NULL
);

insert into comments(content, post_id) values('Comentario 1', 1);
insert into comments(content, post_id) values('Comentario 2', 1);
insert into comments(content, post_id) values('Comentario 3', 2);
insert into comments(content, post_id) values('Comentario 4', 2);


CREATE TABLE users
(
 id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
 username VARCHAR (100) UNIQUE NOT NULL,
 password VARCHAR (60),
 full_name VARCHAR (150) NOT NULL
);

INSERT INTO users(username, password, full_name)
            values('kauemsc@gmail.com','$1$cnG3AVpL$jXiDyYBbY.nj.iky1Xuig.', 'Kaue Rodrigues');

CREATE TABLE veiculos
(
  id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
  placa VARCHAR(24),
  renavam VARCHAR(24),
  marca VARCHAR(24),
  modelo VARCHAR(24),
  ano VARCHAR(24),
  cor VARCHAR(24),
  doc_proprietario VARCHAR(24)
);

INSERT INTO veiculos(placa, renavam, marca, modelo, ano, cor, doc_proprietario)
values('mhs9056','12354540','Ferrari','3380','2016','Vermelha','06416206919');
