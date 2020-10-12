@extends('layouts.app')

@section('content')
<div class="col-sm-12">
    <h2>
        {{ $film['title'] }}
    </h2>
	<div class="card">
		<div class="card-body">
			<p>{{ $film['opening_crawl'] }}</p> 
			<div class="row border-bottom pb-2 pt-2">
				<div class="col-sm-6"><strong>Film name</strong></div>
				<div class="col-sm-6">{{ $film['title'] }}</div>
			</div>
			<div class="row border-bottom pb-2 pt-2">
				<div class="col-sm-6"><strong>Director</strong></div>
				<div class="col-sm-6">{{ $film['director'] }}</div>
			</div>
			<div class="row border-bottom pb-2 pt-2">
				<div class="col-sm-6"><strong>Release date</strong></div>
				<div class="col-sm-6">{{ date("d.m.Y", strtotime($film['release_date'])) }}</div>
			</div>
			<div class="row border-bottom pb-2 pt-2">
				<div class="col-sm-6"><strong>Episode</strong></div>
				<div class="col-sm-6">{{ $film['episode_id'] }}</div>
			</div>
			<div class="row pb-2 pt-2">
				<div class="col-sm-6"><strong>Producer</strong></div>
				<div class="col-sm-6">{{ $film['producer'] }}</div>
			</div>
		</div>
	</div>
	
    
</div> 

@endsection

