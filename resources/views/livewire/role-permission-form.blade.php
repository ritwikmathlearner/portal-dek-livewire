<div>
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Manage Permissions</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group" wire:ignore>
                                <label>Roles</label>
                                <select class="form-control" wire:model="role_id"
                                        wire:change="select_role_id"
                                        name="role" id="role">
                                    <option value=""></option>
                                    @foreach($roles as $role)
                                        <option value="{{ $role->id }}">{{ ucwords($role->name) }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group" wire:ignore>
                                <label>Permissions</label>
                                <select class="form-control" wire:model="permissions"
                                        name="permissions" id="permissions" multiple="">
                                    <option value=""></option>
                                    @foreach($all_permissions as $permission)
                                        <option
                                            value="{{ $permission->id }}" {{ in_array($permission->id, $permissions) ? 'selected' : '' }}>{{ ucwords($permission->name) }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary mr-1" type="button" wire:click="assignPermission" @if(empty($permissions)) disabled style="cursor: not-allowed" @endif>
                                    Submit
                                </button>
                                <button class="btn btn-secondary" type="reset" wire:click="resetForm">Reset</button>
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
                $('#role').select2({
                    placeholder: "Select A Role",
                });
                $('#role').on('change', function (e) {
                    var data = $('#role').select2("val");
                    @this.set('role_id', data);
                    window.livewire.emit('select_role_id');
                });
                $('#permissions').select2();
                $('#permissions').on('change', function (e) {
                    var data = $('#permissions').select2("val");
                     @this.set('permissions', data);
                });
            });
        })
        window.addEventListener('success-alert', event => {
            swal('Successful', 'The permissions are updated', 'success');
        });

        window.addEventListener('contentChanged', event => {
            $('#role').select2({
                placeholder: "Select A Role",
            });
            $('#permissions').select2();
        });
    </script>
@endpush
