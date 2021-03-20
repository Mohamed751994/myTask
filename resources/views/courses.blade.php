@forelse($courses as $course)
<!-- Single Course -->
<div class="col-md-4 mt-3">
   <div class="card">
    <span class="category">{{$course->category->name}}</span>
    <div class="image"></div>
    <div class="card-body">
      <h5><a href="#">{{$course->name}}</a></h5>
      <p class="card-text">{!! \Illuminate\Support\Str::words($course->description, 12) !!}</p>

      <div class="course_rating">
        <?php
          for($i = 1 ; $i <= $course->rating ; $i++)
          {
        ?>
        <span class="fa fa-star stars"></span>
       <?php  } ?>

        <span class="views">({{$course->views}})</span>
      </div>

    </div>
  </div>
</div>
@empty
<div class="col-md-12 mt-3 text-center">
  <h4>No Courses Available </h4>
</div>
@endforelse
<!-- End -->

<div class="col-md-12 text-center mt-5">
  {!! $courses->links() !!}
</div>

<input type="hidden" name="hidden_page" id="hidden_page" value="1" />