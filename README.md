# Sobre este Repositório

Este repositório é um teste de integração utilizando API REST e desenvolvido com Laravel.
A proposta é desenvolver uma API REST, para uma aplicação de gerenciamento de recursos financeiros de clubes.

## Endpoints

### Recursos

Há dois endpoints para consultar os recursos disponíveis:
- Listar todos os recursos (GET): 
http://cleverson.tech/api/recurso

- Listar um recurso específico (GET):
http://cleverson.tech/api/recurso/{id}

### Clubes

Há dois endpoints para consultar os clubes cadastrados:
- Listar todos os recursos (GET): <br>
http://cleverson.tech/api/clube

- Listar um recurso específico (GET):<br>
http://cleverson.tech/api/clube/{id}

Para cadastrar um novo clube, envie uma requisição POST para:<br>
http://cleverson.tech/api/clube<br>
Parâmetros esperados:<br>
clube -> string<br>
saldo -> float

Para consumir um recurso de um clube, envie uma requisição POST para:<br>
http://cleverson.tech/api/clube/consumo<br>
Parâmetros esperados:<br>
id_clube -> int<br>
id_recurso -> int<br>
Valor -> float
