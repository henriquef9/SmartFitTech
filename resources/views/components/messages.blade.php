@if(session()->has('message'))

        <p class="text-sm">{{ session('message') }}</p>
    
</div>
@endif