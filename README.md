# 📚 WEB2 – Atividade e Simulado da P1

## 🎯 Objetivo

Desenvolver um sistema web em **PHP** que simule um **quiz interativo**, aplicando na prática os principais conceitos estudados na disciplina.

Além da implementação, o sistema também funciona como um **simulado**, ajudando na revisão dos conteúdos para a prova.

---

## 🧩 Estrutura do Sistema

O projeto é dividido em 4 partes principais:

---

### 🔐 1. Tela de Login (`index.php`)

Criar um formulário contendo:

* Nome
* Email

#### 📌 Requisitos:

* Envio dos dados via **POST**
* Armazenamento:

  * Nome → **Sessão (`$_SESSION`)**
  * Email → **Cookie (`$_COOKIE`)**
* Redirecionamento automático para o quiz

---

### 📝 2. Tela de Quiz (`quiz.php`)

Responsável por exibir o questionário ao usuário.

#### 📌 Requisitos:

* Verificar se o usuário está logado
* Exibir todas as questões do quiz
* Utilizar diferentes tipos de input:

  * `radio`
  * `checkbox`
  * `select`
* Enviar as respostas via **POST**

---

### 📊 3. Processamento (`resultado.php`)

Responsável por corrigir o quiz e mostrar o resultado final.

#### 📌 Requisitos:

* Criar uma **função para corrigir as respostas**
* Exibir:

  * Nome (via sessão)
  * Email (via cookie)
  * Total de acertos
  * Mensagem de desempenho

#### 📈 Classificação de Desempenho:

| Pontuação | Desempenho      |
| --------- | --------------- |
| 0 – 10    | Precisa revisar |
| 11 – 17   | Quase lá        |
| 18 – 20   | Excelente       |

---

### 🌐 4. Consumo de API

Integrar uma API externa para exibir uma mensagem ao usuário.

#### 📌 Requisitos:

* Utilizar:

  * `file_get_contents()` **ou**
  * `cURL`
* Exibir:

  * Uma frase, conselho ou mensagem dinâmica

---

### 🚪 5. Logout

Permitir que o usuário encerre a sessão.

#### 📌 Requisitos:

* Destruir a sessão (`session_destroy()`)
* Redirecionar para a tela inicial (`index.php`)

---

## 🧠 Conteúdos Obrigatórios

O sistema deve aplicar os seguintes conceitos:

* ✔ `echo`
* ✔ Variáveis
* ✔ Métodos **GET** e **POST**
* ✔ Formulários
* ✔ Inputs diversos (`radio`, `checkbox`, `select`)
* ✔ Condicionais (`if`, `else`)
* ✔ Estruturas de repetição (`foreach`, etc.)
* ✔ Arrays
* ✔ Funções
* ✔ Sessões (`$_SESSION`)
* ✔ Cookies (`$_COOKIE`)
* ✔ Consumo de API

---

## 💡 Observação

Este projeto não é apenas um exercício técnico, mas também uma forma de consolidar o aprendizado de forma prática e aplicada, simulando um sistema real com fluxo completo:

> Login → Interação → Processamento → Resultado → Logout

