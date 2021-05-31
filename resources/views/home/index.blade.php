@extends('templates.default')

@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
			<li class="active">Accueille</li>
		</ol>
	</div>
	<!--/.row-->
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Interconnexion des prisons au burundi</h1>
		</div>
	</div>
	
	<!--/.row-->

	<div class="parallax-container ">
      <div class="col-lg-12 main-chart">
        <div class="custom-bar-chart">
          <ul class="y-axis">
            <li><span> {{ $max }}</span></li>
            @for($i = 4; $i >= 0; $i--)
                <li><span> {{ $max = $max - $moyenne}}</span></li>
                {{-- <li><span> {{ $max = round(($max / 2), 1)}}</span></li> --}}
            @endfor
          </ul>
          @foreach ($charts as $chart)
            <div class="bar">
              <div class="title">{{ $chart['province']}}</div>
              <div class="value tooltips" data-original-title="{{ $chart['valeur']}}" data-toggle="tooltip" data-placement="top">{{ $chart['pourcentage']}}%</div>
            </div>
          @endforeach
          
        </div>
      </div>
	  </div> 
  </div>
</div>
@endsection