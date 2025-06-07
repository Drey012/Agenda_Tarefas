<?php
require_once 'conexao.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? null;
    $status = $_POST['status'] ?? null;

    if ($id && $status) {
        try {
            $sql = "UPDATE tarefas SET status = :status WHERE id = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':status', $status);
            $stmt->bindParam(':id', $id);

            if ($stmt->execute()) {
                echo json_encode(['success' => true, 'message' => 'Status atualizado com sucesso!']);
            } else {
                echo json_encode(['success' => false, 'error' => 'Erro ao atualizar status.']);
            }
        } catch (PDOException $e) {
            echo json_encode(['success' => false, 'error' => 'Erro no banco de dados: ' . $e->getMessage()]);
        }
    } else {
        echo json_encode(['success' => false, 'error' => 'ID e status são obrigatórios.']);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Método inválido.']);
}
?>