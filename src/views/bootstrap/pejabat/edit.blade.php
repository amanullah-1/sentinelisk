@extends(config('sentinel.layout'))

@section('title', 'Kemaskini Pejabat')

@section('content')
<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title pull-left" style="padding-top:0px;">Kemaskini Pejabat</h3>
               <div class="clearfix"></div>
			</div>
			<div class="panel-body">
				{!! Form::model($pejabat, array('route' => array('sentinel.pejabat.update', $pejabat->id), 'method' => 'PUT', 'class' => 'form-horizontal')) !!}
					<div class="form-group">
						{!! Form::label('jenis_pejabat', 'Jenis Pejabat', ['class' =>'col-sm-3 control-label']) !!}
						<div class="col-sm-9">
							{!! Form::select('jenis_pejabat',['' => 'Sila pilih', 'Ibu Pejabat' => 'Ibu Pejabat', 'AADK Negeri' => 'AADK Negeri'], @$jenis_pejabat, ['class' => 'form-control']) !!}
						</div>				  		
				  	</div>
					<div class="form-group">
						{!! Form::label('nama', 'Nama', ['class' =>'col-sm-3 control-label']) !!}
						<div class="col-sm-9">
							{!! Form::text('nama', @$nama, ['class' => 'form-control']) !!}
						</div>				  		
				  	</div>
				  	<div class="form-group">
						{!! Form::label('negeri', 'Negeri', ['class' =>'col-sm-3 control-label']) !!}
						<div class="col-sm-9">
							{!! Form::text('negeri', @$negeri, ['class' => 'form-control']) !!}
						</div>				  		
				  	</div>
				  	<div class="form-group">
				  		<div class="col-sm-offset-3 col-sm-9">
				  			{!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
				  			<a href="{{ route('sentinel.pejabat.index') }}" class="btn btn-default">Kembali</a>
				  		</div>
				  	</div>			 

				{!! Form::close() !!}
			</div>
		</div>
	</div>
	<div class="col-sm-12">
		<ul>
			@foreach($pejabat->revisionHistory->reverse() as $history)
			@if($history->key == 'created_at' && !$history->old_value)
			<li>{{ $history->userResponsible()->nama }} mencipta pejabat ini pada {{ $history->newValue() }}</li>
			@else
			<li>{{ $history->userResponsible()->nama }} mengemaskini {{ $history->fieldName() }} dari {{ $history->oldValue() }} kepada {{ $history->newValue() }}</li>
			@endif
			@endforeach
		</ul>
	</div>
</div>
@endsection
