<script>
    var dt = $("#datatable").DataTable({
        serverSide: true,
        processing: true,
        order: [
            [1, 'asc']
        ],
        // ordering: false,
        ajax: {
            url: "{{ route('unit.show', ['course_id' => "${course_id}", 'id' => 'get-list']) }}",
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

                data: 'title',
                className: 'text-center',
                render: function(data, type, row, meta) {
                    return data;
                }
            },
            {

                data: 'content',
                className: 'text-center',
                orderable: false,
                render: function(data, type, row, meta) {
                    return '<button type="button" data-data=\'' + JSON.stringify(row) +
                        '\' class="btn btn-primary btn-show" data-toggle="modal" data-target="#contentModal" data-whatever="@mdo">Xem nội dung</button>';
                }
            }, {

                data: 'slide.title',
                className: 'text-center',
                orderable: false,
                render: function(data, type, row, meta) {
                    if (data == null) {
                        return "Không có slide";
                    } else {
                        return data;
                    }
                }
            },
            {

                data: 'quiz.quiz',
                className: 'text-center',
                orderable: false,
                render: function(data, type, row, meta) {
                    if (data == null) {
                        return "Không có câu hỏi";
                    } else {
                        return data;
                    }
                }
            },
            {

                data: 'homework.title',
                className: 'text-center',
                orderable: false,
                render: function(data, type, row, meta) {
                    if (data == null) {
                        return "Không có bài tập";
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
    $(document).on('click', '.btn-show', function(e) {
        console.log('show')
        $('#contentModal').modal('show');
        let data = $(this).data('data');
        let modal = $('#form-content');
        modal.find('.modal-title').text(data.title);
        $('.content-modal').html(data.content).text();
    });
    $(document).on('click', '.btn-add', function(e) {
        console.log('add')
        e.preventDefault();
        form_reset();
        let modal = $('#modal_add');
        modal.find('.modal-title').text('Thêm bài học');
        modal.find('input[name=id]').val('');
        modal.find('input[name=course_id]').val({{ $course_id }});
        $('.note-editable').empty('');
        $('#centermodal').modal('show');
    });
    $(document).on('click', '.btn-edit', function(e) {
        e.preventDefault();
        form_reset();
        let data = $(this).data('data');
        console.log('edit');
        let modal = $('#modal_add');
        modal.find('.modal-title').text('Sửa bài học');
        modal.find('input[name=id]').val(data.id);
        modal.find('input[name=course_id]').val(data.course_id);
        modal.find('input[name=title]').val(data.title);
        modal.find('input[name=description]').val(data.description);
        modal.find('select[name=slide_id]').val(data.slide_id);
        modal.find('select[name=quizzes_id]').val(data.quizzes_id);
        modal.find('select[name=homework_id]').val(data.homework_id);
        var content = $('.note-editable').html(data.content).text();
        modal.find('textarea[name=content]').val(content);
        // $('.alert-danger').hide();
    });
    $('#modal_add').on('submit', function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        let data = $(this).serialize(),
            type = 'POST',
            url = "{{ route('unit.store',['course_id'=>"${course_id}"]) }}",
            id = $('form#modal_add input[name=id]').val();
        if (parseInt(id)) { 
            console.log('edit');
            type = 'PUT';
            url = "{{ route('unit.update',['course_id'=>"${course_id}",'']) }}"+"/"+id;
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
