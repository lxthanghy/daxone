$(document).ready(function () {
    function ckEditor(name) {
        var editor = CKEDITOR.replace(name, {
            language: 'vi',
            filebrowserBrowseUrl: baseUrl + '/public/editor/ckfinder/ckfinder.html',
            filebrowserImageBrowseUrl: baseUrl + '/public/editor/ckfinder/ckfinder.html?type=Images',
            filebrowserFlashBrowseUrl: baseUrl + '/public/editor/ckfinder/ckfinder.html?type=Flash',
            filebrowserUploadUrl: baseUrl + '/public/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
            filebrowserImageUploadUrl: baseUrl + '/public/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
            filebrowserFlashUploadUrl: baseUrl + '/public/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
        });
        CKFinder.setupCKEditor(editor, '../');
    }
});
