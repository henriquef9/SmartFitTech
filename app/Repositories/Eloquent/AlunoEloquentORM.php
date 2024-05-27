<?php 

namespace App\Repositories\Eloquent;

use App\DTO\Alunos\CreateAlunoDTO;
use App\DTO\Alunos\UpdateAlunoDTO;
use App\Models\Aluno;
use App\Models\Status;
use App\Repositories\Contracts\AlunoRepositoryInterface;
use App\Repositories\Contracts\PaginationInterface;
use App\Repositories\PaginationPresenter;
use stdClass;

class AlunoEloquentORM implements AlunoRepositoryInterface{

    public function __construct(
        protected Aluno $model,
    )
    {}

    public function paginate(int $page = 1, int $totalPerPage = 15, String $filter = null): PaginationInterface{

        $result = $this->model->where(
            function ($query) use ($filter){
                if($filter){
                    $query->where('nome', $filter);
                    $query->orwhere('email', 'like', "%{$filter}%");
                    $query->orWhere('created_at', $filter);
                }
            }
        )
        ->paginate($totalPerPage, ['*'], 'page', $page);

        return new PaginationPresenter($result);

    }


    public function getAll(string $filter = null): array{

        return $this->model->where(
            function ($query) use ($filter){
                if($filter){
                    $query->where('nome', $filter);
                    $query->orwhere('email', 'like', "%{$filter}%");
                    $query->orWhere('created_at', $filter);
                }
            }
        )
        ->get()
        ->toArray();

    }

    public function findOne(string $id): stdClass|null {

        $aluno = $this->model->find($id);

        if(!$aluno){
            return null;
        }

        return (object) $aluno->toArray();

    }

    public function delete(string $id): void {

        $aluno = $this->model->findOrFail($id);

        $aluno->delete();

    }

    public function new(CreateAlunoDTO $dto): stdClass {

        $aluno = $this->model->create((array) $dto);


        return (object) $aluno->toArray();

    }

    public function update(UpdateAlunoDTO $dto): stdClass|null {

        if(!$aluno = $this->model->find($dto->id)){
            return null;
        }

        $aluno->update((array) $dto);

        return (object) $aluno->toArray();

    }

    public function updateStatus(string $id, Status $status): void {
        $this->model
            ->where('id', $id)
            ->update([
                'status_id' => $status->id,
            ]);
    }

}

?>