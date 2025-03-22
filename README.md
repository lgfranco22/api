# 📌 API Simples com Apache e PHP

Esta API permite realizar consultas e enviar dados via **POST** utilizando **Apache e PHP** com URLs amigáveis.

## 🚀 Como Funciona

A API possui dois endpoints principais:
- `GET /api/consulta` → Retorna "hello world"
- `POST /api/recv` → Recebe dados enviados via **POST**

---

## 📂 Estrutura do Projeto

```
/api/
│-- consulta.php  # Endpoint que retorna "hello world"
│-- recv.php      # Endpoint que recebe dados via POST
│-- .htaccess     # Configuração para URLs amigáveis
```

---

## 🛠️ Configuração

### 1️⃣ **Configurar Apache e PHP**
Caso ainda não tenha o Apache instalado, use:

**Linux:**
```bash
sudo apt install apache2 php libapache2-mod-php
```

**Windows (XAMPP):**
- Baixe e instale o XAMPP.
- Inicie o Apache pelo painel do XAMPP.

---

### 2️⃣ **Criar os Arquivos da API**

#### 📌 `consulta.php`
```php
<?php
echo "hello world";
?>
```

#### 📌 `recv.php`
```php
<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $data = $_POST['data'] ?? null;
    if ($data !== null) {
        echo json_encode(["status" => "success", "received" => $data]);
    } else {
        echo json_encode(["status" => "error", "message" => "Nenhum dado recebido"]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Método não permitido"]);
}
?>
```

#### 📌 `.htaccess`
```apache
RewriteEngine On
RewriteRule ^consulta$ consulta.php [L]
RewriteRule ^recv$ recv.php [L]
```

---

## 🏃 Testando a API

### **1️⃣ Testar o Endpoint de Consulta**
```bash
curl -X GET https://meudominio.com/api/consulta
```
💡 **Resposta esperada:**
```
hello world
```

### **2️⃣ Testar o Endpoint de Recebimento de Dados**
```bash
curl -d "data=1234" https://meudominio.com/api/recv
```
💡 **Resposta esperada:**
```json
{"status":"success","received":"1234"}
```

### **3️⃣ Teste de Erro (Sem Enviar Dados)**
```bash
curl -X POST https://meudominio.com/api/recv
```
💡 **Resposta esperada:**
```json
{"status":"error","message":"Nenhum dado recebido"}
```

### **4️⃣ Teste de Erro (Usando Método GET no `recv.php`)**
```bash
curl -X GET https://meudominio.com/api/recv
```
💡 **Resposta esperada:**
```json
{"status":"error","message":"Método não permitido"}
```

---

## 🔄 Reiniciar o Apache (se necessário)
Caso as alterações não funcionem, reinicie o Apache:

**Linux:**
```bash
sudo systemctl restart apache2
```

**Windows (XAMPP):**
- Vá até o **Painel de Controle do XAMPP** e reinicie o Apache.

---

## 📜 Licença
Este projeto é de código aberto e pode ser usado livremente. 🚀
