<script>
    var dt = $("#datatable").DataTable({
        serverSide: true,
        processing: true,
        order: [
            [1, 'asc']
        ],
        // ordering: false,
        ajax: {
            url: "{{ route('teacher.show', 'get-list') }}",
            type: 'GET'
        },
        columns: [{
                data: null,
                orderable: false,
                searchable: false,
                className: 'text-center',
                render: function(data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
            },
            {

                data: 'avatar',
                className: 'text-center',
                render: function(data, type, row, meta) {
                    return '<img src="' + data + '" alt="" width="50px" height="50px">';
                }
            },
            {

                data: 'name',
                className: 'text-center',
                render: function(data, type, row, meta) {
                    return data;
                }
            },
            {

                data: 'email',
                className: 'text-center',
                orderable: false,
                render: function(data, type, row, meta) {
                    return data;
                }
            },
            {

                data: 'phone',
                className: 'text-center',
                orderable: false,
                render: function(data, type, row, meta) {
                    return data;
                }
            },
            {

                data: 'address',
                className: 'text-center',
                orderable: false,
                render: function(data, type, row, meta) {
                    return data;
                }
            },
            {

                data: 'birthday',
                className: 'text-center',
                orderable: false,
                render: function(data, type, row, meta) {
                    return data;
                }
            },
            {

                data: 'zoom.topic',
                className: 'text-center',
                orderable: false,
                render: function(data, type, row, meta) {
                    if (data == null) {
                        return '<span class="badge badge-danger">Không có Zoom</span>';
                    } else {
                        return data;
                    }
                }
            },
            {
                data: null,
                className: 'text-center',
                orderable: false,
                searchable: false,
                render: function(data, type, row, meta) {
                    return '<a href="" data-data=\'' + JSON.stringify(row) +
                        '\' class="action-icon btn-edit" data-bs-toggle="modal" data-bs-target="#centermodal">' +
                        '<i class="mdi mdi-pencil">' +
                        '</i>' +
                        '</a>' +
                        '<a href="" data-id="' + row.id + '" class="action-icon btn-delete" >' +
                        '<i class="mdi mdi-delete">' +
                        '</i>' +
                        '</a>';
                }
            }
        ],
    });

    function form_reset() {
        $("#centermodal").modal({
            'backdrop': 'static',
            'keyboard': false
        });
        $("#modal_add").trigger("reset");
    }
    $(document).on('click', '.btn-add', function(e) {
        console.log('add')
        e.preventDefault();
        form_reset();
        let modal = $('#modal_add');
        modal.find('.modal-title').text('Thêm giáo viên');
        modal.find('input[name=id]').val('');
        $('#centermodal').modal('show');
    });
    $(document).on('click', '.btn-edit', function(e) {
        e.preventDefault();
        form_reset();
        let data = $(this).data('data');
        // console.log(data);
        let modal = $('#modal_add');
        modal.find('.modal-title').text('Sửa thông tin giáo viên');
        modal.find('input[name=id]').val(data.id);
        modal.find('input[name=role_id]').val(data.role_id);
        modal.find('input[name=name]').val(data.name);
        modal.find('#password').hide();
        modal.find('input[name=email]').val(data.email);
        modal.find('input[name=phone]').val(data.phone);
        modal.find('input[name=address]').val(data.address);
        modal.find('input[name=birthday]').val(data.birthday);
        modal.find('select[name=zoom_id]').val(data.zoom_id);
        // $('.alert-danger').hide();
    });
    $('#modal_add').on('submit', function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        let data = $(this).serialize(),
            type = 'POST',
            url = "{{ route('teacher.store') }}",
            id = $('form#modal_add input[name=id]').val();
        if (parseInt(id)) {
            console.log('edit');
            type = 'PUT';
            url = "{{ route('teacher.update', '') }}" + "/" + id;
        }
        $.ajax({
            url: url,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: type,
            data: data,
            success: function(data) {
                // notification(data.type, data.title, data.content);
                toastr[data.type](data.content, data.title);
                if (data.type == 'success') {
                    dt.ajax.reload(null, true);
                    $('#modal_add').trigger('reset');
                    $('#centermodal').modal('hide');
                }
            },
            error: function(data) {
                console.log('error');
            }
        });
    });
    $(document).on('click', '.btn-delete', function(e) {
        e.preventDefault();
        let id = $(this).data('id');
        console.log($(this).data())
        $.ajax({
            url: "{{ route('teacher.delete', '') }}" + "/" + id,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'GET',
            success: function(data) {
                toastr[data.type](data.content, data.title);
                if (data.type == 'success') {
                    dt.ajax.reload(null, false);
                }
            },
            error: function(data) {
                console.log('error');
            }
        });
    });
</script>
