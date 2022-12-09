<script>
    var dt = $("#datatable").DataTable({
        serverSide: true,
        processing: true,
        order: [
            [1, 'desc']
        ],
        // ordering: false,
        ajax: {
            url: "{{ route('point.show', ['course_id' => "${course_id}", 'class_id' => "${class_id}", 'id' => 'get-list']) }}",
            type: 'GET'
        },
        columns: [{
                data: 'id',
                orderable: false,
                searchable: false,
                className: 'text-center',
                render: function(data, type, row, meta) {
                    return data;
                }
            },
            {

                data: 'user.name',
                className: 'text-center',
                render: function(data, type, row, meta) {
                    return data;
                }
            },
            {

                data: 'point_1',
                className: 'text-center',
                render: function(data, type, row, meta) {
                    if (data == -1) {
                        return 'Chưa có điểm';
                    } else {
                        return data;
                    }
                }
            },
            {

                data: 'point_2',
                className: 'text-center',
                render: function(data, type, row, meta) {
                    if (data == -1) {
                        return 'Chưa có điểm';
                    } else {
                        return data;
                    };
                }
            },
            {

                data: 'point_3',
                className: 'text-center',
                render: function(data, type, row, meta) {
                    if (data == -1) {
                        return 'Chưa có điểm';
                    } else {
                        return data;
                    };
                }
            },
            {
                data: null,
                className: 'text-center',
                searchable: false,
                orderable: false,
                render: function(data, type, row, meta) {
                    return '<a href="" data-data=\'' + JSON.stringify(row) +
                        '\' class="action-icon btn-edit" data-bs-toggle="modal" data-bs-target="#centermodal">' +
                        '<i class="mdi mdi-pencil">' +
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
    $(document).on('click', '.btn-edit', function(e) {
        e.preventDefault();
        form_reset();
        let data = $(this).data('data');
        console.log(data);
        let modal = $('#modal_add');
        modal.find('.modal-title').text('Sửa điểm');
        modal.find('input[name=id]').val(data.id);
        modal.find('input[name=name]').val(data.name);
        if (data.point_1 == -1) {
            modal.find('input[name=point_1]').val('');
        } else {
            modal.find('input[name=point_1]').val(data.point_1);
        }
        if (data.point_2 == -1) {
            modal.find('input[name=point_2]').val('');
        } else {
            modal.find('input[name=point_2]').val(data.point_2);
        }
        if (data.point_3 == -1) {
            modal.find('input[name=point_3]').val('');
        } else {
            modal.find('input[name=point_3]').val(data.point_3);
        }
        $('.alert-danger').hide();
    });
    $('#modal_add').on('submit', function(e) {
        e.preventDefault();
        let data = $(this).serialize(),
            id = $('form#modal_add input[name=id]').val();
        if (parseInt(id)) {
            console.log('edit');
            type = 'POST';
            url = "{{ route('point.update',['course_id'=>"${course_id}",'class_id'=>"${class_id}",'']) }}"+"/"+id;
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
            url: "{{ route('course.delete', '') }}" + '/' + id,
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
