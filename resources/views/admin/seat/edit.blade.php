<x-app-layout>
    <div class="container-fluid content-inner mt-n5 py-0">
        <div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Edit Seat</h4>
                            </div>
                            <div class="back">
                                <a href="{{ route('seats') }}"
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
                            <form method="POST" action="{{ route('seat.update', $seat->slug) }}">
                                @csrf
                                @method('PUT')

                                <div class="form-outline mb-3">
                                    <label class="form-label" for="theater_id">Theater</label>
                                    <select name="theater_id" id="theater_id"
                                        class="form-control @error('theater_id') is-invalid @enderror">
                                        @foreach ($theaters as $theater)
                                            <option value="{{ $theater->id }}"
                                                {{ old('theater_id', $seat->theater_id) == $theater->id ? 'selected' : '' }}>
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
                                        <label class="form-label" for="row">Row (E.G: A)</label>
                                        <input type="text" name="row" id="row"
                                            class="form-control @error('row') is-invalid @enderror"
                                            value="{{ old('row', $seat->row) }}" maxlength="1" />
                                        @error('row')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-lg-6 form-outline mb-3">
                                        <label class="form-label" for="number">Seat Number</label>
                                        <input type="number" name="number" id="number"
                                            class="form-control @error('number') is-invalid @enderror"
                                            value="{{ old('number', $seat->number) }}" min="1" placeholder="E.G: 1"/>
                                        @error('number')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-outline mb-3">
                                    <label class="form-label" for="type">Seat Type</label>
                                    <select name="type" id="type"
                                        class="form-control @error('type') is-invalid @enderror">
                                        <option value="standard" {{ old('type', $seat->type) == 'standard' ? 'selected' : '' }}>Standard</option>
                                        <option value="premium" {{ old('type', $seat->type) == 'premium' ? 'selected' : '' }}>Premium</option>
                                        <option value="vip" {{ old('type', $seat->type) == 'vip' ? 'selected' : '' }}>VIP</option>
                                    </select>
                                    @error('type')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-outline mb-3">
                                    <label class="form-label" for="price">Price</label>
                                    <input type="text" name="price" id="price"
                                        class="form-control @error('price') is-invalid @enderror"
                                        value="{{ old('price', $seat->price) }}" />
                                    @error('price')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary btn-block rounded mb-3">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>
