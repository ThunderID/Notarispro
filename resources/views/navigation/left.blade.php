<ul class="nav">
	@foreach($navbars as $key => $navbar)
		<li>
			<a href="{{$navbar['route']}}">
				<p>{{ucwords(str_replace('_',' ',$key))}}</p>
			</a>
		</li>
		@foreach($navbar['sub'] as $key2 => $value)
			<li class="@if(isset($page_attributes->active_nav) && in_array($key2, $page_attributes->active_nav)) active @endif">
				<a href="{{$value['route']}}">
					<p>&nbsp;&nbsp;&nbsp;&nbsp;{{ucwords(str_replace('_',' ',$key2))}}</p>
				</a>
			</li>
		@endforeach
	@endforeach
</ul>
