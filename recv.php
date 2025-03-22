<?php
// Definir cabeçalhos para aceitar requisições de diferentes origens (se necessário)
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

// Verificar se a requisição é do tipo POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Obter os dados enviados via POST
    $data = $_POST['data'] ?? null;

    // Verificar se os dados foram recebidos
    if ($data !== null) {
        // Responder com os dados recebidos
        echo json_encode(["status" => "success", "received" => $data]);
    } else {
        // Responder erro caso não tenha recebido os dados corretamente
        echo json_encode(["status" => "error", "message" => "Nenhum dado recebido"]);
    }
} else {
    // Se não for POST, responder com erro
    echo json_encode(["status" => "error", "message" => "Método não permitido"]);
}
?>
