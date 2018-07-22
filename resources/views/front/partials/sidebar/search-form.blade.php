<div class="sidebar-widget search-box">
	<form method="GET" action="{{ route('frontend.search') }}">
		<div class="form-group">
			<input type="search" name="s" value="" placeholder="Buscar" required>
			<button type="submit"><span class="icon fa fa-search"></span></button>
		</div>
	</form>
</div>