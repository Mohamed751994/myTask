@push('requests')
<script type="text/javascript">
  // Save Category
$("#saveCategorySubmit").on('click',function(e){
      e.preventDefault();

       var formdata = $("#saveCategory").serialize();
       if(formdata!=''){


        var url = "{{ route('category.update', $category->id) }}";
        
        
        $.ajax({
          type: "post",
          cache: false,
          url: url,
          data:  formdata, 
            beforeSend:function(){
                $('#saveCategorySubmit').html('Loading...');
                $('#saveCategorySubmit').attr('disabled', true);
                $('#saveCategorySubmit').css('cursor', 'no-drop');
            },
           success:function(response){
                $('#saveCategorySubmit').html('<i class="fa fa-plus"></i> Update');
                $('#saveCategorySubmit').attr('disabled', false);
                $('#saveCategorySubmit').css('cursor', 'pointer');
                $('.validation_errors').html('');
                swal("Good job!", "Category Updated Successfully", "success");
              },
              error:function(xhr){
                setTimeout(function(){
                    $('#saveCategorySubmit').html('<i class="fa fa-plus"></i> Update');
                    $('#saveCategorySubmit').attr('disabled', false);
                    $('#saveCategorySubmit').css('cursor', 'pointer');
                    
                    $.each(xhr.responseJSON.errors, function(key,value) {
                    $('#'+key).css('border-color', 'red');
                    
                    if (key == 'name') {
                     $('#name_error').html(value);
                    }
                    $('#'+key).keyup(function(){
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