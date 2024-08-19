<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <link rel="stylesheet" href="{{ asset('./css/app.css') }}">

    @stack('style')

</head>
<body>
    <div class="row h-100">
        <div class="col-xl-2 col-4">
            <div class="bg-color-primary d-flex flex-column justify-content-between h-100 py-4">
                <div>
                    <h1 class="text-center text-light mt-4 mb-5">SmartFit<span class="text-logo-especial">Tech</span></h1>
                    <div class="d-flex flex-column align-items-center py-3 gap-5">
                    
                        <a class="text-decoration-none w-75 px-2" href="{{route('dashboard')}}">

                            <x-item-menu :especial="'true'">
                                <x-slot:icon>
                                    <span>
                                        <svg width="38" height="38" viewBox="0 0 38 38" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <rect width="38" height="38" fill="url(#pattern0_44_146)"/>
                                        <defs>
                                        <pattern id="pattern0_44_146" patternContentUnits="objectBoundingBox" width="1" height="1">
                                        <use xlink:href="#image0_44_146" transform="scale(0.015625)"/>
                                        </pattern>
                                        <image id="image0_44_146" width="64" height="64" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAAOxAAADsQBlSsOGwAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAAGVSURBVHic7ZpBTsMwEEUdxK1Y0ROgquIYcBBE6YWQWok14i4k68eCLFp3krSJkz9S5+2SuvN/f5NY8TilIAgCA+AZ+AIaptO0tTZedXMTuwLiXWy96Vr/wNysvejeGRm8XJTUNF4d6Z4C1Flqj1NVgVVW89eLbmV8iZMBVXU2ZqSZ3roqXesWuCkiALUBNRGA2oCaCEBtQE0EoDagJgJQG1DjKYDm+ABYTS1o1KjzMfdTRQryk1J6ODr+zN5jSvCdn/B0BewW0PgYHJEvoZRSvqQu8D68qDOat2JG5wqgHbcGDpwvkIyhBvbAU5eemwURFZ6eARIiAOOcZD52A/+dlLk59OhrO0PApoDwEOZTGQ+dodbI4vMxos5QXwiLzseIbz05eOkMqYDoDEmIALo+QD0fK0EwH+eDCv6W6+qi2yEiCcDTDhEfoNshIrkC3CyIqHRjGlQbUBMBqA2oiQDUBtREAGoDaiIAtQE1EYBxTtUZ8tGRQrQ8rdK1rgDVTg0fO0RS0u3UUOl2mVm0M6TWDYLgNvkDoSLWNGa37R4AAAAASUVORK5CYII="/>
                                        </defs>
                                        </svg>
                                    </span>
                                </x-slot:icon>

                                <x-slot:nome-item>
                                    Dashboard
                                </x-slot:nome-item>
                            </x-item-menu>

                        </a>
                        <a class="text-decoration-none w-100 px-2" href="{{route('aluno.index')}}">
    
                            <x-item-menu :especial="'false'">
                                <x-slot:icon>
                                    <span>
                                        <svg width="38" height="38" viewBox="0 0 38 38" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <rect width="38" height="38" fill="url(#pattern0_44_145)"/>
                                        <defs>
                                        <pattern id="pattern0_44_145" patternContentUnits="objectBoundingBox" width="1" height="1">
                                        <use xlink:href="#image0_44_145" transform="scale(0.015625)"/>
                                        </pattern>
                                        <image id="image0_44_145" width="64" height="64" xlink:href="data:image/png;base64,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"/>
                                        </defs>
                                        </svg>
                                    </span>
                                </x-slot:icon>

                                <x-slot:nome-item>
                                    Alunos
                                </x-slot:nome-item>
                            </x-item-menu>
                            
                        </a>
                    </div>
                </div>

                <div class="menu-footer d-flex justify-content-center align-items-center">
                    <img src="{{ asset('./img/academia.png') }}" alt="">
                </div>

            </div>
        </div>
        <div class="col-xl-9 col-8 row align-items-start">
            <div class="col-12">
                <div>
                    <div class="py-5 d-flex justify-content-between my-2 hr-header">
                        <h2 class="fs-2 fw-bold text-uppercase title-header">@yield('name-section')</h2>
                        
                        <div class="d-flex gap-4 align-items-center">
                            <div class="d-flex flex-column align-items-center">
                                <span>Nome adm</span>
                                <span class="fw-bolder">Administrador</span>
                            </div>
            
                            <div>
                                <span>
                                    <svg width="24" height="14" viewBox="0 0 24 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M21.4286 0L24 2.625L14.225 11.5714L11.5714 14L9.19241 11.5714L0 2.625L2.57143 0L11.7701 9.1338L21.4286 0Z" fill="#AAAAAA"/>
                                    </svg>
                                </span>
                            </div>
            
                            <div class="img-perfil border rounded-circle">
                                <img class="img-fluid" src="{{ asset('./img/usuario-de-perfil.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                
                @yield('main')
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    @stack('scripts')

</body>
</html>