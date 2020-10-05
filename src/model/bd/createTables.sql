use donations;
create table doacao (
id int AUTO_INCREMENT primary key,
valor int NOT NULL,
data_cadastro TIMESTAMP NOT NULL DEFAULT NOW()
) ENGINE=InnoDB;

create table doador (
id int AUTO_INCREMENT primary key,
nome varchar(255),
cpf varchar(255),
email varchar(255),
telefone varchar(255),
data_nascimento date,
data_criacao TIMESTAMP NOT NULL DEFAULT NOW(),
status boolean,
endereco varchar(255)
) ENGINE=InnoDB;

create table forma_pagamento(
id int AUTO_INCREMENT primary key,
nome varchar(255),
status boolean,
data_criacao TIMESTAMP NOT NULL DEFAULT NOW()
) ENGINE=InnoDB;

create table doador_doacao(
id int AUTO_INCREMENT primary key,
id_doador int(11),
id_doacao int(11),
id_forma_pagamento int(11),
status boolean,
data_criacao TIMESTAMP NOT NULL DEFAULT NOW(),
foreign key (id_doador) references doador(id),
foreign key (id_doacao) references doacao(id),
foreign key (id_forma_pagamento) references forma_pagamento(id)
) ENGINE=InnoDB;