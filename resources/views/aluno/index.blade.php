@extends('aluno.layouts.app')

@section('name-section', 'Alunos')

@section('main')


    @include('aluno.create')
    
    <table class="w-100"> 
        <thead class="bg-color-primary text-white">
            <tr>
                <th class="text-th">Código</th>
                <th class="text-th">Nome</th>
                <th class="text-th">Email</th>
                <th class="text-th">Telefone</th>
                <th class="text-th">Data de Cadastro</th>
                <th class="text-th py-1">
                    <button class="btn-add d-flex gap-3 border-0 align-items-center" data-bs-toggle="modal" data-bs-target="#modalCadastro"><span><img class="" src="{{ asset('./img/adicionar-usuario.png') }}" alt=""></span> <span>Novo Aluno</span></button>
                </th>
            </tr>
        </thead>

        <tbody>

            @foreach ($alunos->items() as $aluno)

                <tr class="text-tr">
                    <td>{{ $aluno->id }}</td>
                    <td>{{ $aluno->nome }}</td>
                    <td>{{ $aluno->email }}</td>
                    <td>{{ $aluno->telefone }}</td>
                    <td>{{ $aluno->created_at }}</td>
                    <td>
                        <div class="d-flex justify-content-between gap-3">
                            <button class="btn-editar" data-bs-toggle="modal" data-bs-target="#modalEdita-{{$aluno->id}}">editar</button>
                            @include('aluno.edit')
                            <button class="btn-excluir" data-bs-toggle="modal" data-bs-target="#modalExcluir-{{$aluno->id}}">Excluir</button>
                            @include('aluno.delete')
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>

    <div class="mt-5">
        <x-pagination :paginator="$alunos" :appends="$filters"></x-pagination>
    </div>


    @push('scripts')
        <script src="{{ asset('./js/app.js') }}"></script>
    @endpush
 @endsection
