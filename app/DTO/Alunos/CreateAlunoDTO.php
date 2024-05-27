<?php 

namespace App\DTO\Alunos;

use App\Http\Requests\StoreUpdateAluno;
use Illuminate\Support\Facades\Auth;

class CreateAlunoDTO {

    public function __construct(
        public string $nome,
        public string $email,
        public string $telefone,
        public string $status_id,
        public string $user_id,
    ){}

    public static function makeFromRequest(StoreUpdateAluno $request): self
    {
        return new self(
            $request->nome,
            $request->email,
            $request->telefone,
            '1',
            (String) Auth::user()->id,
        );
    }


}


?>