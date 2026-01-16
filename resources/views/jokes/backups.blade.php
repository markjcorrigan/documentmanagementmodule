@extends('jokes.layout')

@section('title', 'Jokes & Categories Backups')

@section('content')
    <div class="page-header d-flex justify-content-between align-items-center">
        <h1><i class="bi bi-database"></i> Jokes & Categories Backups</h1>
        <div>
            <a href="{{ route('jokes.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Back to Jokes
            </a>
            <a href="{{ route('jokes.backup') }}" class="btn btn-primary" 
               onclick="return confirm('Create a new backup of jokes and categories tables?')">
                <i class="bi bi-download"></i> Create New Backup
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            <i class="bi bi-check-circle"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show">
            <i class="bi bi-exclamation-triangle"></i> {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if(count($backups) > 0)
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">
                    <i class="bi bi-archive"></i> Available Backups ({{ count($backups) }})
                </h5>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover table-striped mb-0">
                        <thead class="table-dark">
                            <tr>
                                <th>Filename</th>
                                <th>Date Created</th>
                                <th class="text-center">Jokes</th>
                                <th class="text-center">Categories</th>
                                <th>Backed Up By</th>
                                <th>Size</th>
                                <th>Version</th>
                                <th class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($backups as $backup)
                                <tr>
                                    <td>
                                        <i class="bi bi-file-earmark-zip text-primary"></i>
                                        <code class="small">{{ $backup['filename'] }}</code>
                                    </td>
                                    <td>
                                        <i class="bi bi-calendar"></i> {{ $backup['date'] }}
                                    </td>
                                    <td class="text-center">
                                        <span class="badge bg-info">{{ $backup['total_jokes'] }}</span>
                                    </td>
                                    <td class="text-center">
                                        <span class="badge bg-success">{{ $backup['total_categories'] }}</span>
                                    </td>
                                    <td>
                                        <small class="text-muted">
                                            <i class="bi bi-person"></i> {{ $backup['backed_up_by'] }}
                                        </small>
                                    </td>
                                    <td>
                                        <span class="badge bg-secondary">{{ $backup['size'] }}</span>
                                    </td>
                                    <td>
                                        <span class="badge bg-dark">v{{ $backup['version'] }}</span>
                                    </td>
                                    <td class="text-end">
                                        <div class="btn-group btn-group-sm" role="group">
                                            <a href="{{ route('jokes.backups.download', $backup['filename']) }}" 
                                               class="btn btn-primary" 
                                               title="Download">
                                                <i class="bi bi-download"></i>
                                            </a>
                                            
                                            <button type="button" 
                                                    class="btn btn-success restore-backup"
                                                    data-filename="{{ $backup['filename'] }}"
                                                    data-jokes="{{ $backup['total_jokes'] }}"
                                                    data-categories="{{ $backup['total_categories'] }}"
                                                    title="Restore">
                                                <i class="bi bi-arrow-counterclockwise"></i>
                                            </button>
                                            
                                            <form action="{{ route('jokes.backups.delete', $backup['filename']) }}" 
                                                  method="POST" 
                                                  class="d-inline delete-form">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" title="Delete">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer text-muted bg-light">
                <div class="row">
                    <div class="col-md-6">
                        <small>
                            <i class="bi bi-info-circle"></i> 
                            Backups stored in: <code>storage/app/backups/jokesbackup/</code>
                        </small>
                    </div>
                    <div class="col-md-6 text-end">
                        <small>
                            <i class="bi bi-clock-history"></i> 
                            Total backups: <strong>{{ count($backups) }}</strong>
                        </small>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="alert alert-info">
            <h5><i class="bi bi-info-circle"></i> No Backups Found</h5>
            <p class="mb-0">You haven't created any backups yet. Click the "Create New Backup" button above to create your first backup.</p>
        </div>
    @endif

    <!-- Information Cards -->
    <div class="row mt-4">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-light">
                    <h5 class="mb-0"><i class="bi bi-question-circle"></i> What's Backed Up?</h5>
                </div>
                <div class="card-body">
                    <h6><i class="bi bi-check-circle text-success"></i> Complete Data Backup</h6>
                    <ul>
                        <li><strong>All Jokes</strong> - Complete joke records with content</li>
                        <li><strong>All Categories</strong> - Joke category definitions</li>
                        <li><strong>Category Assignments</strong> - Which jokes belong to which categories</li>
                        <li><strong>User Favorites</strong> - Which users favorited which jokes</li>
                        <li><strong>Metadata</strong> - Created/updated dates, approval status</li>
                    </ul>

                    <h6 class="mt-3"><i class="bi bi-file-earmark-code text-primary"></i> Backup Format</h6>
                    <p class="mb-0">JSON format with pretty formatting for easy readability and manual editing if needed.</p>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-light">
                    <h5 class="mb-0"><i class="bi bi-shield-check"></i> Best Practices</h5>
                </div>
                <div class="card-body">
                    <h6><i class="bi bi-calendar-check text-success"></i> When to Backup</h6>
                    <ul>
                        <li>Before making major changes to jokes or categories</li>
                        <li>Before deleting multiple jokes</li>
                        <li>Weekly for active sites</li>
                        <li>After importing large amounts of data</li>
                    </ul>

                    <h6 class="mt-3"><i class="bi bi-hdd text-primary"></i> Storage Tips</h6>
                    <ul class="mb-0">
                        <li>Download and store backups in a secure external location</li>
                        <li>Keep at least 3-5 recent backups</li>
                        <li>Delete old backups periodically to save space</li>
                        <li>Test restore process occasionally</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-header bg-warning">
            <h5 class="mb-0"><i class="bi bi-exclamation-triangle"></i> Restore Process</h5>
        </div>
        <div class="card-body">
            <div class="alert alert-warning mb-3">
                <strong><i class="bi bi-exclamation-triangle-fill"></i> Important:</strong> 
                Restoring a backup will UPDATE or CREATE jokes and categories based on the backup data. 
                Existing data with the same IDs will be updated, new data will be created.
            </div>
            
            <h6>How Restore Works:</h6>
            <ol>
                <li><strong>Categories First:</strong> All joke categories are restored/updated first</li>
                <li><strong>Jokes Second:</strong> All jokes are restored/updated with their category assignments</li>
                <li><strong>Favorites Last:</strong> User favorites are synchronized for each joke</li>
            </ol>

            <h6 class="mt-3">What Gets Updated:</h6>
            <ul>
                <li>If a joke/category ID exists: It will be UPDATED with backup data</li>
                <li>If a joke/category ID doesn't exist: It will be CREATED from backup data</li>
                <li>Existing jokes/categories NOT in the backup: They remain unchanged</li>
            </ul>

            <p class="mb-0 text-muted">
                <i class="bi bi-lightbulb"></i> 
                <strong>Pro Tip:</strong> Create a new backup before restoring an old one, so you can roll back if needed!
            </p>
        </div>
    </div>

    <!-- Hidden form for restore -->
    <form id="restoreForm" action="{{ route('jokes.backups.restore') }}" method="POST" style="display: none;">
        @csrf
        <input type="hidden" name="filename" id="restoreFilename">
    </form>

@endsection

@push('scripts')
<script>
$(document).ready(function() {
    // Handle restore button clicks
    $('.restore-backup').on('click', function() {
        const filename = $(this).data('filename');
        const jokes = $(this).data('jokes');
        const categories = $(this).data('categories');
        
        const message = `Are you sure you want to restore this backup?\n\n` +
                       `Filename: ${filename}\n` +
                       `Jokes: ${jokes}\n` +
                       `Categories: ${categories}\n\n` +
                       `This will update existing data and create any missing data from the backup.\n\n` +
                       `⚠️ IMPORTANT: Create a current backup first if you want to be able to roll back!`;
        
        if (confirm(message)) {
            // Double confirmation for safety
            if (confirm('Final confirmation: Proceed with restore?')) {
                $('#restoreFilename').val(filename);
                $('#restoreForm').submit();
            }
        }
    });
    
    // Handle delete form submissions
    $('.delete-form').on('submit', function(e) {
        return confirm('Are you sure you want to delete this backup? This action cannot be undone.');
    });
});
</script>
@endpush
