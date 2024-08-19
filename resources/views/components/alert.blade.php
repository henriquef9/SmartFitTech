@if ($errors->any())


    <div class="modal" id="modalErros" tabindex="-1">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title">Dados inválidos!</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                    @foreach ($errors->all() as $error)
                        {{$error}}
                    @endforeach
            
                

            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
        </div>
    </div>

    @push('scripts')
        <script>
            
            $(document).ready(function(){
                $('#modalErros').modal('show');
            });  

        </script>
    @endpush

@endif