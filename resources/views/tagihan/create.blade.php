@extends('scaffold.layout')

@section('content')
	<div class="content">
		<div class="container-fluid">
			<div class="card">
				<div class="header">
					<div class="row">
						<div class="col-sm-4">
							<h4 class="title">Tagihan Baru</h4>
						</div>
						<div class="col-sm-8">
				
						</div>
					</div>
				</div>
				<div class="content">
					<form method="post" action="{{route('tagihan.store')}}">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label>Nomor Tagihan</label>
									<input type="text" class="form-control border-input" placeholder="Nomor Tagihan" name="nomor_tagihan" value="S842934892">
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label>Dikeluarkan Oleh</label>
									<input type="text" class="form-control border-input" name="dikeluarkan_oleh" placeholder="Dikeluarkan Oleh" value="Thunderlabs Indonesia Inc.">
								</div>
							</div>
							<div class="col-md-5">
								<div class="form-group">
									<label>Dikeluarkan Untuk</label>
									<input type="text" class="form-control border-input" name="dikeluarkan_untuk" placeholder="Dikeluarkan Untuk" value="">
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>Tanggal</label>
									<input type="text" class="form-control border-input" name="tanggal" placeholder="dd/mm/yyyy" value="{{Carbon\Carbon::now()->format('d/m/Y')}}">
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label>Detail Tagihan</label>
									<table id="tagihan" class="display" cellspacing="0" width="100%">
										<thead>
											<tr>
												<th></th>
												<th>Deskripsi</th>
												<th>Total Biaya</th>
												<th>Diskon</th>
											</tr>
										</thead>
									</table>
								</div>
							</div>
						</div>
						<div class="clearfix">&nbsp;</div>
						<div class="text-right">
							<button type="submit" class="btn btn-info btn-fill btn-wd">Simpan</button>
						</div>
						<div class="clearfix"></div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection

@push('styles')
	<link href='https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css'>
	<link href='https://cdn.datatables.net/buttons/1.2.4/css/buttons.dataTables.min.css' rel='stylesheet' type='text/css'>
	<link href='https://cdn.datatables.net/select/1.2.1/css/select.dataTables.min.css' rel='stylesheet' type='text/css'>
	<link href='https://editor.datatables.net/extensions/Editor/css/editor.dataTables.min.css' rel='stylesheet' type='text/css'>
@endpush

@push('scripts')
	<script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js" type="text/javascript"></script>
	<script src="https://cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js" type="text/javascript"></script>
	<script src="https://cdn.datatables.net/select/1.2.1/js/dataTables.select.min.js" type="text/javascript"></script>
	<script src="{!!url('/datatables/js/dataTables.editor.min.js')!!}" type="text/javascript"></script>

	<script type="text/javascript">
		var editor; // use a global for the submit and return data rendering in the examples
	
		$(document).ready(function(){

			editor = new $.fn.dataTable.Editor( {
				ajax: "{{route('tagihan.dummy.post')}}",
				table: "#tagihan",
				fields: [ {
						label: "Deskripsi",
						name: "deskripsi"
					}, {
						label: "Total Biaya",
						name: "jumlah"
					}, {
						label: "Diskon",
						name: "diskon"
					}
				]
			} );
		 
			// Activate an inline edit on click of a table cell
			$('#tagihan').on( 'click', 'tbody td:not(:first-child)', function (e) {
				editor.inline( this );
			} );
		 
			$('#tagihan').DataTable( {
				dom: "Bfrtip",
				ajax: "{{route('tagihan.dummy.get')}}",
				order: [[ 1, 'asc' ]],
				columns: [
					{
						data: null,
						defaultContent: '',
						className: 'select-checkbox',
						orderable: false
					},
					{ data: "deskripsi" },
					{ data: "jumlah" },
					{ data: "diskon" }
				],
				select: {
					style:    'os',
					selector: 'td:first-child'
				},
				buttons: [
					{ extend: "create", editor: editor },
					{ extend: "edit",   editor: editor },
					{ extend: "remove", editor: editor }
				]
			} );
		} );
	</script>
@endpush