{{-- resources/views/livewire/notes/partials/share-modal.blade.php --}}
<div class="modal fade show d-block" tabindex="-1" style="background-color: rgba(0,0,0,0.5);">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="bi bi-share me-2"></i>Share Note
                </h5>
                <button type="button" class="btn-close" wire:click="closeShareModal"></button>
            </div>

            <form wire:submit="shareNote">
                <div class="modal-body">
                    {{-- User Selection --}}
                    <div class="mb-3">
                        <label class="form-label fw-semibold">
                            Share with User <span class="text-danger">*</span>
                        </label>
                        <select wire:model="shareUserId"
                                class="form-select @error('shareUserId') is-invalid @enderror"
                                required>
                            <option value="">Select a user...</option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                            @endforeach
                        </select>
                        @error('shareUserId')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Permission Level --}}
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Permission Level</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" wire:model="sharePermission" value="view" id="permView">
                            <label class="form-check-label" for="permView">
                                <i class="bi bi-eye me-1"></i><strong>View Only</strong>
                                <small class="d-block text-muted">User can only view the note</small>
                            </label>
                        </div>
                        <div class="form-check mt-2">
                            <input class="form-check-input" type="radio" wire:model="sharePermission" value="edit" id="permEdit">
                            <label class="form-check-label" for="permEdit">
                                <i class="bi bi-pencil me-1"></i><strong>Can Edit</strong>
                                <small class="d-block text-muted">User can view and edit the note</small>
                            </label>
                        </div>
                    </div>

                    {{-- Can Reshare Option --}}
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" wire:model="shareCanReshare" id="canReshare">
                            <label class="form-check-label" for="canReshare">
                                <i class="bi bi-arrow-repeat me-1"></i>Allow user to reshare this note
                                <small class="d-block text-muted">User can share this note with others</small>
                            </label>
                        </div>
                    </div>

                    {{-- Expiration Date --}}
                    <div class="mb-3">
                        <label class="form-label fw-semibold">
                            <i class="bi bi-calendar-event me-1"></i>Expiration Date (Optional)
                        </label>
                        <input type="datetime-local"
                               wire:model="shareExpiresAt"
                               class="form-control"
                               min="{{ now()->format('Y-m-d\TH:i') }}">
                        <small class="text-muted">Leave empty for permanent access</small>
                    </div>

                    {{-- Existing Shares --}}
                    @if($shareNoteId)
                        @php
                            $note = \App\Models\Note::with('activeShares.sharedWith')->find($shareNoteId);
                        @endphp
                        @if($note && $note->activeShares->count() > 0)
                            <div class="mt-4">
                                <h6 class="fw-semibold">Currently Shared With:</h6>
                                <div class="list-group">
                                    @foreach($note->activeShares as $share)
                                        <div class="list-group-item d-flex justify-content-between align-items-center">
                                            <div>
                                                <div class="fw-semibold">{{ $share->sharedWith->name }}</div>
                                                <small class="text-muted">
                                                    <span class="badge bg-{{ $share->permission === 'edit' ? 'primary' : 'secondary' }}">
                                                        {{ ucfirst($share->permission) }}
                                                    </span>
                                                    @if($share->expires_at)
                                                        <i class="bi bi-calendar-event ms-2"></i>
                                                        Expires: {{ $share->expires_at->format('M d, Y') }}
                                                    @endif
                                                </small>
                                            </div>
                                            <button type="button"
                                                    wire:click="removeShare({{ $share->id }})"
                                                    wire:confirm="Remove this share?"
                                                    class="btn btn-sm btn-outline-danger">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    @endif
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="closeShareModal">
                        <i class="bi bi-x-lg me-1"></i>Cancel
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-share me-1"></i>Share Note
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
