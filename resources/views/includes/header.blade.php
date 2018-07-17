<!-- Start Header -->
    <header>
        <!-- Start Logo -->
        <div class="h-logo">
            <a href="{{ route('index') }}">
            <img src="{{asset('assets/uploads/site/logo.png')}}" title="" alt="Site Title">
            </a>
        </div>
        <!-- End Logo -->
        
        <!-- Start Menu -->
        <nav class="navbar navbar-pale">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Menu</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>
                </div>
            <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        @foreach($menus as $menu)
                        <li class="active">
                            <a href="{{ route('category', ['category' => $menu->slug]) }}">{{ $menu->name }}</a>
                        </li>
                        @endforeach                  
                    </ul>
            </div>
            </div>
        </nav>
        <!-- End Menu -->
        
    </header>
    <!-- End Header -->