create table doacao (
id int AUTO_INCREMENT primary key,
valor int NOT NULL,
data_cadastro TIMESTAMP NOT NULL DEFAULT NOW()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

create table forma_pagamento(
id int AUTO_INCREMENT primary key,
nome varchar(255),
status boolean,
data_criacao TIMESTAMP NOT NULL DEFAULT NOW()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

create table doador_doacao(
id int AUTO_INCREMENT primary key,
id_doador int references doador(id),
id_doacao int references doacao(id),
id_forma_pagamento int references forma_pagamento(id),
status boolean,
data_criacao TIMESTAMP NOT NULL DEFAULT NOW()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;