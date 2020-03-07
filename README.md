# Layout Responsivo
 Page responsiva e systemade Login

# GNU GENERAL PUBLIC LICENSE
                       Version 3, 29 June 2007

 Copyright (C) 2007 Free Software Foundation, Inc. <https://fsf.org/>
 Everyone is permitted to copy and distribute verbatim copies
 of this license document, but changing it is not allowed.

Mais detalhes leia LICENSE

## uso
Para loga crie um banco de dado, com as tabela users e produto.
com estas variaves.
#### users
CREATE TABLE users(id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			       nome VARCHAR(20),
				   passwd VARCHAR(20),
				   email VARCHAR(25),
				   tipo VARCHAR(3),
				   priv INT,
				   img VARCHAR(20),
				   statu VARCHAR(10),
				   onoff VARCHAR(3))"

#### produto
CREATE TABLE produto(id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
					codigo VARCHAR(20),
                    nome VARCHAR(20),
                    tipo VARCHAR(10),
                    quant INT,
                    img VARCHAR(20),
                    statu VARCHAR(10),
                    scu VARCHAR(20));