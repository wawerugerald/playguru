<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Industries') }}
        </h2>
    </x-slot>
    <div class="container mt-4">
        {{-- <div class="mb-3">
            <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#addRegionModal">
                Add Industry
            </button>
        </div> --}}
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        {{-- <th>#</th> --}}
                        <th>{{ __('Industry Name') }}</th>
                        <th>{{ __('Description') }}</th>
                        {{-- <th>{{ __('Actions') }}</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($industries as $industry)
                        <tr>
                            <td>{{ $industry->name }}</td>
                            <td>{{ $industry->description }}</td>
                            {{-- <td>
                                <a href="#" class="btn btn-info btn-sm">View</a>
                                <button class="btn btn-warning btn-sm edit-btn" data-id="{{ $industry->id }}"
                                    data-name="{{ $industry->name }}" data-toggle="modal"
                                    data-target="#editRegionModal">Edit</button>
                                <form action="#" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td> --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- Pagination Links -->
        <div class="mt-4">
            {{ $industries->links() }}
        </div>
    </div>

      <!-- Add Region Modal -->
      <div class="modal fade" id="addRegionModal" tabindex="-1" aria-labelledby="addRegionModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addRegionModalLabel">{{ __('Add Industry') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span>&times;</span>
                    </button>
                </div>
                <form action="{{ route('industries.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="regionName">{{ __('Industry Name') }}</label>
                            <input type="text" class="form-control" id="regionName" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="description">{{ __('Description') }}</label>
                            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">{{ __('Close') }}</button>
                        <button type="submit" class="btn btn-primary">{{ __('Add Industry') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
