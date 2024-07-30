<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voucher Templates</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.2/codemirror.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.2/theme/dracula.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>
<body>
    <h1>Voucher Templates</h1>

    <form id="voucherForm" action="{{ route('voucher-templates.store') }}" method="POST">
        @csrf
        <div>
            <label for="name">Template Name</label>
            <input type="text" id="name" name="name">
        </div>
        <div>
            <label for="css_code">CSS Code</label>
            <textarea id="css_code" name="css_code" ></textarea>
        </div>
        <div>
            <label for="html_code">HTML Code</label>
            <textarea id="html_code" name="html_code" ></textarea>
        </div>
        <button type="submit">Create Template</button>
    </form>

    <h2>Templates</h2>
    <table border="1">
        <thead>
            <tr>
                <th>Serial No.</th>
                <th>Name of the Templates</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($templates as $template)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $template->name }}</td>
                    <td>
                        <a href="{{ route('voucher-templates.view', $template->id) }}">View</a>
                        <a href="{{ route('voucher-templates.edit', $template->id) }}">Edit</a>
                        <form action="{{ route('voucher-templates.destroy', $template->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

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

            document.getElementById('voucherForm').addEventListener('submit', function(e) {
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
