<?php

namespace App\Http\Controllers\Api;

use App\Adapters\ApiAdapter;
use App\DTO\Alunos\CreateAlunoDTO;
use App\DTO\Alunos\UpdateAlunoDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateAluno;
use App\Http\Resources\AlunoResource;
use App\Services\AlunoService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AlunoController extends Controller
{

    public function __construct(
        protected AlunoService $service,
    )
    {}


    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        // //Logica com getAll()

        // $alunos = $this->service->getAll(
        //     filter: $request->filter,
        // );

        // $alunos = new AlunoResource($alunos);

        // //dd($alunos);

        // $novos = [];

        // foreach ($alunos as $aluno) {
        //     array_push($novos, (object) $aluno);
        // }

        // return  $novos;

        // usando paginação

        $alunos = $this->service->paginate(
            page: $request->get('page', 1),
            totalPerPage: $request->get('per_page', 6),
            filter: $request->filter,
        );

        // return AlunoResource::collection($alunos->items())->additional([
        //     'meta' => [
        //             'total' => $alunos->total(),
        //             'is_first_page' => $alunos->isFirstPage(),
        //             'is_last_page' => $alunos->isLastPage(),
        //             'current_page' => $alunos->currentPage(),
        //             'next_page' => $alunos->getNumberNextPage(),
        //             'previous_page' => $alunos->getNumberPreviousPage(),
        //     ]
        // ]);

        return ApiAdapter::toJson($alunos);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUpdateAluno $request)
    {
        $aluno = $this->service->new(CreateAlunoDTO::makeFromRequest($request));

        return new AlunoResource($aluno);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if(!$aluno = $this->service->findOne($id)){
            return response()->json([
                'error' => 'Not Found'
            ], Response::HTTP_NOT_FOUND);
        }

        return new AlunoResource($aluno);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUpdateAluno $request, string $id)
    {

        $aluno = $this->service->update(
            UpdateAlunoDTO::makeFromRequest($request, $id)
        );

        if (!$aluno) {
            return response()->json([
                'error' => 'Not Found'
            ], Response::HTTP_NOT_FOUND);
        }

        return new AlunoResource($aluno);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if(!$aluno = $this->service->findOne($id)){
            return response()->json([
                'error' => 'Not Found'
            ], Response::HTTP_NOT_FOUND);
        }

        $this->service->delete($id);

        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
