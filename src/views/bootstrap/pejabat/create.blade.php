@extends(config('sentinel.layout'))

@section('title', 'Tambah Pejabat')

@section('content')
<div class="row">
    <div class="col-md-12">
    	<div class="panel panel-default">
           <div class="panel-heading">
               <h3 class="panel-title pull-left" style="padding-top:0px;">Tambah Pejabat</h3>
               <div class="clearfix"></div>
           </div>
           <div class="panel-body">
           	<form action="{{ route('sentinel.pejabat.store') }}" method="POST" class="form-horizontal">
					{{ csrf_field() }}
					<div class="form-group {{ ($errors->has('jenis_pejabat')) ? 'has-error' : '' }}">
						<label for="task-name" class="col-sm-3 control-label">Jenis Pejabat</label>
						<div class="col-sm-9">
							{!! Form::select('jenis_pejabat',['' => 'Sila pilih', 'Ibu Pejabat' => 'Ibu Pejabat', 'AADK Negeri' => 'AADK Negeri', 'AADK Daerah' => 'AADK Daerah'], null, ['class' => 'form-control']) !!}
							{!! ($errors->has('jenis_pejabat') ? '<span class="help-block">'.$errors->first('jenis_pejabat').'</span>' : '') !!}
						</div>
					</div>
					<div class="form-group {{ ($errors->has('nama')) ? 'has-error' : '' }}">
						<label for="task-name" class="col-sm-3 control-label">Nama</label>
						<div class="col-sm-9">
							<input type="text" name="nama" id="nama-pejabat" class="form-control" value="{{ old('nama') }}">
							{!! ($errors->has('nama') ? '<span class="help-block">'.$errors->first('nama').'</span>' : '') !!}
						</div>
					</div>
					<div class="form-group {{ ($errors->has('negeri')) ? 'has-error' : '' }}">
						<label for="task-name" class="col-sm-3 control-label">Negeri</label>
						<div class="col-sm-9">
							{!! Form::select('negeri', $negeriList, null, ['class' => 'form-control']) !!}
							{!! ($errors->has('negeri') ? '<span class="help-block">'.$errors->first('negeri').'</span>' : '') !!}
						</div>
					</div>				
					<!-- Add Task Button -->
					<div class="form-group">
						<div class="col-sm-offset-3 col-sm-9">
							<button type="submit" class="btn btn-default">
								<i class="fa fa-btn fa-plus"></i>Tambah Pejabat
							</button>
							<a href="{{ route('sentinel.pejabat.index') }}" class="btn btn-default">Kembali</a>
						</div>
					</div>
				</form>
           </div>
       </div>
    </div>
</div>
@endsection
