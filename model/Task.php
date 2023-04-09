<?php

class Task
{
    private string $description;
    private bool $isDone = false;
    private int $id;

    public function getDescription(): string
    {
        return $this->description;
    }
    public function getID(): int
    {
        return $this->id;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }


    public function isDone(): bool
    {
        return $this->isDone;
    }


    public function setIsDone(bool $isDone): void
    {
        $this->isDone = $isDone;
    }
}
