<script>
    var dt = $("#datatable").DataTable({
        serverSide: true,
        processing: true,
        order: [
            [1, 'asc']
        ],
        ajax: {
            url: "{{ route('class.detail.show', ['course_id' => "${course_id}", 'class_id' => "${class_id}", 'id' => 'get-list']) }}",
            type: 'GET'
        },
        columns: [{
                data: 'id',
                orderable: false,
                className: 'text-center',
                render: function(data, type, row, meta) {
                    return '<input type="checkbox" name="ids[]" value="' + data +
                        '" class="checkBoxClassAll  btn-checkbox">';
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
                data: 'user.birthday',
                className: 'text-center',
                render: function(data, type, row, meta) {
                    return data;
                }
            },
            {
                data: null,
                className: 'text-center',
                render: function(data, type, row, meta) {
                    return '<a href="" data-id="' + row.id + '" class="action-icon btn-delete" >' +
                        '<i class="mdi mdi-delete">' +
                        '</i>' +
                        '</a>';
                }
            }
        ],
    });
    $(document).on('click', '.btn-checkbox', function() {
        ids = [];
        $('.checkBoxClassAll').each(function() {
            if ($(this).is(':checked')) {
                ids.push($(this).val());
            }
        });
        console.log(ids);
        if (ids.length > 0) {
            $('#btn-delete-all').show();
            $('.btn-add').hide();
        } else {
            $('#btn-delete-all').hide();
            $('.btn-add').show();
        }
    })

    function selectsall() {
        var checkboxes = document.getElementsByClassName('checkBoxClassAll');
        var check_all = document.getElementById('check_all_box');
        if (check_all.checked) {
            for (var i = 0; i < checkboxes.length; i++) {
                checkboxes[i].checked = true;
            }
        } else {
            for (var i = 0; i < checkboxes.length; i++) {
                checkboxes[i].checked = false;
            }
        }
    }

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
        modal.find('.modal-title').text('Thêm khoá học');
        modal.find('input[name=id]').val({{ $class_id }});
        $('#centermodal').modal('show');
    });
    $(document).on('click', '.btn-edit', function(e) {
        e.preventDefault();
        form_reset();
        let data = $(this).data('data');
        console.log(data);
        let modal = $('#modal_add');
        modal.find('.modal-title').text('Sửa khoá học');
        modal.find('input[name=id]').val(data.id);
        modal.find('input[name=course_id]').val(data.course_id);
        modal.find('input[name=name]').val(data.name);
        modal.find('select[name=user_id]').val(data.user_id);
        $('.alert-danger').hide();
    });
    var dtadd = $("#datatable_user").DataTable({
        serverSide: true,
        processing: true,
        order: [
            [1, 'asc']
        ],
        ajax: {
            url: "{{ route('class.addstudent.show', ['course_id' => "${course_id}", 'class_id' => "${class_id}", 'id' => 'get-student']) }}",
            type: 'GET'
        },
        columns: [{
                data: 'id',
                orderable: false,
                searchable: false,
                className: 'text-center',
                render: function(data, type, row, meta) {
                    return '<input type="checkbox" name="ids[]" value="' + data +
                        '" class="checkBoxClass">';
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

                data: 'birthday',
                className: 'text-center',
                orderable: false,
                render: function(data, type, row, meta) {
                    return data;
                }
            },
        ],
    });

    function selects() {
        var checkboxes = document.getElementsByClassName('checkBoxClass');
        var check_all = document.getElementById('check_all');
        if (check_all.checked) {
            for (var i = 0; i < checkboxes.length; i++) {
                checkboxes[i].checked = true;
            }
        } else {
            for (var i = 0; i < checkboxes.length; i++) {
                checkboxes[i].checked = false;
            }
        }
    }
    $('#modal_add').on('submit', function(e) {
        e.preventDefault();
        let data = $(this).serialize(),
            id = $('form#modal_add input[name=id]').val();
        if (parseInt(id)) {
            console.log('add');
            type = 'POST';
            url = "{{ route('class.addstudent', ['course_id' => "${course_id}", '']) }}" + "/" + id;
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
                    dtadd.ajax.reload(null, true);
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
        $.ajax({
            url: "{{ route('class.delete', ['course_id' => "${course_id}", '']) }}" + "/" + id,
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
    $(document).on('click', '#btn-delete-all', function(e) {
        e.preventDefault();
        var ids = [];
        if (confirm('Bạn có chắc chắn muốn xóa?')) {
            $('.checkBoxClassAll:checked').each(function() {
                ids.push($(this).val());
            });
            if (ids.length > 0) {
                $.ajax({
                    url: "{{ route('class.deletestudent', ['course_id' => "${course_id}", '']) }}" +
                        "/" +
                        ids,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'GET',
                    data: {
                        ids: ids
                    },
                    success: function(data) {
                        toastr[data.type](data.content, data.title);
                        if (data.type == 'success') {
                            dt.ajax.reload(null, false);
                            dtadd.ajax.reload(null, true);
                            $('#check_all_box').prop('checked', false);
                            $('#btn-delete-all').hide();
                            $('.btn-add').show();
                        }
                    },
                    error: function(data) {
                        console.log('error');
                    }
                });
            } else {
                alert('Vui lòng chọn ít nhất 1 bản ghi');
            }
        }
    });
</script>
