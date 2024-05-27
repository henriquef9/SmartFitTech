<?php 

namespace App\Repositories\Contracts;

use App\DTO\Alunos\CreateAlunoDTO;
use App\DTO\Alunos\UpdateAlunoDTO;
use App\Models\Status;
use stdClass;

interface AlunoRepositoryInterface {
    //public function paginate(int $page = 1, int $totalPerPage = 15, string $filter = null): PaginationInterface;
    public function getAll(string $filter = null): array;
    public function findOne(string $id): stdClass|null;
    public function delete(string $id): void;
    public function new(CreateAlunoDTO $dto): stdClass;
    public function update(UpdateAlunoDTO $dto): stdClass|null;
    public function updateStatus(string $id, Status $status): void;
    
}


?>