<x-app-layout>
    <div class="container-fluid content-inner mt-n5 py-0">
        <div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Movie</h4>
                            </div>
                            <div class="back">
                                <a href="{{route('movies')}}"
                                    class=" text-center btn btn-primary btn-icon mt-lg-0 mt-md-0 mt-3">
                                    <i class="btn-inner">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 25 25"
                                            fill="none" stroke="currentColor">
                                            <path
                                                d="M24 12.001H2.914l5.294-5.295-.707-.707L1 12.501l6.5 6.5.707-.707-5.293-5.293H24v-1z"
                                                data-name="Left" />
                                        </svg>
                                    </i>
                                </a>
                            </div>
                        </div>
                        <div class="card-body mt-2">
                            <form method="POST" action="{{ route('movie.update',$movie->slug) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-outline mb-3">
                                    <label class="form-label" for="name">Name</label>
                                    <input type="text" name="name" id="name"
                                        class="form-control @error('name') is-invalid @enderror {{ $errors->has('name') ? 'error' : '' }}"
                                        value="{{ $movie->name }}" />
                                    @error('name')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-outline mb-3">
                                    <label class="form-label" for="theater_id">Theater</label>
                                    <select name="theater_id" id="theater_id"
                                        class="form-control @error('theater_id') is-invalid @enderror">
                                        @foreach ($theaters as $theater)
                                        <option value="{{ $theater->id }}" {{ old('theater_id', optional($movie->
                                            schedules->first())->theater_id) == $theater->id ? 'selected' : '' }}>
                                            {{ $theater->name }}
                                        </option>
                                        @endforeach
                                    </select>

                                    @error('theater_id')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="row align-items-end">
                                    <div class="col-12 col-lg-6 form-outline mb-3">
                                        <div class="image-area">
                                            <img id="imageResult" src="{{asset('storage/'.$movie->image)}}" width="150">
                                        </div>
                                        <label class="form-label" for="image">Image</label>
                                        <input class="form-control" type="file" id="image" name="image" />
                                        @error('image')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-lg-6 mb-3">
                                        <label class="form-label" for="alt">Image Alt</label>
                                        <input type="text" name="alt" id="alt"
                                            class="form-control @error('alt') is-invalid @enderror {{ $errors->has('alt') ? 'error' : '' }}"
                                            value="{{ $movie->alt }}" />
                                        @error('alt')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-outline mb-3">
                                    <label class="form-label" for="release_date">Release Date</label>
                                    <input type="date" name="release_date" id="release_date"
                                        class="form-control @error('release_date') is-invalid @enderror {{ $errors->has('release_date') ? 'error' : '' }}"
                                        value="{{ $movie->release_date }}" />
                                    @error('release_date')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-outline mb-3">
                                    <label class="form-label" for="duration">Duration</label>
                                    <input type="text" name="duration" id="duration"
                                        class="form-control @error('duration') is-invalid @enderror {{ $errors->has('duration') ? 'error' : '' }}"
                                        value="{{ $movie->duration }}" />
                                    @error('duration')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-outline mb-3">
                                    <label class="form-label" for="rating">Rating</label>
                                    <input type="text" name="rating" id="rating"
                                        class="form-control @error('rating') is-invalid @enderror {{ $errors->has('rating') ? 'error' : '' }}"
                                        value="{{ $movie->rating }}" />
                                    @error('rating')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-outline mb-3">
                                    <label class="form-label" for="genre">Genre</label>
                                    <input type="text" name="genre" id="genre"
                                        class="form-control @error('genre') is-invalid @enderror {{ $errors->has('genre') ? 'error' : '' }}"
                                        value="{{ $movie->genre }}" />
                                    @error('genre')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-outline mb-3">
                                    <label class="form-label" for="director">Director</label>
                                    <input type="text" name="director" id="director"
                                        class="form-control @error('director') is-invalid @enderror {{ $errors->has('director') ? 'error' : '' }}"
                                        value="{{ $movie->director }}" />
                                    @error('director')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-outline mb-3">
                                    <label class="form-label" for="cast">Cast</label>
                                    <input type="text" name="cast" id="cast"
                                        class="form-control @error('cast') is-invalid @enderror {{ $errors->has('cast') ? 'error' : '' }}"
                                        value="{{ $movie->cast }}" />
                                    @error('cast')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-outline mb-3">
                                    <label class="form-label" for="show_time">Show Time</label>
                                    <input type="text" name="show_time" id="show_time"
                                        class="form-control @error('show_time') is-invalid @enderror {{ $errors->has('show_time') ? 'error' : '' }}"
                                        value="{{ old('show_time', $showTimes) }}"
                                        placeholder="Eg: 10:20, 12:00, 14:30" />
                                    @error('show_time')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>


                                <div class="form-outline mb-3">
                                    <label class="form-label" for="description">Description</label>
                                    <textarea name="description" id="description"
                                        class="form-control @error('description') is-invalid @enderror {{ $errors->has('description') ? 'error' : '' }}">{{ $movie->description }}</textarea>
                                    @error('description')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary btn-block rounded mb-3">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @push('scripts')
        <script src="{{ asset('assets/js/imagePreview.js?v=').time() }}"></script>
        @endpush
</x-app-layout>