   <!-- Display Success/Error Messages -->
@if (session('success'))
    <div class="alert alert-success mt-3">
        {{ session('success') }}
    </div>
    @endif
    @if (session('error'))
    <div class="alert alert-danger mt-3">
        {{ session('error') }}
    </div>
    @endif

    <section class="movie-details-body">
        <!-- Movie Cover -->
        <div class="row-fluid movie-details-cover d-flex align-items-stretch">
            <div class="overlay col-12"></div>
        </div>

        <div class="container">
            <!-- Movie Details Card -->
            <div class="card">
                <div class="row-fluid d-flex flex-wrap movie-card-wrapper rounded p-3">
                    <div class="movie-card-image p-0 col-12 col-md-12 col-lg-4 col-xl-4">
                        <div class="img-wrapper-ii rounded">
                            <img class="col-12 m-0 p-0 rounded" src="{{ asset('storage/'.$details->image) }}"
                                alt="{{ $details->alt }}" />
                        </div>
                    </div>
                    <div
                        class="movie-card-info col-12 col-md-12 col-lg-8 col-xl-8 pl-2 pl-sm-2 pl-md-2 pl-lg-4 pl-xl-4 pt-0 pt-sm-0 pt-md-0 pt-lg-3 pt-xl-3">
                        <div class="movie-detail-head d-flex align-items-end justify-content-between">
                            <h2 class="sub-heading mt-4 mt-sm-4 mt-md-4 mt-lg-0 mt-xl-0">
                                {{ $details->name }}
                            </h2>
                        </div>
                        <div class="row-fluid d-flex align-items-end mb-4">
                            <div class="left-line col-5 col-sm-4 col-md-3 col-lg-2 col-xl-2"></div>
                            <div class="right-line"></div>
                        </div>
                        <div class="row-fluid d-flex mb-2">
                            @forelse (explode(',', $details->genre) as $genre)
                            <p class="desc-text pill genre px-2 py-1">{{ trim($genre) }}</p>
                            @empty
                            <p class="desc-text pill genre px-2 py-1">No genres available</p>
                            @endforelse
                        </div>
                        <div class="row d-flex">
                            <div
                                class="movie-detail-date mb-4 d-flex align-items-center col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                <i class="fa-solid fa-calendar-days"></i>
                                <p class="date label-text-i m-0">
                                    {{ \Carbon\Carbon::parse($details->release_date)->format('jS M, Y') }}</p>
                            </div>
                            <div
                                class="movie-detail-duration mb-4 d-flex align-items-center col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                <i class="fa-regular fa-clock"></i>
                                <p class="duration label-text-i m-0">{{ $details->duration }} Hrs</p>
                            </div>
                            <div
                                class="movie-detail-rating mb-4 d-flex align-items-center col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                <i class="fa-solid fa-star pb-1"></i>
                                <p class="rating label-text-i m-0">{{ $details->rating }}</p>
                            </div>
                        </div>
                        <div class="movie-detail-desc">
                            <p class="label-text-i mb-2">Genre: {{ $details->genre }}</p>
                            <p class="desc-text">
                                {{ $details->description }}
                            </p>
                        </div>
                        <div class="casts-directors row-fluid d-flex flex-wrap">
                            <div class="movie-detail-casts p-0 col-12 col-sm-12 col-md-6 col-lg-8 col-xl-8">
                                <p class="label-text-i mb-2">Casts:</p>
                                <p class="desc-text">{{ $details->cast }}</p>
                            </div>
                            <div class="movie-detail-director p-0 col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4">
                                <p class="label-text-i mb-2">Directed by:</p>
                                <p class="label-text-i mb-2">{{ $details->director }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- User Bookings with Cancel Functionality -->
            <div class="tab-con">

                @if(auth()->check() && !empty($userBookings))
                <div class="user-bookings mt-4 p-4 rounded">
                    <h2 class="sub-heading">Your Bookings</h2>
                    <div class="row-fluid d-flex align-items-end mb-4">
                        <div class="left-line col-8 col-sm-8 col-md-4 col-lg-5 col-xl-5"></div>
                        <div class="right-line"></div>
                    </div>
                    <div class="bookings-list">
                        @foreach($userBookings as $booking)
                        <div
                            class="booking-item d-flex justify-content-between align-items-center mb-3 p-3 rounded border">
                            <div>
                                <p class="desc-text m-0">Seat: {{ $booking['seat_label'] }}</p>
                                <p class="desc-text m-0">Date: {{ $booking['date'] }}</p>
                                <p class="desc-text m-0">Time: {{ $booking['time'] }}</p>
                                <p class="desc-text m-0">Status: {{ ucfirst($booking['status']) }}</p>
                            </div>
                            {{-- <button wire:click="cancelBooking({{ $booking['id'] }})" class="btn btn-danger btn-sm"
                                aria-label="Cancel booking for seat {{ $booking['seat_label'] }}">
                                {{$booking['status'] == 'booked' ? 'Cancel' : 'Reserve'}}
                            </button> --}}
                            <button
                                wire:click="{{ $booking['status'] == 'booked' ? 'cancelBooking('.$booking['id'].')' : 'reserveBooking('.$booking['id'].')' }}"
                                class="btn btn-danger btn-sm"
                                aria-label="{{ $booking['status'] == 'booked' ? 'Cancel booking for seat '.$booking['seat_label'] : 'Reserve booking for seat '.$booking['seat_label'] }}">
                                {{ $booking['status'] == 'booked' ? 'Cancel' : 'Reserve' }}
                            </button>

                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>

            <!-- Booking Promotion -->
            <div class="proceed-booking d-flex flex-column align-items-center p-4 mt-4">
                <h3 class="sub-heading-sm text-white">Best Experience at</h3>
                <h1 class="sub-heading mb-1">CHEAPEST PRICE, ONSCAPE</h1>
            </div>

            <!-- Date, Time, and Seat Selection -->
            <div class="row">
                <div class="tab col-12" id="demo">
                    <div class="tab-con">
                        <div class="j-tab-con">
                            <div class="tab-con-item" style="display: block">
                                <div class="row-fluid d-flex flex-wrap align-items-center mt-4 movie-details-date-time">
                                    <!-- Date Selection -->
                                    <div
                                        class="booking-details-date row-fluid mt-4 col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 mb-4">
                                        <h2 class="sub-heading">Select Date</h2>
                                        <div class="row-fluid d-flex align-items-end mb-4">
                                            <div class="left-line col-8 col-sm-8 col-md-4 col-lg-5 col-xl-5"></div>
                                            <div class="right-line"></div>
                                        </div>
                                        <div class="booking-date-row d-flex flex-wrap">
                                            @for ($i = 0; $i < 4; $i++) @php $date=\Carbon\Carbon::today()->addDays($i);
                                                @endphp
                                                <div wire:click="selectDate('{{ $date->format('Y-m-d') }}')"
                                                    class="booking-date rounded p-2 d-flex flex-column align-items-center cursor-pointer {{ $selectedDate == $date->format('Y-m-d') ? 'border border-info' : '' }}"
                                                    aria-label="Select date {{ $date->format('l, d F') }}">
                                                    <p class="desc-text m-0">{{ $date->format('l') }}</p>
                                                    <h1 class="desc-text green m-0">{{ $date->format('d') }}</h1>
                                                    <p class="desc-text m-0">{{ $date->format('F') }}</p>
                                                </div>
                                                @endfor
                                        </div>
                                    </div>
                                    <!-- Time Selection -->
                                    <div
                                        class="booking-details-time row-fluid mt-4 mb-4 col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                        <h2 class="sub-heading">Select Time</h2>
                                        <div class="row-fluid d-flex align-items-end mb-4">
                                            <div class="left-line col-8 col-sm-8 col-md-4 col-lg-5 col-xl-5"></div>
                                            <div class="right-line"></div>
                                        </div>
                                        <div class="booking-time-row d-flex flex-wrap">
                                            @forelse($showTimes as $time)
                                            @php $carbonTime = \Carbon\Carbon::createFromFormat('H:i', $time); @endphp
                                            <div wire:click="selectTime('{{ $time }}')"
                                                class="booking-time rounded p-2 d-flex flex-column align-items-center justify-content-center cursor-pointer {{ $selectedTime == $time ? 'border border-info' : '' }}"
                                                aria-label="Select time {{ $carbonTime->format('g:i A') }}">
                                                <p class="desc-text m-0">{{ $carbonTime->format('g:i') }}</p>
                                                <h1 class="desc-text green m-0">{{ $carbonTime->format('A') }}</h1>
                                            </div>
                                            @empty
                                            <p class="desc-text">No showtimes available</p>
                                            @endforelse
                                        </div>
                                    </div>
                                </div>

                                <!-- Seat Selection with Disabled Booked Seats -->
                                <div class="seat-selection-section p-3">
                                    <div class="row-fluid">
                                        <h2 class="sub-heading">Seat Selection</h2>
                                        <div class="row-fluid d-flex align-items-end mb-4">
                                            <div class="left-line col-9 col-sm-9 col-md-5 col-lg-4 col-xl-4"></div>
                                            <div class="right-line"></div>
                                        </div>
                                    </div>
                                    <div class="seat-section p-0 col-12 d-flex flex-column align-items-center">
                                        <p class="desc-text mb-0 mt-4 mb-2 p-0">Screen</p>
                                        <img src="{{ asset('main/images/screen.png') }}"
                                            class="col-11 col-sm-10 col-md-9 col-lg-6 col-xl-6 mb-5" alt="Screen" />
                                        <p class="desc-text mb-4 p-0">Seats</p>
                                        <div
                                            class="seats col-12 col-sm-12 col-md-12 col-lg-8 col-xl-8 m-0 p-0 overflow-x-auto">
                                            @foreach($seats as $row => $rowSeats)
                                            @php
                                            $layout = 'group';
                                            if ($row === 'A') $layout = 'single';
                                            elseif ($row === 'B') $layout = 'couple';
                                            $type = $rowSeats->first()->type ?? 'vip';
                                            @endphp
                                            <div
                                                class="seats-row mb-4 d-flex align-items-center justify-content-center {{ $layout }}">
                                                <div class="d-flex flex-nowrap">
                                                    @if($layout == 'couple')
                                                    @for($i = 0; $i < count($rowSeats); $i +=2) <div
                                                        class="d-flex couple-pair">
                                                        @for($j = 0; $j < 2 && ($i + $j) < count($rowSeats); $j++) @php
                                                            $seat=$rowSeats[$i + $j]; $isBooked=in_array($seat->id,
                                                            $bookedSeats);
                                                            $isSelected = in_array($seat->id, $selectedSeats);
                                                            @endphp
                                                            @if($isBooked)
                                                            <i class="fa-solid fa-couch booked"
                                                                title="Seat {{ $seat->label }} - Booked"
                                                                style="cursor: not-allowed"
                                                                aria-label="Seat {{ $seat->label }} Booked"></i>
                                                            @else
                                                            <i wire:click="selectSeat({{ $seat->id }})"
                                                                class="fa-solid fa-couch {{ $isSelected ? 'selected' : $type }}"
                                                                title="{{ $seat->label }} - £{{ $seat->price }}"
                                                                style="cursor: pointer"
                                                                aria-label="Seat {{ $seat->label }} {{ $isSelected ? 'Selected' : 'Available' }}"></i>
                                                            @endif
                                                            @endfor
                                                </div>
                                                @endfor
                                                @else
                                                @foreach($rowSeats as $seat)
                                                @php
                                                $isBooked = in_array($seat->id, $bookedSeats);
                                                $isSelected = in_array($seat->id, $selectedSeats);
                                                @endphp
                                                @if($isBooked)
                                                <i class="fa-solid fa-couch booked"
                                                    title="Seat {{ $seat->label }} - Booked" style="cursor: not-allowed"
                                                    aria-label="Seat {{ $seat->label }} Booked"></i>
                                                @else
                                                <i wire:click="selectSeat({{ $seat->id }})"
                                                    class="fa-solid fa-couch {{ $isSelected ? 'selected' : $seat->type }}"
                                                    title="{{ $seat->label }} - £{{ $seat->price }}"
                                                    style="cursor: pointer"
                                                    aria-label="Seat {{ $seat->label }} {{ $isSelected ? 'Selected' : 'Available' }}"></i>
                                                @endif
                                                @endforeach
                                                @endif
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <!-- Seat Legend -->
                                <div class="d-flex justify-content-center" wire:polling.debounce.500ms>

                                    <div
                                        class="row-fluid  m-0 mt-4 p-2 col-12 col-sm-10 col-md-9 col-lg-6 col-xl-6 d-flex flex-wrap justify-content-between align-items-center legend rounded">
                                        <p class="desc-text m-0">
                                            <i class="fa-solid fa-couch standard m-0"></i> Standard
                                        </p>
                                        <p class="desc-text m-0">
                                            <i class="fa-solid fa-couch accessible m-0"></i> Accessible
                                        </p>
                                        <p class="desc-text m-0">
                                            <i class="fa-solid fa-couch vip m-0"></i> VIP
                                        </p>
                                        <p class="desc-text m-0">
                                            <i class="fa-solid fa-couch selected m-0"></i> Selected
                                        </p>
                                        <p class="desc-text m-0">
                                            <i class="fa-solid fa-couch booked m-0"></i> Booked
                                        </p>
                                    </div>
                                </div>
                                <!-- Booking Info and Proceed Button -->
                                <div
                                    class="d-flex flex-wrap justify-content-between align-items-center col-12 mt-5 py-4 rounded booking-info">
                                    <div
                                        class="choose-seat-info text-center col-12 col-sm-12 col-md-4 col-lg-3 col-xl-3 mb-4 mb-sm-4 mb-md-0 mb-lg-0 mb-lg-0">
                                        <p class="desc-text m-0">Selected Seats</p>
                                        <h4 class="sub-heading-sm text-white">
                                            {{ !empty($selectedSeats) ? implode(', ', \App\Models\Seat::whereIn('id',
                                            $selectedSeats)->pluck('label')->toArray()) : 'None' }}
                                        </h4>
                                    </div>
                                    <div
                                        class="price-info text-center col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 mb-4 mb-sm-4 mb-md-0 mb-lg-0 mb-lg-0">
                                        <p class="desc-text m-0">Total</p>
                                        <h4 class="sub-heading-sm text-white">£{{ number_format($totalPrice, 2) }}</h4>
                                    </div>
                                    <button wire:click="proceed"
                                        class="btn btn-lg button col-12 col-sm-12 col-md-4 col-lg-3 col-xl-3"
                                        aria-label="Proceed with booking">
                                        PROCEED
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}