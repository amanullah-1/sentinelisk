@extends(config('sentinel.layout'))

@section('title', 'Senarai Pejabat')

@section('content')
<div class="row">
    <div class="col-md-12">
    	<div class="panel panel-default">
           <div class="panel-heading">
               <h3 class="panel-title pull-left">Senarai Pejabat</h3>
               <a class='btn btn-primary pull-right' href="{{ route('sentinel.pejabat.create') }}">Tambah Pejabat</a>
               <div class="clearfix"></div>            
           </div>
           <div class="panel-body">
           	<div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                        <th>#</th>
                        <th>Jenis Pejabat</th>
                        <th>Nama</th>
                        <th>Negeri</th>
                        <th>&nbsp;</th>
                        </thead>
                        <tbody>
                        <?php $page = isset($_GET['page']) ? $_GET['page'] :1 ?>
						  <?php $count = 1 + (($page - 1) * 5) ?>
                        @forelse ($pejabats as $pejabat)
                            <tr>
										<th>{{ $count }}</th>
										<td><div>{{ $pejabat->jenis_pejabat }}</div></td>										
										<td class="table-text"><div><a href="/pentadbir/pejabat/{{ $pejabat->id }}/edit">{{ $pejabat->nama }}</a></div></td>
                                    <td><div> {{ $pejabat->negeri }}</div></td>

										<!-- Task Delete Button -->
										<td>
											<form action="/pentadbir/pejabat/{{ $pejabat->id }}" method="POST">
												{{ csrf_field() }}
												{{ method_field('DELETE') }}

												<button type="submit" id="delete-pejabat-{{ $pejabat->id }}" class="btn btn-danger btn-sm">
													<i class="fa fa-btn fa-trash"></i>Delete
												</button>
											</form>
										</td>
									</tr>
									<?php $count++ ?>
                        @empty
                        	  <tr>
                        	  		<td>Tiada pejabat</td>
                        	  </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
                {!! $pejabats->render() !!}
			</div>
		</div>
	</div>
</div>
@endsection
