@push('requests')
<script type="text/javascript">
  // Save Course
$("#saveCourseSubmit").on('click',function(e){
      e.preventDefault();

       var formdata = $("#saveCourse").serialize();
       if(formdata!=''){


        var url = "{{ route('course.store') }}";
        
        
        $.ajax({
          type: "post",
          cache: false,
          url: url,
          data:  formdata, 
            beforeSend:function(){
                $('#saveCourseSubmit').html('Loading...');
                $('#saveCourseSubmit').attr('disabled', true);
                $('#saveCourseSubmit').css('cursor', 'no-drop');
            },
           success:function(response){
                $('#saveCourseSubmit').html('<i class="fa fa-plus"></i> Save');
                $('#saveCourseSubmit').attr('disabled', false);
                $('#saveCourseSubmit').css('cursor', 'pointer');
                $('.validation_errors').html('');
                $("#saveCourse")[0].reset();
                swal("Good job!", "Course Saved Successfully", "success");
              },
              error:function(xhr){
                setTimeout(function(){
                    $('#saveCourseSubmit').html('<i class="fa fa-plus"></i> Save');
                    $('#saveCourseSubmit').attr('disabled', false);
                    $('#saveCourseSubmit').css('cursor', 'pointer');
                    
                    $.each(xhr.responseJSON.errors, function(key,value) {
                    $('#'+key).css('border-color', 'red');
                    
                    if (key == 'category_id') {
                     $('#category_error').html(value);
                    }
                    if (key == 'name') {
                     $('#name_error').html(value);
                    }
                    if (key == 'description') {
                     $('#description_error').html(value);
                    }
                    if (key == 'rating') {
                     $('#rating_error').html(value);
                    }
                    if (key == 'views') {
                     $('#views_error').html(value);
                    }
                    if (key == 'hours') {
                     $('#hours_error').html(value);
                    }
                    if (key == 'levels') {
                     $('#levels_error').html(value);
                    }
                    $('#'+key).keyup(function(){
                        $('#'+key+'_error').html('');
                        $('#'+key).css('border-color', '#eee');
                    });
                    $('#'+key).change(function(){
                        $('#'+key+'_error').html('');
                        $('#'+key).css('border-color', '#eee');
                    });
    
                   });
                }, 500);
                
              }
        });
      }

         
});

</script>
@endpush