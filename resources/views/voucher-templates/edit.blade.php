<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Voucher Template</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.2/codemirror.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.2/theme/dracula.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>
<body>
    <h1>Edit Voucher Template</h1>

    <form id="editVoucherForm" action="{{ route('voucher-templates.update', $template->id) }}" method="POST">
        @csrf
        <div>
            <label for="name">Template Name</label>
            <input type="text" id="name" name="name"  value="{{ $template->name }}">
        </div>
        <div>
            <label for="css_code">CSS Code</label>
            <textarea id="css_code" name="css_code" >{{ $template->css_code }}</textarea>
        </div>
        <div>
            <label for="html_code">HTML Code</label>
            <textarea id="html_code" name="html_code" >{{ $template->html_code }}</textarea>
        </div>
        <button type="submit">Update Template</button>
    </form>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.2/codemirror.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.2/mode/css/css.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.2/mode/xml/xml.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.2/mode/javascript/javascript.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.2/mode/htmlmixed/htmlmixed.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.2/addon/edit/matchbrackets.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var cssEditor = CodeMirror.fromTextArea(document.getElementById("css_code"), {
                lineNumbers: true,
                mode: "css",
                theme: "dracula",
                matchBrackets: true
            });

            var htmlEditor = CodeMirror.fromTextArea(document.getElementById("html_code"), {
                lineNumbers: true,
                mode: "htmlmixed",
                theme: "dracula",
                matchBrackets: true
            });

            document.getElementById('editVoucherForm').addEventListener('submit', function(e) {
                var nameField = document.getElementById('name').value;
                if (nameField.trim() === '') {
                    e.preventDefault();
                    console.log('kaka');
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Template Name is required!'
                    });
                }
            });
        });
    </script>
</body>
</html>
