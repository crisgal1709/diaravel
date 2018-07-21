<div class="sidebar-widget recent-news">
 <div class="sidebar-title">
   <h2>Entradas recientes</h2>
 </div>

@foreach ($posts as $recentPost)
<!--News Widget-->
<div class="news-widget">
  <div class="text">
    <a href="{{ route('frontend.post', $recentPost->slug) }}">{{ $recentPost->title }}</a>
  </div>
  <span class="days">{{ $recentPost->present()->getPublishedDate() }}</span>
</div>

@endforeach

</div>