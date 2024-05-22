<!DOCTYPE html>
<html>

@include('template.header')

<body>
    
    <div id="wrapper">

        @include('template.nav_top')
        <!--/. NAV TOP  -->

        @include('template.nav_side')
        <!-- /. NAV SIDE  -->
        
        <div id="page-wrapper">
            <div id="page-inner">

                @include('task_content');

            </div>
            <!-- /. PAGE INNER  -->

        </div>
        <!-- /. PAGE WRAPPER  -->

    </div>
    <!-- /. WRAPPER  -->

    @include('template.footer')

    <script type="text/javascript">
        $(document).ready(function() {
            let dataTable = $('#tasks-table').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": {
                    "url": "/getTask",
                    "type": "GET",
                    "data": function (d) {
                        d.page = $('#tasks-table').DataTable().page.info().page + 1;
                        d.search = $('#tasks-table_filter input').val();
                        d.status = $('#status-filter').val();
                    }
                },
                "columns": [
                    { "data": "title" },
                    { "data": "content" },
                    { "data": "status" },
                    { "data": "created_by" },
                    { "data": "status" },
                    { "data": "created_at" },
                    { "data": "updated_at" },
                    {
                    "data": "id",
                        "render": function (data, type, row, meta) {
                            return `
                                <a href="/viewtask/${data}">view</a> &nbsp; &nbsp;
                                <button class="btn btn-default btn-sm btn-update" data-id="${data}">Update</button>
                                <button class="btn btn-default btn-sm btn-delete" data-id="${data}">Delete</button>
                                
                            `;
                        }
                    }
                ]
            });

            $('#status-filter').on('change', function() {
                dataTable.ajax.reload();
            });



            ajaxRequest('/get-todo', params='', method = 'GET')
            .then(function(response) {
            $('#task_count').html(response)
        })
        .catch(function(error) {
            let errordiv = document.getElementById('errorsDiv')
            let errArray = error.xhr.responseJSON.errors;
            let div = '';

            Object.values(errArray).forEach(function (k,v){
                console.log(k)
                div += "<p> - "+k+"</p><br/>";
            })

            $('#errorsDiv').css('visibility','visible');

            errordiv.innerHTML = div;
            
            hide_loader();

        });

        });
    </script>
</body>

</html>