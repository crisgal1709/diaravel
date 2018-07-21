<div class="sidebar-widget categories-blog">
   <div class="sidebar-title">
       <h2>Categorías</h2>
   </div>
   <div class="inner-box">
    <ul>
        @foreach ($categories as $category)
          <li><a href="#">{{ $category->name }}</a></li>
        @endforeach
    </ul>
</div>
</div>