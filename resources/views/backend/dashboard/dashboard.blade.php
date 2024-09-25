@extends('backend.layout.app')

@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/datable.css') }}">
@endpush

@section('content')
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header is-small-screen">
        <main class="mdl-layout__content ui-list-components">
            <div class="mdl-grid">
                <div class="mdl-cell mdl-cell--12-col-desktop mdl-cell--12-col-tablet mdl-cell--4-col-phone mdl-cell--top">
                    <div class="mdl-card">
                        <div class="mdl-card__title">
                            <h5 class="mdl-card__title-text text-color--white">List components</h5>
                        </div>
                        <div class="mdl-card__supporting-text">
                            <div class="mdl-grid">
                                <div class="mdl-cell mdl-cell--12-col-desktop mdl-cell--12-col-tablet mdl-cell--4-col-phone">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <span class="list-title text-color--smooth-gray">SIMPLE LIST</span>
                                        <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#addTicketModal">
                                            Add Ticket
                                        </button>
                                    </div>
                                    <table id="dataTable1" class="table table-striped" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Sl</th>
                                                <th>Name</th>
                                                <th>Description</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $i = 1;
                                            @endphp
                                            @foreach ($tickets as $ticket)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{ $ticket->subject }}</td>
                                                <td>{{ $ticket->issues }}</td>
                                                <td>{{ $ticket->status }}</td>
                                                <td>
                                                    <div class="d-flex align-items-center gap-2">
                                                        <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editTicketModal{{ $ticket->id }}">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <form action="{{ route('ticket.destroy', $ticket->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-danger" type="submit"><i class="fas fa-trash"></i></button>
                                                        </form>
                                                        
                                                            
                                                        @php
                                                            $auth = Auth::user();
                                                        @endphp
                                                        @if ($auth->is_admin === 'yes')
                                                        <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createTicketModal{{ $ticket->id }}">
                                                            <i class="fas fa-plus"></i>
                                                        </a>
                                                        @endif
                                                        
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Add Ticket Modal -->
    <div class="modal fade" id="addTicketModal" tabindex="-1" aria-labelledby="addTicketModalLabel" aria-hidden="true">
        <div class="modal-dialog modal_width">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addTicketModalLabel">Add Ticket</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('ticket.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="subject" class="form-label"><strong>Subject</strong></label>
                            <input type="text" name="subject" id="subject" class="form-control" placeholder="Enter ticket subject" required>
                        </div>
                        <div class="mb-3">
                            <label for="issues" class="form-label"><strong>Issues</strong></label>
                            <textarea class="form-control" name="issues" id="issues" cols="30" rows="10"></textarea>
                        </div>
                       
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Ticket Modals -->
    @foreach ($tickets as $ticket)
    <div class="modal fade" id="editTicketModal{{ $ticket->id }}" tabindex="-1" aria-labelledby="editTicketModalLabel{{ $ticket->id }}" aria-hidden="true">
        <div class="modal-dialog modal_width">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editTicketModalLabel{{ $ticket->id }}">Edit Ticket</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('ticket.update', $ticket->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="subject{{ $ticket->id }}" class="form-label"><strong>Subject</strong></label>
                            <input type="text" name="subject" id="subject{{ $ticket->id }}" class="form-control" value="{{ $ticket->subject }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="issues{{ $ticket->id }}" class="form-label"><strong>Issues</strong></label>
                            <textarea class="form-control" name="issues" id="issues{{ $ticket->id }}" cols="30" rows="10">{{ $ticket->issues }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="status{{ $ticket->id }}" class="form-label"><strong>Status</strong></label>
                            <select name="status" id="status{{ $ticket->id }}" class="form-control">
                                <option value="open" {{ $ticket->status == 'open' ? 'selected' : '' }}>Open</option>
                                <option value="closed" {{ $ticket->status == 'closed' ? 'selected' : '' }}>Closed</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <!-- Create Ticket Response Modals -->
    @foreach ($tickets as $ticket)
    <div class="modal fade" id="createTicketModal{{ $ticket->id }}" tabindex="-1" aria-labelledby="editTicketModalLabel{{ $ticket->id }}" aria-hidden="true">
        <div class="modal-dialog modal_width">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editTicketModalLabel{{ $ticket->id }}">Create Response</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('response.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <input type="hidden" name="ticket_id" id="ticket_id" class="form-control" value="{{ $ticket->id }}">
                        </div>
                        <div class="mb-3">
                            <label for="response" class="form-label"><strong>Response</strong></label>
                            <textarea class="form-control" name="response" id="response" cols="30" rows="10"></textarea>
                        </div>
                       
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach

@endsection

@push('js')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#dataTable1').DataTable({
                "dom": '<"top"f>rt<"bottom"lpi>',
                "language": {
                    "search": "",
                    "searchPlaceholder": "Search..."
                },
                "lengthMenu": [5, 10, 25, 50],
                "pagingType": "simple_numbers",
            });
        });
    </script>
@endpush