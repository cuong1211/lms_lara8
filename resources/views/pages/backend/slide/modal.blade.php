<div class="modal fade" id="centermodal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog modal-lg">
        <div class="modal-content">
            <form class="form" id="modal_add" >
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title" id="myCenterModalLabel"></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" value="">
                    <input type="hidden" name="course_id" value="">
                    <div class="form-group">
                        <label for="simpleinput">TÊN:</label>
                        <input type="text" id="simpleinput" class="form-control" name="title">
                    </div>
                    <div class="form-group">
                        <label for="example-date">ĐƯỜNG DẪN:</label>
                        <input class="form-control" id="simpleinput" type="text" name="link" placeholder="example: https://docs.google.com/presentation/d/xxxxxxxx">
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
<div class="modal fade" id="contentModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog modal-lg">
        <div class="modal-content">
            <form class="form" id="content_slide">
                <div class="modal-header">
                    <h4 class="modal-title" id="myCenterModalLabel"></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <iframe src="" frameborder="0" width="780" height="400"
                        allowfullscreen="true" mozallowfullscreen="true" webkitallowfullscreen="true" id="slide-content"></iframe>
                </div>
            </form>
        </div>
    </div>
</div>
@push('jscustom')
    <script>
        $(document).ready(function() {
            $('#text-content').summernote({
                height: 400,
                width: 760,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    ['fontname', ['fontname']],
                    ['color', ['color']],
                    ['pararagraph', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });
        });
    </script>
@endpush
