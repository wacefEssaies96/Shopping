<!-- Search Wrapper Area Start -->
<div class="search-wrapper section-padding-100">
    <div class="search-close">
        <i class="fa fa-close" aria-hidden="true"></i>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="search-content">
                    <form id="form" action="{{route('shop')}}" method="get">
                        <input type="search" name="searchh" id="searchh" placeholder="Type your keyword...">
                        <button id="b" type="submit"><img src="{{asset('img/core-img/search.png')}}" alt=""></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Search Wrapper Area End -->
<script>
    var url = window.location.href;
    var test = false;
    var form =  document.getElementById('form');
    var img = document.createElement('img');
    img.setAttribute('src',"{{asset('img/core-img/search.png')}}");

    for(var i=0 ; i<url.length ; i++){
        if(url[i] == 's' && url[i+1] == 'h' && url[i+2] == 'o' && url[i+3] == 'p'){
            test = true;
            break;
        }
    }
 
    //alert(test);
    if(test == true){
        var b = document.getElementById('b');
        b.setAttribute('onClick','event.preventDefault(); t();');
    }
    function t(){
        var search = document.getElementById('searchh').value;
        document.getElementById('search').value = search;
        update();
    }
 
</script>