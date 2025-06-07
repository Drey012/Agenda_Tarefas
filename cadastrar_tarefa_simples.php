<?php
require_once 'conexao.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = $_POST['titulo'] ?? '';
    $descricao = $_POST['descricao'] ?? '';
    $inicio = $_POST['data_inicio'] ?? null;
    $termino = $_POST['data_termino'] ?? null;
    $status = $_POST['status'] ?? 'aguardando';

    if (!empty($titulo)) {
        try {
            $sql = "INSERT INTO tarefas (titulo, descricao, data_inicio, data_termino, status) VALUES (:titulo, :descricao, :inicio, :termino, :status)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':titulo', $titulo);
            $stmt->bindParam(':descricao', $descricao);
            $stmt->bindParam(':inicio', $inicio);
            $stmt->bindParam(':termino', $termino);
            $stmt->bindParam(':status', $status);

            if ($stmt->execute()) {
                echo json_encode(['success' => true, 'message' => 'Tarefa cadastrada!']);
            } else {
                echo json_encode(['success' => false, 'error' => 'Erro ao cadastrar tarefa.']);
            }
        } catch (PDOException $e) {
            echo json_encode(['success' => false, 'error' => 'Erro no banco de dados: ' . $e->getMessage()]);
        }
    } else {
        echo json_encode(['success' => false, 'error' => 'O título é obrigatório.']);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Método inválido.']);
}
?>