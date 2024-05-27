<?php 

namespace App\DTO\Alunos;

use App\Http\Requests\StoreUpdateAluno;

class UpdateAlunoDTO {

    public function __construct(
        public string $id,
        public string $nome,
        public string $email,
        public string $telefone,
    ){}

    public static function makeFromRequest(StoreUpdateAluno $request, string $id = null): self
    {
        return new self(
            $id ?? $request->id,
            $request->nome,
            $request->email,
            $request->telefone,
        );
    }


}


?>