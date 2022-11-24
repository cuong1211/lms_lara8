<div class="modal fade" id="centermodal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-full-width">
        <div class="modal-content">
            <form class="form" id="modal_add" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title" id="myCenterModalLabel">Thêm khoá học</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="quiz-name[1]" class="col-sm-3 control-label">Tên bộ câu hỏi</label>
                        <div class="col-sm-6">
                            <input type="text" name="quiz-name" id="quiz-name" class="form-control" required>
                        </div>
                    </div>
                    <table class="table" id="tab_logic">
                        <thead>
                            <tr>
                                <th>Câu hỏi</th>
                                <th colspan="4">Đáp án</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr id="index1">
                                <td>
                                    <label for="question[1][question-text]">Câu hỏi 1</label>
                                    <input type="text" name="question[1][question-text]" id="question[1][question-text]"
                                        required>
                                </td>
                                <td>
                                    <table class="table-sm">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="form-group">
                                                        <label for="question[1][answers][1]">Đáp án 1</label>
                                                        <input type="text" class="form-control"
                                                            name="question[1][answers][1]" id="question[1][answers][1]"
                                                            aria-describedby="question[1][answers][1]"
                                                            placeholder="Nhập đáp án" required>
                                                    </div>
                                                    <div class="form-check">
                                                        <label class="question[1][answers][is_correct]">
                                                            <input type="radio" class="form-check-input"
                                                                name="question[1][answers][is_correct]"
                                                                id="question[1][answers][1][is_correct]" value="1"
                                                                checked>
                                                            Ý đúng
                                                        </label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <label for="question[1][answers][2]">Đáp án 2</label>
                                                        <input type="text" class="form-control"
                                                            name="question[1][answers][2]" id="question[1][answers][2]"
                                                            aria-describedby="question[1][answers][2]"
                                                            placeholder="Nhập đáp án" required>
                                                    </div>
                                                    <div class="form-check">
                                                        <label for="question[1][answers][is_correct]" class="form-check">
                                                            <input type="radio" class="form-check-input"
                                                                name="question[1][answers][is_correct]"
                                                                id="question[1][answers][2][is_correct]" value="2">
                                                            Ý đúng
                                                        </label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <label for="question[1][answers][3]">Đáp án 3</label>
                                                        <input type="text" class="form-control"
                                                            name="question[1][answers][3]" id="question[1][answers][3]"
                                                            aria-describedby="question[1][answers][3]"
                                                            placeholder="Nhập đáp án" required>
                                                    </div>
                                                    <div class="form-check">
                                                        <label for="question[1][answers][3][is_correct]"
                                                            class="form-check-label">
                                                            <input type="radio" class="form-check-input"
                                                                name="question[1][answers][is_correct]"
                                                                id="question[1][answers][3][is_correct]" value="3">
                                                                Ý đúng
                                                        </label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <label for="question[1][answers][4]">Đáp án 4</label>
                                                        <input type="text" class="form-control"
                                                            name="question[1][answers][4]" id="question[1][answers][4]"
                                                            aria-describedby="question[1][answers][4]"
                                                            placeholder="Nhập đáp án" required>
                                                    </div>
                                                    <div class="form-check">
                                                        <label for="question[1][answers][is_correct]"
                                                            class="form-check-label">
                                                            <input type="radio" class="form-check-input"
                                                                name="question[1][answers][is_correct]"
                                                                id="question[1][answers][4][is_correct]" value="4">
                                                                Ý đúng
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td>
                                    <div id="add_question" class="btn btn-info">Thêm câu hỏi</div>
                                </td>
                            </tr>
                            <tr id='index2'></tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-light" data-dismiss="modal">Reset</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@push('jscustom')
<script>
    $(document).ready(function() {
        var i = 2;
        $("#add_question").click(function() {
            $('#index' + i).html('<td><label for="question[' + i + '][question-text]">Câu hỏi ' + i +
                '</label><input type="text" name="question[' + i +
                '][question-text]" id="question[' + i +
                '][question-text]" required></td><td><table class="table-sm"><tbody><tr><td><div class="form-group"><label for="question[' +
                i +
                '][answers][1]">Đáp án 1</label><input type="text" class="form-control" name="question[' +
                i + '][answers][1]" id="question[' + i +
                '][answers][1]" aria-describedby="question[' + i +
                '][answers][1]" placeholder="Nhập đáp án" required></div><div class="form-check"><label for="question[' +
                i +
                '][answers][is_correct]" class="answer-check"><input type="radio" class="form-check-input" name="question[' +
                i + '][answers][is_correct]" id="question[' + i +
                '][answers][1][is_correct]" value="true" checked>Ý đúng</label></div></td><td><div class="form-group"><label for="question[' +
                i +
                '][answers][2]">Đáp án 2</label><input type="text" class="form-control" name="question[' +
                i + '][answers][2]" id="question[' + i +
                '][answers][2]" aria-describedby="question[' + i +
                '][answers][2]" placeholder="Nhập đáp án" required></div><div class="form-check"><label for="question[' +
                i +
                '][answers][is_correct]" class="form-check"><input type="radio" class="form-check-input" name="question[' +
                i + '][answers][is_correct]" id="question[' + i +
                '][answers][2][is_correct]" value="true">Ý đúng</label></div></td><td><div class="form-group"><label for="question[' +
                i +
                '][answers][3]">Đáp án 3</label><input type="text" class="form-control" name="question[' +
                i + '][answers][3]" id="question[' + i +
                '][answers][3]" aria-describedby="question[' + i +
                '][answers][3]" placeholder="Nhập đáp án" required></div><div class="form-check"><label for="question[' +
                i +
                '][answers][is_correct]" class="form-check-label"><input type="radio" class="form-check-input" name="question[' +
                i + '][answers][is_correct]" id="question[' + i +
                '][answers][3][s_icorrect]" value="true">Ý đúng</label></div></td><td><div class="form-group"><label for="question[' +
                i +
                '][answers][4]">Đáp án 4</label><input type="text" class="form-control" name="question[' +
                i + '][answers][4]" id="question[' + i +
                '][answers][4]" aria-describedby="question[' + i +
                '][answers][4]" placeholder="Nhập đáp án" required></div><div class="form-check"><label for="question[' +
                i +
                '][answers][is_correct]" class="form-check-label"><input type="radio" class="form-check-input" name="question[' +
                i + '][answers][is_correct]" id="question[' + i +
                '][answers][4][is_correct]" value="true">Ý đúng</label></div></td></tr></tbody></table></td><td id="DeleteQuestionWrapper' +
                i + '"><button class="btn btn-danger row-delete" id="DeleteQuestion' + i +
                '">Xoá câu hỏi</button></td>');
            $('#tab_logic').append('<tr id="index' + (i + 1) + '"></tr>');
            var delete_button = $('#DeleteQuestion' + (i - 1));
            delete_button.remove();
            if (i == 3) {
                $('#DeleteQuestion4').remove();
            }
            i++;
            console.log(i);
        });
        $(document.body).on('click', '.row-delete', function() {
            var row = $(this).closest('tr');
            row.remove();
            $('#index' + (i)).attr("id", "index" + (i - 1));
            var insertedDeleteButton = '<button class="btn btn-danger row-delete" id="DeleteQuestion' +
                (i) + '">Xoá câu hỏi</button>';
            $('#DeleteQuestionWrapper' + (i - 2)).append(insertedDeleteButton);
            i--;
            console.log(i);
        });
    });
</script>
@endpush
