<x-app-layout>
    <div class="container-fluid content-inner mt-n5 py-0">
        <div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Edit</h4>
                            </div>
                            <div class="back">
                                <a href="{{ route('bookings') }}"
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
                            <form method="POST" action="{{ route('booking.update', $booking->slug) }}">
                                @csrf
                                @method('PUT')
                                <div class="form-outline mb-3">
                                    <label class="form-label" for="user_id">User</label>
                                    <select name="user_id" id="user_id"
                                            class="form-control @error('user_id') is-invalid @enderror">
                                        <option value="">Select User</option>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}"
                                                    {{ old('user_id', $booking->user_id) == $user->id ? 'selected' : '' }}>
                                                {{ $user->email }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('user_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-outline mb-3">
                                    <label class="form-label" for="movie_schedule_id">Movie Schedule</label>
                                    <select name="movie_schedule_id" id="movie_schedule_id"
                                            class="form-control @error('movie_schedule_id') is-invalid @enderror">
                                        <option value="">Select Schedule</option>
                                        @foreach ($schedules as $schedule)
                                            <option value="{{ $schedule->id }}"
                                                    {{ old('movie_schedule_id', $booking->movie_schedule_id) == $schedule->id ? 'selected' : '' }}>
                                                {{ $schedule->movie->name }} - {{ \Carbon\Carbon::parse($schedule->show_time)->format('g:i A') }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('movie_schedule_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-outline mb-3">
                                    <label class="form-label" for="seat_id">Seat</label>
                                    <select name="seat_id" id="seat_id"
                                            class="form-control @error('seat_id') is-invalid @enderror">
                                        <option value="">Select Seat</option>
                                        @foreach ($seats as $seat)
                                            <option value="{{ $seat->id }}"
                                                    {{ old('seat_id', $booking->seat_id) == $seat->id ? 'selected' : '' }}>
                                                {{ $seat->label.'-'.$seat->type }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('seat_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-outline mb-3">
                                    <label class="form-label" for="selected_date">Date Booked</label>
                                    <input type="date" name="selected_date" id="selected_date"
                                           class="form-control @error('selected_date') is-invalid @enderror"
                                           value="{{ old('selected_date', $booking->selected_date) }}" />
                                    @error('selected_date')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                
                                <div class="form-outline mb-3">
                                    <label class="form-label" for="status">Status</label>
                                    <select name="status" id="status"
                                            class="form-control @error('status') is-invalid @enderror">
                                        <option value="">Select a role</option>
                                        <option value="booked"
                                                {{ old('status', $booking->status) == 'booked' ? 'selected' : '' }}>
                                            Booked
                                        </option>
                                        <option value="cancelled"
                                                {{ old('status', $booking->status) == 'cancelled' ? 'selected' : '' }}>
                                            Cancelled
                                        </option>
                                    </select>
                                    @error('status')
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