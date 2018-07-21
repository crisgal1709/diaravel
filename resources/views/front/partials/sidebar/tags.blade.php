<div class="sidebar-widget popular-tags">
    <div class="sidebar-title">
       <h2>Etiquetas populares</h2>
   </div>
   
   @foreach ($tags as $tag)
     <a href="#">{{ $tag->name }}</a>
   @endforeach
</div>