 <!-- Start Categories Widget -->
<div class="panel panel-pale">
    <div class="panel-heading" role="tab" id="headingThree">
        <h4 class="panel-title"><a class="" role="button" data-toggle="collapse" data-parent="#accordion3" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">Categories</a></h4>
    </div>
    <div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree">
        <div class="panel-body">
            <ul class="panel-cat">
                @foreach($categories as $category)
                <li><a href="{{ route('category', ['category' => $category->slug]) }}">{{ $category->name }}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
<!-- End Categories Widget -->