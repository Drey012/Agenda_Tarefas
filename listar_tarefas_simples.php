<?php
require 'conexao.php';

try {
    $query = "SELECT id, titulo, descricao, data_inicio, data_termino, status FROM tarefas ORDER BY id DESC";
    $stmt = $conn->prepare($query);
    $stmt->execute();

    $tarefas = [];

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        // Garante que datas nulas sejam representadas como string vazia
        $tarefas[] = [
            'id' => $row['id'],
            'titulo' => $row['titulo'],
            'descricao' => $row['descricao'],
            'data_inicio' => $row['data_inicio'] ?? '',
            'data_termino' => $row['data_termino'] ?? '',
            'status' => $row['status']
        ];
    }

    echo json_encode($tarefas);

} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Erro ao buscar tarefas: ' . $e->getMessage()]);
}
