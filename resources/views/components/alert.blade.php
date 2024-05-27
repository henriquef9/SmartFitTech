<div class="text-white mb-2">
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            {{$error}}
        @endforeach

        

    @endif
</div>
