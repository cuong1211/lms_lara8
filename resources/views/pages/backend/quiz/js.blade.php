<script>
    var dt = $("#datatable").DataTable({
        serverSide: true,
        processing: true,
        order: [
            [1, 'asc']
        ],
        // ordering: false,
        ajax: {
            url: "{{ route('quiz.show', ['course_id' => "${course_id}", 'id' => 'get-list']) }}",
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

                data: 'quiz',
                className: 'text-center',
                render: function(data, type, row, meta) {
                    return data;
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
                // '<a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions \n' +
                // '<span class="svg-icon svg-icon-5 m-0"> \n' +
                // '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"> \n' +
                // '<path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="black" /> \n' +
                // '</svg> \n' +
                // '</span> \n' +
                // '<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true"> \n' +
                // '<div class="menu-item px-3"> \n' +
                // '<a href="" data-data=\'' + JSON.stringify(row) +
                // '\' class="menu-link px-3 btn-status" data-bs-toggle="modal" data-bs-target="#kt_modal_status">Status</a> \n' +
                // '</div> \n' +
                // '<div class="menu-item px-3"> \n' +
                // '<a href="" data-data=\'' + JSON.stringify(row) +
                // '\' class="menu-link px-3 btn-edit" data-bs-toggle="modal" data-bs-target="#kt_modal_add_customer">Edit</a> \n' +
                // '</div> \n' +
                // '<div class="menu-item px-3"> \n' +
                // '<a href="#" data-id="' + row._id +
                // '" class="menu-link px-3 btn-delete" data-kt-customer-table-filter="delete_row">Delete</a> \n' +
                // '</div> \n' +
                // '</div>';
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
        e.preventDefault();
        form_reset();
        let modal = $('#modal_add');
        modal.find('.modal-title').text('Thêm câu hỏi');
        modal.find('input[name=id]').val('');
        modal.find('input[name=course_id]').val({{ $course_id }});
        $('#centermodal').modal('show');
        console.log('add')
    });
    $(document).on('click', '.btn-edit', function(e) {
        e.preventDefault();
        form_reset();
        let data = $(this).data('data');
        // console.log(data);
        let modal = $('#modal_add');
        modal.find('.modal-title').text('Sửa khoá học');
        modal.find('input[name=id]').val(data.id);
        modal.find('input[name=course_id]').val(data.course_id);
        modal.find('input[name=title]').val(data.title);
        modal.find('input[name=description]').val(data.description);
        modal.find('select[name=slide_id]').val(data.slide_id);
        modal.find('select[name=quizzes_id]').val(data.quizzes_id);
        modal.find('select[name=homework_id]').val(data.homework_id);
        $('.note-editable').text(data.content);
        // $('.alert-danger').hide();
    });
    $('#modal_add').on('submit', function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        let data = $(this).serialize(),
            type = 'POST',
            url = "{{ route('quiz.store',['course_id'=>"${course_id}"]) }}",
            id = $('form#modal_add input[name=id]').val();
        $.ajax({
            url: url,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: type,
            data: formData,
            contentType: false,
            processData: false,
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
            url: "{{ route('unit.delete',['course_id'=>"${course_id}",'']) }}"+"/"+id,
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
