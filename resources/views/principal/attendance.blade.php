@extends('layouts.pages')

@section('content')


						@while( $days = 30, (Carbon::now()->toDateString()) > (Carbon::now()->subDays(days)->toDateString()), $days--){
							{{Nikhil}}
						}
						
						
					




@endsection
