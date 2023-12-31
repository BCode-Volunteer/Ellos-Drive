# Ellos-Drive

Aplicação desenvolvida para autenticação e autorização de usuários ao drive da Ellos - Produtos Personalizados. 

## Endpoints

### 1. Login do Usuário
- **Endpoint da API**: `POST /api/auth/login`
- **Endpoint da Aplicação**: `/login`

#### Descrição
Este endpoint permite que usuários façam login na aplicação.

#### Parâmetros
- `email` (string): O e-mail do usuário.
- `password` (string): A senha do usuário.

#### Resposta de Sucesso
- **Código**: 200 OK
- **Exemplo de Resposta**:
  ```json
  {
      "success": true,
      "message": "Login efetuado com sucesso!",
      "data": {
        "user": {
          "id": 1,
          "name": "Daniel",
          "email": "teste@ellos.com",
          "email_verified_at": "2023-12-30T15:20:18.000000Z",
          "created_at": "2023-12-30T15:20:18.000000Z",
          "updated_at": "2023-12-30T15:20:18.000000Z"
        },
        "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbG9jYWxob3N0OjgwMDAvYXBpL2F1dGgvbG9naW4iLCJpYXQiOjE3MDM5NDk2MjksImV4cCI6MTcwMzk1MzIyOSwibmJmIjoxNzAzOTQ5NjI5LCJqdGkiOiJhMXFZS0FDR1czUXI2OUtRIiwic3ViIjoiMSIsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.6_FxqOb2ROsCas738Bs0MPsIMUoosigDJlL-rs70plM"
      }
  }

  ```

#### Resposta de Erro
- **Código**: 404 Not Found
- **Exemplo de Resposta**:
  ```json
  {
  "success": false,
  "message": "Email ou senha inválidos!",
  "code": 404
  }
  ```
