<div class="shop_sidebar_area">

<!-- ##### Single Widget ##### -->
<div class="widget catagory mb-50">
    <!-- Widget Title -->
    <h6 class="widget-title mb-30">Catagories</h6>

    <!--  Catagories  -->
    <div class="catagories-menu">
        <ul>
            
            <li><a href="#" onClick="updateCategorie('Electroménager');">Electroménager</a></li>
            <li><a href="#" onClick="updateCategorie('Informatique');">Informatique</a></li>
            <li><a href="#" onClick="updateCategorie('Bureautique');">Bureautique</a></li>
            
        </ul>
    </div>
</div>


<!-- ##### Single Widget ##### -->
<div class="widget price mb-50">
    <!-- Widget Title -->
    <h6 class="widget-title mb-30">Price</h6>

    <div class="widget-desc">
        <div class="slider-range">
            <div data-min="10" data-max="5000" data-unit="$" class="slider-range-price ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" data-value-min="{{$min}}" data-value-max="{{$max}}" data-label-result="">
                <div class="ui-slider-range ui-widget-header ui-corner-all" ></div>
                <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0" onClick="var priceRange = document.getElementById('price').innerText; updatePrice(priceRange);"></span>
                <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0" onClick="var priceRange = document.getElementById('price').innerText; updatePrice(priceRange);"></span>
            </div>
            <div id="price" class="range-price">{{ $price }}</div>
        </div>
    </div>
</div>
</div>