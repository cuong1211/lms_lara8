<script>
    function updateDataTableSelectAllCtrl(table) {
        var $table = table.table().node();
        var $chkbox_all = $('tbody input[type="checkbox"]', $table);
        var $chkbox_checked = $('tbody input[type="checkbox"]:checked', $table);
        var chkbox_select_all = $('thead input[name="select_all"]', $table).get(0);

        // If none of the checkboxes are checked
        if ($chkbox_checked.length === 0) {
            chkbox_select_all.checked = false;
            if ('indeterminate' in chkbox_select_all) {
                chkbox_select_all.indeterminate = false;
            }

            // If all of the checkboxes are checked
        } else if ($chkbox_checked.length === $chkbox_all.length) {
            chkbox_select_all.checked = true;
            if ('indeterminate' in chkbox_select_all) {
                chkbox_select_all.indeterminate = false;
            }

            // If some of the checkboxes are checked
        } else {
            chkbox_select_all.checked = true;
            if ('indeterminate' in chkbox_select_all) {
                chkbox_select_all.indeterminate = true;
            }
        }
    }

    ids = [];
    idstudent = [];
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
                        '" class="checkBoxClassAll btn-checkbox ' + data + '">';
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
                searchable: false,
                render: function(data, type, row, meta) {
                    return '<a href="" data-id="' + row.id + '" class="action-icon btn-delete" >' +
                        '<i class="mdi mdi-delete">' +
                        '</i>' +
                        '</a>';
                }
            }
        ],

    });
    dt.on('draw', function() {
        // Update state of "Select all" control
        for (var i = 0; i < ids.length; i++) {
            console.log(ids[i]);
            checkboxId = ids[i];
            $('.' + checkboxId).attr('checked', true);
        }
    });

    $(document).on('click', '.btn-checkbox', function(e) {

        var checkBoxId = $(this).val();
        var rowIndex = $.inArray(checkBoxId, ids);

        if (this.checked && rowIndex === -1) {
            ids.push(checkBoxId);

        } else if (!this.checked && rowIndex !== -1) {
            ids.splice(rowIndex, 1); // Remove it from the array.
        }

        console.log(ids);
        if (ids.length > 0) {
            $('#btn-delete-all').show();
            $('.btn-add').hide();
        } else {
            $('#btn-delete-all').hide();
            $('.btn-add').show();
        }
        updateDataTableSelectAllCtrl(dt);
    })

    function selectsall() {
        var checkboxes = document.getElementsByClassName('checkBoxClassAll');
        var check_all = document.getElementById('check_all_box');
        if (check_all.checked) {
            for (var i = 0; i < checkboxes.length; i++) {
                //check all checkbox and other pages
                checkboxes[i].checked = true;
                //push id to array
                var checkBoxId = checkboxes[i].value;
                var rowIndex = $.inArray(checkBoxId, ids);
                if (rowIndex === -1) {
                    ids.push(checkBoxId);
                }
            }
            $('#btn-delete-all').show();
            $('.btn-add').hide();
            updateDataTableSelectAllCtrl(dt);
        } else {
            for (var i = 0; i < checkboxes.length; i++) {
                checkboxes[i].checked = false;
                //remove id to array
                var checkBoxId = checkboxes[i].value;
                var rowIndex = $.inArray(checkBoxId, ids);
                if (rowIndex !== -1) {
                    ids.splice(rowIndex, 1); // Remove it from the array.
                }
            }
            $('#btn-delete-all').hide();
            $('.btn-add').show();
            updateDataTableSelectAllCtrl(dt);
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
        modal.find('.modal-title').text('Thêm học sinh');
        modal.find('input[name=id]').val({{ $class_id }});
        $('#centermodal').modal('show');
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
                        '" class="checkBoxClass btn-checkboxstu ' + data + '">';
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
    dtadd.on('draw', function() {
        // Update state of "Select all" control
        for (var i = 0; i < idstudent.length; i++) {
            console.log(idstudent[i]);
            checkboxId = idstudent[i];
            $('.' + checkboxId).attr('checked', true);
        }
    });
    $(document).on('click', '.btn-checkboxstu', function() {

        var StudentId = $(this).val();
        var rowIndexstudent = $.inArray(StudentId, idstudent);

        if (this.checked && rowIndexstudent === -1) {
            idstudent.push(StudentId);

        } else if (!this.checked && rowIndexstudent !== -1) {
            idstudent.splice(rowIndexstudent, 1); // Remove it from the array.
        }

        console.log(idstudent, rowIndexstudent);
        updateDataTableSelectAllCtrl(dtadd);
    })

    function selects() {
        var checkboxes = document.getElementsByClassName('checkBoxClass');
        var check_all = document.getElementById('check_all');
        if (check_all.checked) {
            for (var i = 0; i < checkboxes.length; i++) {
                //check all checkbox and other pages
                checkboxes[i].checked = true;
                //push id to array
                var checkBoxId = checkboxes[i].value;
                var rowIndex = $.inArray(checkBoxId, idstudent);
                if (rowIndex === -1) {
                    idstudent.push(checkBoxId);
                }
            }
        } else {
            for (var i = 0; i < checkboxes.length; i++) {
                checkboxes[i].checked = false;
                //remove id to array
                var checkBoxId = checkboxes[i].value;
                var rowIndex = $.inArray(checkBoxId, idstudent);
                if (rowIndex !== -1) {
                    idstudent.splice(rowIndex, 1); // Remove it from the array.
                }
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
                    idstudent = [];
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
            url: "{{ route('class.deletestd', ['course_id' => "${course_id}", 'class_id'=>"${class_id}",'']) }}" +"/" +id,
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
        Swal.fire({
            text: "Bạn có muốn xoá các học sinh không?",
            icon: "warning",
            showCancelButton: true,
            buttonsStyling: false,
            confirmButtonText: "Có, hãy xoá đi!",
            cancelButtonText: "Không, huỷ",
            customClass: {
                confirmButton: "btn fw-bold btn-danger",
                cancelButton: "btn fw-bold btn-active-light-primary",
            }
        }).then(function(result) {
            if (result.value) {
                if (ids.length > 0) {
                    $.ajax({
                        url: "{{ route('class.deletestudent', ['course_id' => "${course_id}", 'class_id'=>"${class_id}",'']) }}" +
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
                    toastr['error']('Vui lòng chọn học sinh cần xoá', 'Lỗi');
                }
            }
        });
    });
</script>
