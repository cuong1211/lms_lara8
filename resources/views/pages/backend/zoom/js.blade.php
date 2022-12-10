<script>
    var dt = $("#datatable").DataTable({
        serverSide: true,
        processing: true,
        order: [
            [1, 'desc']
        ],
        // ordering: false,
        ajax: {
            url: "{{ route('zoom.show', 'get-list') }}",
            type: 'GET'
        },
        columns: [{
                data: null,
                orderable: false,
                className: 'text-center',
                render: function(data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
            },
            {

                data: 'topic',
                className: 'text-center',
                render: function(data, type, row, meta) {
                    return data;
                }
            },
            {

                data: 'join_url',
                className: 'text-center',
                render: function(data, type, row, meta) {
                    return '<a class="btn btn-primary" href="' + data + '">Link</a>';
                }
            },
            {
                data: null,
                className: 'text-center',
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
        modal.find('.modal-title').text('Thêm phòng zoom');
        modal.find('input[name=id]').val('');
        $('#centermodal').modal('show');
    });
    $(document).on('click', '.btn-edit', function(e) {
        e.preventDefault();
        form_reset();
        let data = $(this).data('data');
        console.log(data);
        let modal = $('#modal_add');
        modal.find('.modal-title').text('Sửa phòng zoom');
        modal.find('input[name=id]').val(data.id);
        modal.find('input[name=topic]').val(data.topic);
        modal.find('input[name=start_time]').val(data.start_time);
        $('.alert-danger').hide();
    });
    $('#modal_add').on('submit', function(e) {
        e.preventDefault();
        let data = $(this).serialize(),
            type = 'POST',
            url = "{{ route('zoom.store') }}",
            id = $('form#modal_add input[name=id]').val();
        if (parseInt(id)) {
            console.log('edit');
            type = 'PATCH';
            url = "{{ route('zoom.update', '') }}" + "/" + id;
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
            url: "{{ route('zoom.delete', '') }}" + '/' + id,
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
