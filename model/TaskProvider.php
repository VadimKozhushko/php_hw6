<?php

class TaskProvider
{

    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }


    public function getUndoneList(User $user): array
    {
        $statement = $this->pdo->prepare(
            'SELECT id, description, isDone, user_id FROM tasks WHERE user_id = :user_id AND NOT isDone'
        );
        $statement->execute([
            'user_id' => $user->getiD()
        ]);
        $result = [];
        while ($statement && $task = $statement->fetchObject(Task::class)) {
            $result[] = $task;
        }
        return $result;
    }

    public function addTask(Task $task, User $user): bool
    {

        $statement = $this->pdo->prepare(
            'INSERT INTO tasks (description, isDone, user_id) VALUES (:description, :isDone, :user_id)'
        );

        return $statement->execute([
            'description' => $task->getDescription(),
            'isDone' => false,
            'user_id' => $user->getiD()
        ]);
    }

    public function deleteTask(int $id, User $user): bool
    {
        $statement = $this->pdo->prepare(
            'DELETE FROM tasks WHERE id = :id AND user_id = :user_id'
        );

        return $statement->execute([
            'id' => $id,
            'user_id' => $user->getiD()
        ]);
    }

    public function doneTask(int $id, User $user): bool
    {
        $statement = $this->pdo->prepare(
            'UPDATE tasks SET isDone = true WHERE id = :id AND user_id = :user_id'
        );

        return $statement->execute([
            'id' => $id,
            'user_id' => $user->getiD()
        ]);
    }
}
