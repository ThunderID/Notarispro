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
										<a href="#" data-toggle="modal" data-target="#myModal">
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

@push('before_body')
	<!-- Modal -->
	<div id="myModal" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<form action="{{route('tagihan.destroy', ['id' => null])}}" method="DELETE">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Hapus Tagihan</h4>
					</div>
					<div class="modal-body">
						<p>Menghapus tagihan akan mengirim email pembatalan tagihan kepada klien</p>
						<p class="text-warning"><small>Tagihan yang dihapus tidak dapat di kembalikan</small></p>
					</div>
					<div class="modal-footer">
						<div class="row text-center">
							<div class="col-sm-6">
								<button type="button" class="btn btn-default btn-simple" data-dismiss="modal">Batal</button>
							</div>
							<div class="col-sm-6">
								<button type="submit" class="btn btn-danger btn-simple">Hapus</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>	
@endpush