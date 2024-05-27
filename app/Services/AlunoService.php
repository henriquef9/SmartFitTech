<?php 

namespace App\Services;

use App\DTO\Alunos\CreateAlunoDTO;
use App\DTO\Alunos\UpdateAlunoDTO;
use App\Models\Status;
use App\Repositories\Contracts\AlunoRepositoryInterface;
use App\Repositories\Contracts\PaginationInterface;
use stdClass;

class AlunoService {

    public function __construct(
        protected AlunoRepositoryInterface $repository,
    )
    {
        
    }

    //retorna paginação de alunos
    public function paginate(
        int $page = 1,
        int $totalPerPage = 15,
        string $filter = null
    ): PaginationInterface {
        return $this->repository->paginate(
            page: $page,
            totalPerPage: $totalPerPage,
            filter: $filter,
        );
    }

    //retorna um array de alunos
    public function getAll(String $filter = null): array 
    {
        return $this->repository->getAll($filter);
    }

    //retorna um aluno com base em um id
    public function findOne(String $id): stdClass|null 
    {
        return $this->repository->findOne($id);
    }

    //criar um aluno

    public function new(CreateAlunoDTO $dto): stdClass 
    {
        return $this->repository->new($dto);
    }

    //atualizar um aluno
    public function update(UpdateAlunoDTO $dto): stdClass|null 
    {
        return $this->repository->update($dto);
    }

    //deletar um aluno
    public function delete(String $id): void 
    {
        $this->repository->delete($id);
    }

    //atualizar status do aluno
    public function updateStatus(String $id, Status $status): void 
    {
        $this->repository->updateStatus($id, $status);
    }

}

?>