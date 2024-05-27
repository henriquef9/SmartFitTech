<?php

namespace App\Http\Controllers\admin;

use App\DTO\Alunos\CreateAlunoDTO;
use App\DTO\Alunos\UpdateAlunoDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateAluno;
use App\Models\Aluno;
use App\Services\AlunoService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AlunoController extends Controller
{

    public function __construct(
        protected AlunoService $service,
    ) 
    {}
    
    public function index(Request $request){

       // $alunos = $this->service->getAll();

       $alunos = $this->service->paginate(
        page: $request->get('page', 1),
        totalPerPage: $request->get('per_page', 6),
        filter: $request->filter,
        );

        $filters = ['filter' => $request->get('filter', '')];
     
        return view('aluno/index', compact(
            'alunos', 'filters'
        ) );
    }

    
    public function create(){

        return view('aluno.create');
    }

    
    public function store(StoreUpdateAluno $request){

        // // lógica no controller

        // //recuperando os dados do formulario pela request que foram validados
        // $dados = $request->validated();
        // //instanciando diretamente o id do adm e do status do aluno (temporario)
        // $dados['user_id'] = (String) Auth::user()->id;
        // $dados['status_id'] = '1';
       
        // //dd($dados);

        // Aluno::create($dados);

        // --------------------------------------- //
        
        $this->service->new(CreateAlunoDTO::makeFromRequest($request));

        return redirect()->route('aluno.index');
    }

    public function edit(Request $request, String $id){

        // // lógica no controller

        // //verificar ser existir o aluno para edição
        // if(!$aluno = Aluno::find($id)){
        //     return back();
        // }

        if(!$aluno = $this->service->findOne($id)){
            return back();
        }

        return view('aluno.edit', compact('aluno'));
    }

    public function update(StoreUpdateAluno $request, String $id){
        
        // // lógica no controller

        // //buscar o aluno para atualizar e verificar ser existir antes de atualizar
        // if(!$aluno = Aluno::find($id)){
        //     back();
        // }

        // //recuperando os dados do formulario pela request que foram validados
        // $dados = $request->validated();

        // //atualizando dados do aluno
        // $aluno->update($dados);


        $aluno = $this->service->update(UpdateAlunoDTO::makeFromRequest($request));

        if(!$aluno){
            back();
        }

        return redirect()->route('aluno.index');
    }

    public function destroy(String $id){
        // //logica no controller

        // //buscar o aluno para atualizar e verificar ser existir antes de atualizar
        // if(!$aluno = Aluno::find($id)){
        //     back();
        // }

        // $aluno->delete();

        $this->service->delete($id);

        return redirect()->route('aluno.index');
    }

}
