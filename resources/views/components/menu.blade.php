<div>
    
    @foreach ($itens as $item)
        <a class="text-decoration-none w-75 px-2" href="{{route('{{$item->route}}')}}">

            <x-item-menu :especial="$item->especial">
                <x-slot:icon>
                  {{$item->icon}}
                </x-slot:icon>

                <x-slot:nome-item>
                    {{$item->nome}}
                </x-slot:nome-item>
            </x-item-menu>

        </a>
    @endforeach

</div>