@extends('admin.template')

@section('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
@endsection

@section('content')
<div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 gap-3">
    <h2 class="fw-normal text-dark mb-0" style="font-size: 1.75rem;">Data Users</h2>
    <button type="button" class="btn btn-primary px-3 py-2 fw-medium" data-bs-toggle="modal" data-bs-target="#modalTambahUser">
        Tambah User
    </button>
</div>

<div class="card border-0 shadow-sm rounded-3 bg-white mb-4">
    <div class="card-body p-4">
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle mb-0 w-100" id="tabel_user" style="font-size: 0.9rem;">
                <thead class="table-light">
                    <tr>
                        <th class="text-center" style="width: 5%;">No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Role</th>
                        <th class="text-center" style="width: 10%;">Action</th>
                    </tr>
                </thead>

                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>


<div class="modal fade" id="modalTambahUser" tabindex="-1" aria-labelledby="modalTambahUserLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTambahUserLabel">Tambah User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <form id="formTambahUser">
                <div class="modal-body p-4">
                    <div class="mb-3">
                        <label for="name" class="form-label text-secondary small">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Joko" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label text-secondary small">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="joko@gmail.com" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label text-secondary small">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="********" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label text-secondary small">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="08121221323">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label text-secondary small">Address</label>
                        <textarea class="form-control" id="address" name="address" rows="3" placeholder="Jakarta"></textarea>
                    </div>
                    <div class="mb-0">
                        <label for="role" class="form-label text-secondary small">Role</label>
                        <select class="form-select" id="role" name="role" required>
                            <option value="" disabled selected>Pilih Role</option>
                            <option value="admin">Admin</option>
                            <option value="user">User</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer bg-light">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary px-4">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modalEditUser" tabindex="-1" aria-labelledby="modalEditUserLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditUserLabel">Edit User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <form id="formEditUser">
                <input type="hidden" id="edit_id">
                
                <div class="modal-body p-4">
                    <div class="mb-3">
                        <label for="edit_name" class="form-label text-secondary small">Name</label>
                        <input type="text" class="form-control" id="edit_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_email" class="form-label text-secondary small">Email</label>
                        <input type="email" class="form-control" id="edit_email" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_password" class="form-label text-secondary small">Password <span class="text-muted">(Kosongkan jika tidak diubah)</span></label>
                        <input type="password" class="form-control" id="edit_password" placeholder="********">
                    </div>
                    <div class="mb-3">
                        <label for="edit_phone" class="form-label text-secondary small">Phone</label>
                        <input type="text" class="form-control" id="edit_phone">
                    </div>
                    <div class="mb-3">
                        <label for="edit_address" class="form-label text-secondary small">Address</label>
                        <textarea class="form-control" id="edit_address" rows="3"></textarea>
                    </div>
                    <div class="mb-0">
                        <label for="edit_role" class="form-label text-secondary small">Role</label>
                        <select class="form-select" id="edit_role" required>
                            <option value="admin">Admin</option>
                            <option value="user">User</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer bg-light">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary px-4">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function() {
        let tableUser = $('#tabel_user').DataTable({
            "language": {
                "lengthMenu": "_MENU_ entries per page"
            },
            "ajax": {
                "url": "/api/users", 
                "type": "GET",
                "dataSrc": "data" 
            },
            "columns": [
                { 
                    "data": null, 
                    "className": "text-center",
                    "render": function (data, type, row, meta) {
                        return meta.row + 1; 
                    }
                },
                { "data": "name", "className": "fw-medium" },
                { "data": "email" },
                { 
                    "data": "phone",
                    "render": function(data) { return data ? data : '-'; }
                },
                { 
                    "data": "address",
                    "render": function(data) { return data ? data : '-'; }
                },
                { 
                    "data": "role",
                    "render": function(data) {
                        if(data === 'admin') {
                            return '<span class="badge bg-primary px-2 py-1">Admin</span>';
                        } else {
                            let roleName = data ? data.charAt(0).toUpperCase() + data.slice(1) : 'User';
                            return '<span class="badge bg-secondary px-2 py-1">' + roleName + '</span>';
                        }
                    }
                },
                { 
                    "data": null, 
                    "className": "text-center",
                    "render": function(data, type, row) {
                        return `
                            <button class="btn btn-warning btn-sm text-dark px-2 py-1 me-1 btn-edit" data-id="${row.id}" style="font-size: 0.8rem;">Edit</button>
                            <button class="btn btn-danger btn-sm px-2 py-1 btn-delete" data-id="${row.id}" style="font-size: 0.8rem;">Hapus</button>
                        `;
                    }
                }
            ]
        });

        $('#formTambahUser').on('submit', function(e) {
            e.preventDefault(); 

            let formData = {
                name: $('#name').val(),
                email: $('#email').val(),
                password: $('#password').val(),
                phone: $('#phone').val(),
                address: $('#address').val(),
                role: $('#role').val(),
            };

            let btnSubmit = $(this).find('button[type="submit"]');
            let originalText = btnSubmit.text();
            btnSubmit.text('Menyimpan...').prop('disabled', true);

            $.ajax({
                url: '/api/users', 
                type: 'POST',
                data: formData,
                success: function(response) {
                    if(response.success) {
                        alert(response.message); 
                        $('#modalTambahUser').modal('hide'); 
                        $('#formTambahUser')[0].reset(); 
                        tableUser.ajax.reload(null, false); 
                    }
                },
                error: function(xhr) {
                    let res = xhr.responseJSON;
                    if(res && res.message) {
                        alert('Error: ' + res.message);
                    } else {
                        alert('Terjadi kesalahan pada server saat menambah data.');
                    }
                },
                complete: function() {
                    btnSubmit.text(originalText).prop('disabled', false);
                }
            });
        });

        $('#tabel_user tbody').on('click', '.btn-edit', function() {
            let id = $(this).data('id');
            
            $.ajax({
                url: '/api/users/' + id,
                type: 'GET',
                success: function(response) {
                    if(response.success) {
                        let user = response.data;
                        
                        $('#edit_id').val(user.id);
                        $('#edit_name').val(user.name);
                        $('#edit_email').val(user.email);
                        $('#edit_password').val(''); 
                        $('#edit_phone').val(user.phone);
                        $('#edit_address').val(user.address);
                        $('#edit_role').val(user.role);
                        
                        $('#modalEditUser').modal('show');
                    }
                },
                error: function() {
                    alert('Gagal mengambil data user dari server.');
                }
            });
        });

        $('#formEditUser').on('submit', function(e) {
            e.preventDefault();
            
            let id = $('#edit_id').val();
            let btnSubmit = $(this).find('button[type="submit"]');
            let originalText = btnSubmit.text();
            btnSubmit.text('Updating...').prop('disabled', true);
            
            let formData = {
                name: $('#edit_name').val(),
                email: $('#edit_email').val(),
                phone: $('#edit_phone').val(),
                address: $('#edit_address').val(),
                role: $('#edit_role').val(),
            };

            let password = $('#edit_password').val();
            if(password !== '') {
                formData.password = password;
            }

            $.ajax({
                url: '/api/users/' + id,
                type: 'PUT',
                data: formData,
                success: function(response) {
                    if(response.success) {
                        alert(response.message);
                        $('#modalEditUser').modal('hide');
                        tableUser.ajax.reload(null, false); 
                    }
                },
                error: function(xhr) {
                    let res = xhr.responseJSON;
                    if(res && res.message) {
                        alert('Error: ' + res.message);
                    } else {
                        alert('Terjadi kesalahan saat mengupdate data.');
                    }
                },
                complete: function() {
                    btnSubmit.text(originalText).prop('disabled', false);
                }
            });
        });

        $('#tabel_user tbody').on('click', '.btn-delete', function() {
            let id = $(this).data('id');
            
            if(confirm('Apakah Anda yakin ingin menghapus user ini?')) {
                $.ajax({
                    url: '/api/users/' + id,
                    type: 'DELETE',
                    success: function(response) {
                        if(response.success) {
                            alert(response.message);
                            tableUser.ajax.reload(null, false); 
                        }
                    },
                    error: function(xhr) {
                        let res = xhr.responseJSON;
                        if(res && res.message) {
                            alert('Error: ' + res.message);
                        } else {
                            alert('Gagal menghapus data.');
                        }
                    }
                });
            }
        });

    });
</script>
@endsection