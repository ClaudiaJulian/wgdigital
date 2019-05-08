@extends('template.basic')

@section('content')

<div class="index principal" >
    <ul class="cajaOutfit">    
        <li class="column1"> 
            <div class="boxtop">
                @foreach($item as $i)
                    @if($i->id === $outfit->t_id)                               
                         <img class="masterTop topFor" src={{ asset($i->photo) }} id="" alt={{$outfit->t_id}} >
                    @endif
                @endforeach
            </div>
            <div class="boxbottom">
                @foreach($item as $i)
                    @if($i->id === $outfit->b_id) 
                        <img class="masterBottom bottomFor" src={{ asset($i->photo) }} id="" alt={{$outfit->b_id}} >
                    @endif
                @endforeach            
            </div>                 
        </li>
        <li class="column2">
            <div class="boxoutwear">
                @foreach($item as $i)
                    @if($i->id === $outfit->o_id) 
                        <img class="masterOutwear outFor" src={{ asset($i->photo) }} id="" alt={{$outfit->o_id}}>
                    @endif
                @endforeach
            </div>
            <div class="boxacc">
                @foreach($item as $i)
                    @if($i->id === $outfit->ba_id) 
                        <img class="masterBag bag" src={{ asset($i->photo) }} id="" alt={{$outfit->ba_id}}>
                    @endif
                @endforeach            
            </div>  
            <div class="boxshoes">
                @foreach($item as $i)
                    @if($i->id === $outfit->s_id)
                        <img class="masterShoes bag" src={{ asset($i->photo) }} id="" alt={{$outfit->s_id}}>
                    @endif
                @endforeach               
            </div>                   
        </li>

    <div class="nav-foot">
    @if($outfit->work === 1) <p style="margin:5px;">Office Day</p> @endif
    @if($outfit->day === 1) <p style="margin:5px;">WeekEnd</p> @endif
    @if($outfit->night === 1) <p style="margin:5px;">Night Out</p> @endif
    </div>

</div>
    


@endsection