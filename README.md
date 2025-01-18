# Logs System

Este projeto exemplo demostrando um sistema registrador de logs assíncrono utilizando o RabbitMQ como message broker.

## Como executar

1. Os diretórios com prefixo `app` e `consumer` são projetos Laravel. Então, em cada uma delas:
- adicione um arquivo `.env`
- execute `composer install`
- execute `php artisan key:generate`
- execute `php artisan migrate`

2. O diretório `rabbitmq_service` contém o docker-compose.yaml com as configurações de um container do RabbitMQ
- entre no diretório e execute `docker up -d`

3. Após subir o container, acesso gerenciador do RabbitMQ e configure as filas
- acesse `http://localhost:15672/`
- use o login "guest" e a senha "guest"
- vá na aba "Queues and Streams"
- crie as filas "app_file_uploader" e "app_todo_list"
- vincule essas filas à exchange "amq.direct"
    - adicione as respectivas routing keys "app.file_uploader" e "app.todo_list" para as filas "app_file_uploader" e "app_todo_list"

4. Para testar
- para os projetos "consumer", execute o comando `php artisan queue:work`
- os projetos "app" são os producers, neles execute `php artisan play {logType}` para enviar mensagens
- dependendo de qual app enviou a mensagem, o respectivo consumer vai exibir um resultado.