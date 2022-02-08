@extends('front.index')
@section('content')





        <img src="{{ $ourTeam->path }}" class="img-fluid" alt="">
        <p>{{ $ourTeam->name }}</p>
        <p>{{ $ourTeam->Reshte }}</p>
          <p>{{ $ourTeam->description }}</p>


    </div>

</main>





@endsection
