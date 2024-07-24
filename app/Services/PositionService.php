<?php

namespace App\Services;

use App\DTO\PositionDTO\DeletePositionDTO;
use App\DTO\PositionDTO\GetPositionDTO;
use App\DTO\PositionDTO\PostPositionDTO;
use App\DTO\PositionDTO\PutPositionDTO;
use App\Models\Position;
use Illuminate\Database\Eloquent\Collection;

class PositionService
{
    public function findPosition(GetPositionDTO $dataTransferObject): Position
    {
        return Position::firstWhere('id', '=', $dataTransferObject->id);
    }

    public function getAllPositions(): Collection
    {
        return Position::all();
    }

    public function createPosition(PostPositionDTO $dataTransferObject): void
    {
        Position::create([
            'position' => $dataTransferObject->position,
        ]);
    }

    public function updatePosition(PutPositionDTO $dataTransferObject): void
    {
        Position::firstWhere('id', '=', $dataTransferObject->id)->update([
            'position' => $dataTransferObject->position,
        ]);
    }

    public function deletePosition(DeletePositionDTO $dataTransferObject): void
    {
        Position::firstWhere('id', '=', $dataTransferObject->id)->delete();
    }
}