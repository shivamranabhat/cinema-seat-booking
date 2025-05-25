<section class="movie-grid pb-5" style="{{ request()->segment(1) == 'movies' ? 'margin-top: 2rem' : '' }}">
  <div class="container">
    <div class="d-flex justify-content-between">
      <h2 class="sub-heading">Now Showing</h2>
      <input type="search" class="movie-search" wire:model.live="search" placeholder="Search...">
    </div>
    <div class="row-fluid d-flex align-items-end mb-4">
      <div class="left-line col-5 col-sm-4 col-md-3 col-lg-2 col-xl-2"></div>
      <div class="right-line"></div>
    </div>
    <div class="movie-list-coming d-flex">
      @forelse($movies as $movie)
      <div class="movie-card p-0 col-12 col-md-6 col-lg-4 col-xl-4">
        <div class="img-wrapper">
          <img class="col-12 m-0 p-0" src="{{asset('storage/'.$movie->image)}}" alt="{{$movie->alt}}" />
        </div>
        <div class="card-info pt-3 px-3">
          <div class="row-fluid d-flex align-items-center justify-content-between">
            <h5 class="text-white m-0">{{$movie->name}}</h5>
            <h5 class="desc-text m-0">⭐{{$movie->rating}}</h5>
          </div>
          <hr class="line" />
          <p class="text-white">{{Str::words($movie->description,8)}}</p>
          <div class="row-fluid d-flex">
            @forelse (explode(',', $movie->genre) as $genre)
            <p class="desc-text pill px-2 py-1">{{ trim($genre) }}</p>
            @empty
            <p class="desc-text pill px-2 py-1">No genres available</p>
            @endforelse
          </div>
        </div>
        <div class="backdrop">
          <div class="backdrop-content-wrapper">
            <a href="{{route('movie.details',$movie->slug)}}" class="btn btn-lg button view-details">
              →
            </a>
          </div>
        </div>
      </div>
      @empty
      <p class="text-white">No movies found.</p>
      @endforelse
    </div>
  </div>
</section>