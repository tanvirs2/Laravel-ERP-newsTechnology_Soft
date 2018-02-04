<!-- Modal -->
<div class="modal fade" id="myModalU" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="portlet box red-sunglo">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-map"></i>Photo Upload Details
                        </div>

                    </div>
                    <div class="portlet-body">

                        <div class="form-body">
                            <fieldset>

                                <style>
                                    .kv-avatar .file-preview-frame,.kv-avatar .file-preview-frame:hover {
                                        margin: 0;
                                        padding: 0;
                                        border: none;
                                        box-shadow: none;
                                        text-align: center;
                                    }
                                    .kv-avatar .file-input {
                                        display: table-cell;
                                        max-width: 220px;
                                    }
                                </style>

                                <!-- the avatar markup -->
                                <div id="kv-avatar-errors-2" class="center-block" style="width:800px;display:none"></div>

                                <div class="kv-avatar center-block" style="width:200px">
                                    <input id="avatar-2" name="avatar-2" type="file" class="file-loading">
                                </div>
                                <!-- include other inputs if needed and include a form submit (save) button -->

                                <!-- your server code `avatar_upload.php` will receive `$_FILES['avatar']` on form submission -->

                                <!-- the fileinput plugin initialization -->

                                <div class="form-group">
                                    <div class="col-sm-offset-4 col-lg-8 col-sm-8 text-left">
                                        <input id="btn_add" name="btn_add" type="button" class="btn btn-primary" value="Save"  />
                                        <input id="btn_cancel" name="btn_cancel" type="reset"  class="btn btn-danger" value="Cancel" />
                                    </div>
                                </div>
                            </fieldset>
                        </div>

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>