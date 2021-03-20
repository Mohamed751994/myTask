<div class="col-lg-3 col-md-12 courses_filter pl-5">
  <div class="sidebar-area">

    <form id="sideFilter" onsubmit="return false;" autocomplete="off">
     
      <!-- Categories -->
      <div class="widget widget_post_categories">
          <h3 class="widget-title responsive-m">Categories</h3>
          <ul>
              @foreach($categories as $category)
              <li><input type="checkbox" id="category{{$category->id}}" name="category[]" 
                value="{{$category->id}}"> <label for="category{{$category->id}}">{{$category->name}}</label></li>
              @endforeach
          </ul>
      </div>

      <!-- Rating -->
      <div class="widget widget_post_categories">
          <h3 class="widget-title responsive-m">Courses Rating</h3>
          <ul>
              <li><input type="checkbox" id="rate5" name="rating[]" value="5">
                <label for="rate5">
                <span class="fa fa-star stars"></span>
                <span class="fa fa-star stars"></span>
                <span class="fa fa-star stars"></span>
                <span class="fa fa-star stars"></span>
                <span class="fa fa-star stars"></span>
                </label>
              </li>
              <li><input type="checkbox" id="rate4" name="rating[]" value="4">
                <label for="rate4">
                <span class="fa fa-star stars"></span>
                <span class="fa fa-star stars"></span>
                <span class="fa fa-star stars"></span>
                <span class="fa fa-star stars"></span>
                <span class="fa fa-star"></span>
                </label>
              </li>
              <li><input type="checkbox" id="rate3" name="rating[]" value="3">
                <label for="rate3">
                <span class="fa fa-star stars"></span>
                <span class="fa fa-star stars"></span>
                <span class="fa fa-star stars"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
                </label>
              </li>
              <li><input type="checkbox" id="rate2" name="rating[]" value="2">
                <label for="rate2">
                <span class="fa fa-star stars"></span>
                <span class="fa fa-star  stars"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
                </label>
              </li>
              <li><input type="checkbox" id="rate1" name="rating[]" value="1">
                <label for="rate1">
                <span class="fa fa-star stars"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
                </label>
              </li>


          </ul>
      </div>

      <!-- Levels -->
      <div class="widget widget_post_categories">
          <h3 class="widget-title responsive-m">Level</h3>
          <ul>
              <li><input type="checkbox" name="levels[]" id="beginner" value="beginner">  <label for="beginner">Beginner</label></li>
              <li><input type="checkbox" name="levels[]" id="immediate" value="immediate"> <label for="immediate">Immediate</label> </li>
              <li><input type="checkbox" name="levels[]" id="high" value="high">  <label for="high">High</label></li>
          </ul>
      </div>

      <!-- Time -->
      <div class="widget widget_post_categories">
          <h3 class="widget-title responsive-m">Time</h3>
          <ul>
              <li><input type="checkbox" name="time[]" id="time1" value="4"> <label for="time1"> Less than 4 hours</label></li>
              <li><input type="checkbox" name="time[]" id="time2" value="8"> <label for="time2"> Less than 8 hours</label></li>
              <li><input type="checkbox" name="time[]" id="time3" value="9"> <label for="time3"> More than 8 hours</label></li>
          </ul>
      </div>

    </form>
  </div>
</div>