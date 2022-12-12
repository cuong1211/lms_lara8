<div class="modal fade" id="centermodal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog modal-lg">
        <div class="modal-content">
            <form class="form" id="modal_add">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title" id="myCenterModalLabel"></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" value="">
                    <div class="form-group">
                        <label for="simpleinput">TÊN PHÒNG</label>
                        <input type="text" id="simpleinput" class="form-control" name="topic">
                    </div>
                    <div class="form-group" style="display:none">
                        <label for="example-date">LOẠI PHÒNG</label>
                        <input class="form-control" type="text" name="type"value="1">
                    </div>
                    <div class="form-group" style="display:none">
                        <label for="exampleInputdatetime">Thời gian bắt đầu</label>
                        <input type="text" name="start_time" class="form-control" id="exampleInputdatetime">
                    </div>
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
        var today = new Date();
        var date = today.getDate() + '-' + (today.getMonth() + 1) + '-' + today.getFullYear();
        var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
        $(document).ready(function() {
            $("button").click(function() {
                $("#exampleInputdatetime:text").val(function(n, c) {
                    return date + ' ' + time;
                });
            });
        });
    </script>
@endpush
