<x-app-layout>
    <div class="container-fluid content-inner mt-n5 py-0">
        <div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Create</h4>
                            </div>
                            <div class="back">
                                <a href="{{ route('theaters') }}"
                                    class="text-center btn btn-primary btn-icon mt-lg-0 mt-md-0 mt-3">
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
                            <form method="POST" action="{{ route('seat.store') }}">
                                @csrf
                                <div class="form-outline mb-3">
                                    <label class="form-label" for="theater_id">Theater</label>
                                    <select name="theater_id" id="theater_id"
                                        class="form-control @error('theater_id') is-invalid @enderror">
                                        <option value="">Select Theater</option>
                                        @foreach ($theaters as $theater)
                                        <option value="{{ $theater->id }}" {{ old('theater_id')==$theater->id ?
                                            'selected' : '' }}>
                                            {{ $theater->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('theater_id')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="row">
                                    <div class="col-12 col-lg-6 form-outline mb-3">
                                        <label class="form-label" for="row_start">Row Start (E.g: A)</label>
                                        <input type="text" name="row_start" id="row_start"
                                            class="form-control @error('row_start') is-invalid @enderror"
                                            value="{{ old('row_start') }}" />
                                        @error('row_start')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-lg-6 form-outline mb-3">
                                        <label class="form-label" for="row_end">Row End (E.g: D)</label>
                                        <input type="text" name="row_end" id="row_end"
                                            class="form-control @error('row_end') is-invalid @enderror"
                                            value="{{ old('row_end') }}" />
                                        @error('row_end')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12 col-lg-6 form-outline mb-3">
                                        <label class="form-label" for="number_start">Seat Start</label>
                                        <input type="number" name="number_start" id="number_start"
                                            class="form-control @error('number_start') is-invalid @enderror"
                                            value="{{ old('number_start') }}" placeholder="E.G: 1" />
                                        @error('number_start')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-lg-6 form-outline mb-3">
                                        <label class="form-label" for="number_end">Seat End</label>
                                        <input type="number" name="number_end" id="number_end"
                                            class="form-control @error('number_end') is-invalid @enderror"
                                            value="{{ old('number_end') }}" placeholder="E.G: 15"/>
                                        @error('number_end')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row align-items-end">
                                    <div class="col-12 col-lg-6 form-outline mb-3">
                                        <label class="form-label" for="type">Seat Type</label>
                                        <select name="type" id="type"
                                            class="form-control @error('type') is-invalid @enderror">
                                            <option value="">Select a seat type</option>
                                            <option value="standard" {{ old('type')=='standard' ? 'selected' : '' }}>
                                                Standard</option>
                                            <option value="accessible" {{ old('type')=='accessible' ? 'selected' : '' }}>Accessible
                                            </option>
                                            <option value="vip" {{ old('type')=='vip' ? 'selected' : '' }}>VIP</option>
                                        </select>
                                        @error('type')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-lg-6 form-outline mb-3">
                                        <label class="form-label" for="price">Price</label>
                                        <input type="text" name="price" id="price"
                                            class="form-control @error('price') is-invalid @enderror {{ $errors->has('price') ? 'error' : '' }}"
                                            value="{{ old('price') }}" />
                                        @error('price')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary btn-block rounded mb-3">Create</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>