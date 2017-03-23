@extends('scaffold.layout')

@section('content')
	<div class="content">
		<div class="container-fluid">
			<div class="card">
				<div class="header">
					<div class="row">
						<div class="col-sm-4">
							<h4 class="title">Daftar Tagihan</h4>
							<p class="category">{{$page_attributes->search_result}}</p>
						</div>
						<div class="col-sm-8">
							<form method="get" action="{{route('tagihan.index')}}">
								<div class="input-group">
									<input type="text" name='q' class="form-control border-input" value="{{Input::get('q')}}" placeholder="Search for...">
									<span class="input-group-btn">
										<button class="btn btn-secondary" type="button">Go!</button>
									</span>
								</div>
							</form>
						</div>
					</div>
				</div>
				<div class="content table-responsive table-full-width">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>Nomor</th>
								<th>Tanggal</th>
								<th>Nama</th>
								<th>Total</th>
								<th>Jatuh Tempo</th>
								<th colspan="2">&nbsp;</th>
							</tr>
						</thead>
						<tbody>
							@foreach($tagihan as $key => $value)
								<tr>
									<td>{{$tagihan->firstItem() + $key}}</td>
									<td>{{$value['tanggal']}}</td>
									<td>{{$value['dikeluarkan_untuk']}}</td>
									<td>{{$value['total']}}</td>
									<td>{{$value['jatuh_tempo']}}</td>
									<td>
										<a href="#">
											Hapus
										</a>
									</td>
									<td>
										<a href="{{route('tagihan.show', ['id' => $value['id']])}}">
											Detail
										</a>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
					<div class="row">
						<div class="col-sm-12 text-center">
							{{$tagihan->links()}}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection