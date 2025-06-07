<?php
require_once 'conexao.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? null;

    if ($id) {
        try {
            $sql = "DELETE FROM tarefas WHERE id = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id', $id);

            if ($stmt->execute()) {
                echo json_encode(['success' => true, 'message' => 'Tarefa excluída com sucesso!']);
            } else {
                echo json_encode(['success' => false, 'error' => 'Erro ao excluir tarefa.']);
            }
        } catch (PDOException $e) {
            echo json_encode(['success' => false, 'error' => 'Erro no banco de dados: ' . $e->getMessage()]);
        }
    } else {
        echo json_encode(['success' => false, 'error' => 'ID é obrigatório.']);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Método inválido.']);
}
?>