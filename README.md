# Esme Sweet Cake ➔ Back-end

## 💻 Site

Site disponível em: <https://guihgoncalves.github.io/InovaDevs/>

API's disponíveis em: <https://inovadevsapi.onrender.com>


## 🛠️ Construído com

PHP - Para a construção dos Endpoints.

XAMPP - Para a host de forma local dos Endpoints

Postgresql - Para armazenamento de dados e o PGAdmin, para adiministrar tanto o banco local, quanto o banco hospedado de forma online.

Render - Para a hospedagem do banco postgres e todos os endpoints de forma online.

Postman - Para a realização de testes (Local e Online)


## ✒️ Autores

* **Giovanna Soprano** - *gracogi* 
* **Leandro de Oliveira** - *leandro-schiavo*
* **Otávio de Oliveira** - *otavio-art*
* **Matheus dos Santos** - *kyureP*
* **Guilherme Gonçalves** - *guihGoncalves*

## 🔎 Passo-a-passo

Para a utilização dos Endpoints, seguir os links diposniveis e:

- Quando for um GET, para retornar todos os usuários, produtos ou reservas, apenas siga o link.

- Quando for um GET, mas buscando por ID ou CPF, adicionar o parametro e valor no final da url. Exemplo url?id=1 ou url?cpf=21223344410 (caso não tenha).

- Nos casos de POST, é necessário passar um corpo JSON com os campos e valores.

- Para PUT, se utiliza de id no final da url, mas também o corpo JSON com os campos e valores alterados (não é possivel alterar todos os valores juntos).

- Para os DELETE, consulte os registros em GET e utilize o id principal no final da url, para a excluão de valores (não é possivel deletar todos os valores juntos)
