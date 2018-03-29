<ul class="nav_type_list rel">
    @foreach($types as $class)
        <li class="nav_type_bg">
            <span class="fl nav_type_icon01"><img src="{{$class['icon']}}" alt="" /></span>
            <span class="fl nav_type_icon02"><img src="{{$class['icon']}}" alt="" /></span>
            <span class="f16"><a href="{{url('/types/'.$class['id'])}}">{{$class['typename']}}</a></span>
            <div class="nav_type_meau">
                <ul>
                    @foreach($class['subclass'] as $class2)
                        <li>
                            <b class="fl nav_type_meau_name"><a href="{{url('/types/'.$class2->id)}}">{{$class2->typename}}</a></b>
                            <div class="fr nav_type_meau_con">
                                @foreach($class2['subclass'] as $class3)
                                    <a href="{{url('/types/'.$class3->id)}}">{{$class3->typename}}</a>
                                @endforeach
                            </div>
                            <div class="cl"></div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </li>
    @endforeach
</ul>
