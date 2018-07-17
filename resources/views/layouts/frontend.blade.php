<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
@include('includes.import.head')
<body>
    @include('includes.header')
    
    <!-- Start Content -->
    <div class="main">
        <!-- Start Category Title and Description -->
        <section class="main-t">
            <h1> {{ $site->title }} </h1>
            <h4> {{ $site->description }} </h4>
        </section>
        <!-- End Category Title and Description -->
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-8 col-xs-12 col-sm-12 main-content">
                    @yield('content')                
                    @include('includes.import.pagination')
                </div>
                @include('includes.import.sidebar')
            </div>  
        </div>
    
    </div>

    <!-- End Content -->

    @include('includes.import.footer')
</body>
</html>