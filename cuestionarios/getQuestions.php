<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

include "global/Serverconfiguration.php";  
include "global/dbconnection.php";         
session_start();

// Consulta para obtener preguntas con sus respuestas y la respuesta correcta
$query = "
    SELECT 
        q.id AS question_id,
        q.question_text,
        a.id AS answer_id,
        a.answer_text,
        ca.answer_id AS correct_answer_id
    FROM 
        questions q
    LEFT JOIN 
        answers a ON q.id = a.question_id
    LEFT JOIN 
        correct_answers ca ON q.id = ca.question_id
    ORDER BY 
        q.id, a.id
";

try {
    $stmt = $pdo->query($query);
    if ($stmt->rowCount() > 0) {
        $questionsData = [];
        $currentQuestionId = null;
        $currentQuestion = null;

        // Procesamos las filas obtenidas
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            if ($currentQuestionId !== $row['question_id']) {
                if ($currentQuestion !== null) {
                    $questionsData[] = $currentQuestion;
                }

                $currentQuestionId = $row['question_id'];
                $currentQuestion = [
                    'question_id' => $row['question_id'],
                    'question_text' => $row['question_text'],
                    'answers' => [],
                    'correct_answer_id' => $row['correct_answer_id']
                ];
            }

            $currentQuestion['answers'][] = [
                'answer_id' => $row['answer_id'],
                'answer_text' => $row['answer_text']
            ];
        }

        // Agregar la última pregunta procesada al array de preguntas
        if ($currentQuestion !== null) {
            $questionsData[] = $currentQuestion;
        }

        // Devolver las preguntas en formato JSON
        echo json_encode([
            'success' => true,
            'questions' => $questionsData
        ]);

    } else {
        echo json_encode([
            'success' => false,
            'message' => 'No se encontraron preguntas.'
        ]);
    }
} catch (Exception $e) {
    echo json_encode([
        'success' => false,
        'message' => 'Error en la consulta: ' . $e->getMessage()
    ]);
}
exit();
?>
