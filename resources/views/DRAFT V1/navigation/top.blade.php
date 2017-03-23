<!-- BEGIN HEADER MENU -->
<div class="nav-collapse collapse navbar-collapse navbar-responsive-collapse">
	<ul class="nav navbar-nav">
		@foreach($navbars as $key => $value)
			<li class="dropdown dropdown-fw dropdown-fw-disabled">
				<a href="javascript:;" class="text-uppercase">
					{{ucwords(str_replace('_',' ',$key))}} 
				</a>

				<ul class="dropdown-menu dropdown-menu-fw">
					@foreach($value['sub'] as $key2 => $value2)
						<li class="active">
							<a href="{{$value2}}">
								{{ucwords(str_replace('_',' ',$key2))}} 
							</a>
						</li>
					@endforeach
				</ul>
			</li>
		@endforeach
	</ul>
</div>
<!-- END HEADER MENU -->