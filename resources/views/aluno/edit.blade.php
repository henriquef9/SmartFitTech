

<div class="modal fade" id="modalEdita-{{$aluno->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content box bg-color-primary text-white">
        <div class="modal-header border-0">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Cadastro novo Aluno:</h1>
          <button type="button" class="border-0 bg-transparent" data-bs-dismiss="modal" aria-label="Close">
              <img src="{{ asset('./img/fecha.png') }}" alt="">
          </button>
        </div>
        <div class="modal-body">
            <p class="text-white">Atenção: Este formulário é para a edição de dados de alunos cadastrados. Por favor, revise as informações com cuidado antes de enviar.</p>

            <form action="{{route('aluno.update', $aluno->id)}}" method="POST">
                
              <x-alert></x-alert>

              @csrf()
              @method('PUT')
  
            <div class="mb-3">
              <label for="name" class="col-form-label">Nome:</label>
              <input type="text" name="nome" class="form-control" id="name" value="{{$aluno->nome ?? old('nome')}}">
            </div>
            <div class="mb-3">
              <label for="email" class="col-form-label">Email:</label>
              <input type="email" class="form-control" id="email" name="email" value="{{$aluno->email ?? old('email')}}"></input>
            </div>
            <div class="mb-3">
              <label for="telefone" class="col-form-label">Telefone:</label>
              <input type="tel" class="form-control" id="telefone" name="telefone" value="{{$aluno->telefone ?? old('telefone')}}"></input>
            </div>

            <button type="submit" class="btn-modal btn mt-4">Confirmar</button>
          </form>
        </div>

      </div>
    </div>
  </div>