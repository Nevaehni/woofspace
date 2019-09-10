@extends('layouts.app')

@section('content')
@php

if(auth::user() != null)
{
    if(isset($findUser) != false)
    {
        $user = $finduser;
    }        
    else
    {
        $user = auth::user();
    } 
}   
else{
    if(isset($findUser) != false)
    {
        $user = $finduser;
    }
    else
    {
        $user = false;
    }     
}

@endphp

<div class="homeContainer">
    @if($user == false)
        <span class="guestSearch"> Use the search function to stalk some people ! </span>
    @endif
        
    <div class="profileContainer">  
         
        @if($user != false)
            @if(isset($findUser) != false)
                <img class="func_img" src="{{asset('images/thumb_up.png')}}" alt="Like logo">
                {{-- <span class="img_description">Like profile</span> --}}
            @else                
                <img class="func_img" src="{{asset('images/settings.png')}}" alt="Settings logo">
                {{-- <span class="img_description">Edit profile</span>                --}}
            @endif
            <img class="profileImage" src="{{asset('images/'.$user->image)}}" alt="Profile picture">         
        @endif        
        <div class="descriptionContainer">
            @if($user != false)
                @if(auth::user() != null)
                    <h1 class="name">{{$user->first_name}} {{$user->last_name}}</h1>
                    <h2 class="relation">Relation status: {{$relations->find($user->relation)->description}}</h2>
                    <h4 class="relation">Email: {{$user->email}}</h4>
                    <h4 class="relation">Adres: {{$user->streetname}}, {{$user->housenumber}} {{$user->housenumbersuffix}}. Zipcode: {{$user->zipcode}}</h4>
                @else
                    <h1 class="name">{{$user->username}}</h1>
                @endif
            @else
                
            @endif
            <br>            
        </div>    
    </div>
    
    <div class="searchContainer">

        <input class="searchBar" name="searchData" type="text" placeholder="Search"> 

        <div id="searchResults"></div>
        <button class="searchBtn">
            <i class="fas fa-search"></i>
        </button> 
        {{ csrf_field() }}       
    </div>
</div>

{{-- <script>
    $('#searchBar').keyup(function(){ 
        var query = $(this).val();
        if(query != '')
        {
         var _token = $('input[name="_token"]').val();
         $.ajax({
          url:"{{ route('autocomplete.fetch') }}",
          method:"POST",
          data:{query:query, _token:_token},
          success:function(data){
           $('#searchResults').fadeIn();  
                    $('#searchResults').html(data);
          }
         });
        }
    });
    
    $(document).on('click', 'li', function(){  
        $('#searchBar').val($(this).text());  
        $('#searchResults').fadeOut();  
    }); 
</script> --}}
@endsection
