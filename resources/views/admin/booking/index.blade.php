<x-app-layout>
    <div class="container-fluid content-inner mt-n5 py-0">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Bookings</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap5">
                                <div class="row align-items-center">
                                    <x-search />
                                    <div class="col-12 col-md-6 col-lg-6 px-0">
                                       
                                    </div>
                                </div>
                                <div class="table-responsive my-3">
                                    <table class="table dataTable" aria-describedby="datatable_info">
                                        <thead>
                                            <tr class="ligth">
                                                <th>S.N.</th>
                                                <th>Hall</th>
                                                <th>Movie</th>
                                                <th>Seat</th>
                                                <th>Date Booked</th>
                                                <th>Show Time</th>
                                                <th>Status</th>
                                                <th style="min-width: 100px">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($bookings as $booking)
                                                <tr>
                                                    <th scope="row">{{ $loop->iteration }}</th>
                                                    <td>{{ $booking->schedule->theater->name }}</td>
                                                    <td>{{ $booking->schedule->movie->name }}</td>
                                                    <td>{{ $booking->seat->label }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($booking->selected_date)->format('jS M, Y') }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($booking->selected_time)->format('g:i A') }}</td>
                                                    <td>{{ ucfirst($booking->status) }}</td>
                                                    <td>
                                                        <div class="flex align-items-center list-user-action">
                                                            <a class="btn btn-sm btn-icon btn-warning"
                                                               data-bs-toggle="tooltip" data-bs-placement="top"
                                                               data-original-title="Edit"
                                                               href="{{ route('booking.edit', $booking->slug) }}"
                                                               aria-label="Edit" data-bs-original-title="Edit">
                                                                <span class="btn-inner">
                                                                    <svg class="icon-20" width="20" viewBox="0 0 24 24"
                                                                         fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path
                                                                            d="M11.4925 2.78906H7.75349C4.67849 2.78906 2.75049 4.96606 2.75049 8.04806V16.3621C2.75049 19.4441 4.66949 21.6211 7.75349 21.6211H16.5775C19.6625 21.6211 21.5815 19.4441 21.5815 16.3621V12.3341"
                                                                            stroke="currentColor" stroke-width="1.5"
                                                                            stroke-linecap="round" stroke-linejoin="round">
                                                                        </path>
                                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                                            d="M8.82812 10.921L16.3011 3.44799C17.2321 2.51799 18.7411 2.51799 19.6721 3.44799L20.8891 4.66499C21.8201 5.59599 21.8201 7.10599 20.8891 8.03599L13.3801 15.545C12.9731 15.952 12.4211 16.181 11.8451 16.181H8.09912L8.19312 12.401C8.20712 11.845 8.43412 11.315 8.82812 10.921Z"
                                                                            stroke="currentColor" stroke-width="1.5"
                                                                            stroke-linecap="round" stroke-linejoin="round">
                                                                        </path>
                                                                        <path d="M15.1655 4.60254L19.7315 9.16854"
                                                                            stroke="currentColor" stroke-width="1.5"
                                                                            stroke-linecap="round" stroke-linejoin="round">
                                                                        </path>
                                                                    </svg>
                                                                </span>
                                                            </a>
                                                            <a class="btn btn-sm btn-icon btn-info"
                                                               data-bs-toggle="tooltip" data-bs-placement="top"
                                                               data-original-title="Cancel"
                                                               href="{{ route('booking.cancel', $booking->id) }}"
                                                               onclick="event.preventDefault(); document.getElementById('cancel-form-{{ $booking->id }}').submit();"
                                                               aria-label="Cancel" data-bs-original-title="Cancel">
                                                                <span class="btn-inner">
                                                                    <svg class="icon-20" width="20" viewBox="0 0 24 24"
                                                                         fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M6 18L18 6M6 6l12 12" stroke="currentColor"
                                                                              stroke-width="2" stroke-linecap="round"
                                                                              stroke-linejoin="round"></path>
                                                                    </svg>
                                                                </span>
                                                            </a>
                                                            <form id="cancel-form-{{ $booking->id }}"
                                                                  action="{{ route('booking.cancel', $booking->slug) }}"
                                                                  method="POST" style="display: none;">
                                                                @csrf
                                                                @method('POST')
                                                            </form>
                                                            <a class="btn btn-sm btn-icon btn-danger"
                                                               data-bs-toggle="modal"
                                                               data-bs-target="#delete_{{ $booking->id }}"
                                                               data-bs-original-title="Delete"
                                                               aria-label="Delete">
                                                                <span class="btn-inner">
                                                                    <svg class="icon-20" width="20" viewBox="0 0 24 24"
                                                                         fill="none" xmlns="http://www.w3.org/2000/svg"
                                                                         stroke="currentColor">
                                                                        <path
                                                                            d="M19.3248 9.46826C19.3248 9.46826 18.7818 16.2033 18.4668 19.0403C18.3168 20.3953 17.4798 21.1893 16.1088 21.2143C13.4998 21.2613 10.8878 21.2643 8.27979 21.2093C6.96079 21.1823 6.13779 20.3783 5.99079 19.0473C5.67379 16.1853 5.13379 9.46826 5.13379 9.46826"
                                                                            stroke="currentColor" stroke-width="1.5"
                                                                            stroke-linecap="round" stroke-linejoin="round">
                                                                        </path>
                                                                        <path d="M20.708 6.23975H3.75" stroke="currentColor"
                                                                              stroke-width="1.5" stroke-linecap="round"
                                                                              stroke-linejoin="round"></path>
                                                                        <path
                                                                            d="M17.4406 6.23973C16.6556 6.23973 15.9796 5.68473 15.8256 4.91573L15.5826 3.69973C15.4326 3.13873 14.9246 2.75073 14.3456 2.75073H10.1126C9.53358 2.75073 9.02558 3.13873 8.87558 3.69973L8.63258 4.91573C8.47858 5.68473 7.80258 6.23973 7.01758 6.23973"
                                                                            stroke="currentColor" stroke-width="1.5"
                                                                            stroke-linecap="round" stroke-linejoin="round">
                                                                        </path>
                                                                    </svg>
                                                                </span>
                                                            </a>
                                                            <!-- Delete Modal -->
                                                            <div class="modal fade" id="delete_{{ $booking->id }}"
                                                                 tabindex="-1" role="dialog" aria-labelledby="deleteTitle"
                                                                 aria-hidden="true">
                                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-body text-center">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="45"
                                                                                 height="45" fill="#D21312"
                                                                                 class="bi bi-exclamation-triangle"
                                                                                 viewBox="0 0 16 16">
                                                                                <path
                                                                                    d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.146.146 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.163.163 0 0 1-.054.06.116.116 0 0 1-.066.017H1.146a.115.115 0 0 1-.066-.017.163.163 0 0 1-.054-.06.176.176 0 0 1 .002-.183L7.884 2.073a.147.147 0 0 1 .054-.057zm1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566z" />
                                                                                <path
                                                                                    d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995z" />
                                                                            </svg>
                                                                            <h2 class="mt-3 mb-1">Are you sure?</h2>
                                                                            <h5>Do you really want to delete this booking?</h5>
                                                                        </div>
                                                                        <div class="modal-footer justify-content-center">
                                                                            <button type="button" class="btn btn-secondary rounded-pill"
                                                                                    data-bs-dismiss="modal">Close</button>
                                                                            <form action="{{ route('booking.destroy', $booking->slug) }}"
                                                                                  method="POST">
                                                                                @csrf
                                                                                @method('DELETE')
                                                                                <button type="submit"
                                                                                        class="btn btn-danger rounded-pill">Yes</button>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="8" class="text-center py-5">
                                                        No bookings found
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                                {{ $bookings->links('vendor.pagination.simple-tailwind') }}
                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>