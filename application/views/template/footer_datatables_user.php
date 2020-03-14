    <script type="text/javascript">
$(document).ready(function() {
    $('#list_mhs').DataTable({
        "ajax": 'http://localhost/CodeIgniter3-2/index.php/user/toJson',
        "columns": [{
                "data": "nama"
            },
            {
                "data": "email"
            },
            {
                "data": "jurusan"
            },
        ]
    });
});
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>

    </body>

    </html>