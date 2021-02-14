<div>
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Add New Role</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Role Name</label>
                                <input type="text" name="role" id="role"
                                       wire:model.defer="role"
                                       class="form-control @error('role') is-invalid @enderror"
                                       placeholder="Role name" autofocus autocomplete="off">
                                @error('role')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Select Permission(s)</label>
                                <select class="form-control" name="permission[]" id="permission" multiple=""
                                        wire:model.defer="permissions"
                                        data-height="100%">
                                    <option value=""></option>
                                    @foreach($allPermissions as $permission)
                                        <option value="{{ $permission->id }}">{{ ucwords($permission->name) }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary mr-1" type="button" wire:click="store">Submit</button>
                                <button class="btn btn-secondary" wire:click="resetForm">Reset</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@push('js')
    <script>
        document.addEventListener('livewire:load', function () {
            $(document).ready(function () {
                $('#permission').select2({
                    placeholder: "Select Permission(s)",
                });
                $('#permission').on('change', function (e) {
                    var data = $('#permission').select2("val");
                    @this.set('permissions', data);
                });
            })
        });
        window.addEventListener('contentChanged', event => {
            $('#permission').select2({
                placeholder: "Select Permission(s)",
            });
        });

        window.addEventListener('resetPermission', event => {
            $('#permission').val('');
        });

        window.addEventListener('success-alert', event => {
            swal('Successful', 'The permissions are updated', 'success');
        });
    </script>
@endpush
