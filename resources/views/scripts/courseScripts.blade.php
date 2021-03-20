@push('requests')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">


//Show Data
$(function () {
    
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('courses.index') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'category_id', name: 'category_id'},
            {data: 'name', name: 'name'},
            {data: 'rating', name: 'rating'},
            {data: 'views', name: 'views'},
            {data: 'levels', name: 'levels'},
            {data: 'hours', name: 'hours'},
            {data: 'active', name: 'active'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
        


    });
    
});



//edit data





//Delete Data
$(document).on('click', '.delete', function(){
        var id = $(this).attr('id');

        swal({
          title: "Are you sure?",
          text: "",
          icon: "warning",
          buttons: true,
          buttons: ['No', 'Yes'],
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            swal("Course Deleted Successfully...", {
              icon: "success",
            });
          
             $.ajax({
                url:"{{route('course.destroy')}}",
                mehtod:"get",
                data:{id:id},
                success:function(data)
                {
                    $('#category_table').DataTable().ajax.reload();
                }
            });
          } else {
            return false;
          }
        });

    }); 


</script>

@endpush