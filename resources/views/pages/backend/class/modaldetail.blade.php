<div class="modal fade" id="centermodal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog modal-lg">
        <div class="modal-content">
            <form class="form" id="modal_add">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title" id="myCenterModalLabel">Thêm khoá học</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" value="">
                    <table id="datatable_user" class="table dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th style="text-align:center;"><input type="checkbox" id="check_all" onclick='selects()'></th>
                                <th>TÊN</th>
                                <th>NGÀY SINH</th>

                            </tr>
                        </thead>
                        {{-- <tbody>
                            @php
                                $count = 1;
                                
                            @endphp
                            @foreach ($student as $value)
                                <tr>
                                    <td style="text-align:center;">
                                        <input type="checkbox" name="ids[{{ $value->id }}]" value="{{ $value->id }}" class="checkBoxClass">
                                          
                                        </td>
                                    <td>{{ $count }}</td>
                                    <td>{{ $value->name }}</td>
                                </tr>
                                @php
                                    $count++;
                                @endphp
                            @endforeach
                        </tbody> --}}
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Thêm học sinh</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
