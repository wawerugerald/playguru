<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Regions') }}
        </h2>
    </x-slot>

    <div class="container mt-4">
        <div class="mb-3">
            <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#addRegionModal">
                Add Region
            </button>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>{{ __('Region Name') }}</th>
                        <th>{{ __('Actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($regions as $region)
                        <tr>
                            <td>{{ $region->id }}</td>
                            <td>{{ $region->region_name }}</td>
                            <td>
                                <a href="#" class="btn btn-info btn-sm">View</a>
                                <button class="btn btn-warning btn-sm edit-btn" data-id="{{ $region->id }}" data-name="{{ $region->region_name }}" data-toggle="modal" data-target="#editRegionModal">Edit</button>
                                <form action="#" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Add Region Modal -->
    <div class="modal fade" id="addRegionModal" tabindex="-1" aria-labelledby="addRegionModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addRegionModalLabel">{{ __('Add Region') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span>&times;</span>
                    </button>
                </div>
                <form action="{{ route('regions.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="regionName">{{ __('Region Name') }}</label>
                            <input type="text" class="form-control" id="regionName" name="region_name" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Close') }}</button>
                        <button type="submit" class="btn btn-primary">{{ __('Add Region') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Region Modal -->
    <div class="modal fade" id="editRegionModal" tabindex="-1" aria-labelledby="editRegionModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editRegionModalLabel">{{ __('Edit Region') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span>&times;</span>
                    </button>
                </div>
                <form id="editRegionForm" action="" method="POST">
                    @csrf
    @method('PUT')
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="editRegionName">{{ __('Region Name') }}</label>
                            <input type="text" class="form-control" id="editRegionName" name="region_name" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Close') }}</button>
                        <button type="submit" class="btn btn-primary">{{ __('Update Region') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
    $(document).ready(function() {
    $('.edit-btn').on('click', function() {
        var regionId = $(this).data('id');
        var regionName = $(this).data('region_name');

        // Set the action for the form
        $('#editRegionForm').attr('action', '/regions/' + regionId);

        // Populate the input field with the current region name
        $('#editRegionName').val(regionName);
    });
});
    </script>
</x-app-layout>
