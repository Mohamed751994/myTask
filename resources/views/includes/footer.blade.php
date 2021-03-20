    <footer>
      Task Designed and Developed By : Mohamed Said
    </footer>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   	<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


    <!-- Filter Courses By Ajax -->
    <script type="text/javascript">
      
      $(document).ready(function () {

          $('#sideFilter input[type="checkbox"]').on('change', function (e) {
            getSelectedBoxes($(this));
          });

          function getSelectedBoxes(x){
            formData = $('#sideFilter').serialize();
            $.ajax({
                url: "{{ route('filterCourses') }}",
                dataType: 'json',
                method: 'get',
                data:  formData,

            beforeSend: function(){
            	$('.gif').show();
            	$('.cardBody').html('');
            },
            success: function(response){
             // console.log(response.success.data);
                setTimeout(function(){
	              $('.gif').hide(); 
	              if (response['success'] != '') {
	              $('.cardBody').html(response['success']);
	              }
	              else
	              {
	                $('.cardBody').html('<div class="col-md-12 text-center"><h4>No Courses Available</h4></div>');
	              }
                }, 500);
            }});
          }


      });  

    </script>



    <!-- search with pagination script -->
    <script>
      function fetch_data(page, query)
     {
      $.ajax({
       url:"/pagination/search?page="+page+"&query="+query,
       beforeSend: function(){
          $('.gif').show();
          $('.cardBody').html('');
        },
       success:function(response)
       {
        $('.gif').hide(); 
        $('.cardBody').html(response);
       }
      })
     }
      $('#search').on('keyup',function(){
          $value=$(this).val();
          var page = $('#hidden_page').val();
          var query = $('#search').val();
          $.ajax({
          type : 'get',
          url : "/pagination/search?page="+page+"&query="+query,
          data:{'search':$value},
          beforeSend: function(){
            $('.gif').show();
            $('.cardBody').html('');
          },
          success:function(response){
            $('.gif').hide(); 
          $('.cardBody').html(response);
          }
          });
      })

      $(document).ready(function(){

       $(document).on('click', '.pagination a', function(event){
        event.preventDefault(); 
        var page = $(this).attr('href').split('page=')[1];
        $('#hidden_page').val(page);
        var query = $('#search').val();
        fetch_data(page, query);
       });

       
      });
    </script>


  </body>
</html>