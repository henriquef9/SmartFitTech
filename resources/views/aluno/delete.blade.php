<div class="modal fade" id="modalExcluir-{{$aluno->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content box bg-color-primary text-white">
        <div class="modal-header border-0">
          <h1 class="modal-title fs-5 title-excluir" id="exampleModalLabel"><span class="text-danger">Atenção</span>: Você está prestes a excluir permanentemente os dados deste aluno. Esta ação não pode ser desfeita. </h1>
          <button type="button" class="border-0 bg-transparent" data-bs-dismiss="modal" aria-label="Close">
              <img src="{{ asset('./img/fecha.png') }}" alt="">
          </button>
        </div>
        <div class="modal-body">

            <h2 class="fs-2 text-center text-white my-4">Por favor, confirme se deseja prosseguir com a exclusão.</h2>
          
            <form class="d-flex justify-content-center my-4" action="{{route('aluno.destroy', $aluno->id)}}" method="post">
                @csrf()
                @method('DELETE')

                <button class="btn-excluir2" type="submit">Confirmar</button>
            </form>

        </div>
      </div>
    </div>
  </div>
  