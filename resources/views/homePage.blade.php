@include('includes.header')


  <section class="bodyContent my-5">
    <div class="container-fluid">
      <div class="row">

        <!-- Sidebar -->
        @include("includes.filter")
        <!-- End sidebar -->


        <div class="col-md-9 pl-5">
          <h4 class="title">All Courses</h4>

          <!-- Loading -->
          <div class="text-center">
            <img src="{{ asset('backend/loading.gif') }}" class="gif">
          </div>
          <!-- End -->

          <div class="row cardBody" id="allCourses">

            <!-- All Courses -->
            @include('courses')
            <!-- End -->

          </div>
        </div>
      </div>
    </div>
  </section>


@include('includes.footer')