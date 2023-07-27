
@if ($type == 'featured')
<div class="col-lg-3 col-sm-12 mb-4">
    <div class="card shadow ">
        <img src="{{asset('storage/images/home/house.jpg')}}" class="card-img-top img-fluid" alt="...">
        <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>
    </div>
</div>
@elseif($type == 'carousel')
<div class="card shadow col-4 col-sm-12 hv-10 {{ $item > 1 ? 'd-none d-lg-block' : ''}}" style="width: 14rem;">
    <img src="{{asset('storage/images/home/house.jpg')}}" class="card-img-top" alt="...">
    <div class="card-body">
        <h6 class="card-title">Card title</h6>
        <small class="card-text">Some quick example text to build on the card tit</small>
    </div>
</div>   
@endif