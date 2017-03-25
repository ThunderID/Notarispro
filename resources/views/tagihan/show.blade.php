@extends('scaffold.layout')

@section('content')
	<div class="content">
		<div class="container-fluid">
			<div class="card">
				<div class="header">
					<div class="row">
						<div class="col-sm-4">
							<p>
								<a href="{{route('tagihan.index')}}">
									<i class="ti-arrow-left"></i>
								</a>
							</p>
							<h4 class="title">TAGIHAN</h4>
							<p class="category">{{$tagihan['dikeluarkan_oleh']}}</p>
						</div>
					</div>
				</div>
				<div class="content">
					<div class="row">
						<div class="col-sm-4">
							<h5 style="font-weight: 300;margin-bottom: 2px;">TERTAGIH</h5>
							<p>
								<small>{{$tagihan['dikeluarkan_untuk']}}</small>
							</p>
						</div>
						<div class="col-sm-8">
							<div class="row">
								<div class="col-sm-8 text-right">
									<h5 style="font-weight: 300;margin-bottom: 2px;margin-top: 5px;">Tanggal</h5>
								</div>
								<div class="col-sm-4 text-right">
									<p style="margin-top: 8px;" class="text-right">
										<small>{{$tagihan['tanggal']}}</small>
									</p>
								</div>
							</div>					
							<div class="row">
								<div class="col-sm-8 text-right">
									<h5 style="font-weight: 300;margin-bottom: 2px;margin-top: 5px;">Nomor</h5>
								</div>
								<div class="col-sm-4 text-right">
									<p style="margin-top: 8px;" class="text-right">
										<small>{{$tagihan['nomor_tagihan']}}</small>
									</p>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-8 text-right">
									<h5 style="font-weight: 300;margin-bottom: 2px;margin-top: 5px;">Jatuh Tempo</h5>
								</div>
								<div class="col-sm-4 text-right">
									<p style="margin-top: 8px;" class="text-right">
										<small>{{$tagihan['jatuh_tempo']}}</small>
									</p>
								</div>
							</div>		
						</div>
					</div>

					<div>&nbsp;</div>
					
					<div class="row">
						<div class="col-sm-12">
							<table class="table table-striped">
								<thead>
									<tr>
										<th>#</th>
										<th>Deskripsi</th>
										<th>Biaya</th>
										<th>Diskon</th>
										<th>Total Biaya</th>
									</tr>
								</thead>
								<tbody>
									@foreach($tagihan['detail'] as $key => $value)
										<tr>
											<td>{{$key + 1}}</td>
											<td>{{$value['deskripsi']}}</td>
											<td>{{$value['jumlah']}}</td>
											<td>{{$value['diskon']}}</td>
											<td>&nbsp;</td>
										</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
@endsection
