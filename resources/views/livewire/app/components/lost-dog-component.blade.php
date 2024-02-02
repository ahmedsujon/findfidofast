<div>
    @foreach ($lot_dogs as $lot_dog)
        <div class="box-info">
            <div class="row">
                <div class="col-md-5 col-lg-5 col-5">
                    <div class="box-info-img">
                        <img class="img-fluid" src="{{ asset('assets/app/images/found-dog-1.jpg') }}" alt="found dog" />
                    </div>
                </div>
                <div class="col-md-7 col-lg-7 col-7">
                    <div class="box-info-text">
                        <h3>Pomeranian Puppy</h3>
                        <p>Found Address: Dallas - Texas</p>
                        <p>Color: White</p>
                        <p>Gender: Male</p>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <div class="view-all">
        <div class="row">
            <div class="col-md-12 text-center">
                <a href="#" class="btn-view">View All</a>
            </div>
        </div>
    </div>
</div>
