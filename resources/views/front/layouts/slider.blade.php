<!--start slider section-->
<div class="main_slider_section">
    <div class="one_main_slider">
        @foreach($sliders as $slider)
         <div class="slider_item">
           
             <img src="{{asset($slider->image->image)}}" alt="" class="slider_thumb">
           
         </div>
        @endforeach
    </div>
 </div>
