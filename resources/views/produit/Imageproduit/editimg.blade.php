@extends('layouts.app')

@section('title', 'Edit Image Produit')
@section('content')

<!-- ##### Main Content Wrapper Start ##### -->
<div class="main-content-wrapper d-flex clearfix">
    @include('layouts.navgauche')
    <div class="cart-table-area section-padding-100">
        <div class="container-fluid">
            <div class="col-12 col-lg-10">
                <div class="checkout_details_area mt-50 clearfix">
                    <div  class="h4 text-gray-900 mb-4 text-warning ">
                        Edit Image
                    </div>
                    <form action="{{ route('ImageProduit.update', $imgprod->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        
                        <input type="hidden"  name="prodid" value="{{$prodid}}">
                        <div class="row ">
                            <div class="col-6 mb-3">
                                <label > Image   </label>
                                <input id="image" type="file"  name="image" class="form-control"  >

                                <input type="hidden" name="animage"  value="{{ old('image')  ?? $imgprod->image}}"  id="animage" class="form-control" >
                                    
                                <!-- if( image not null){
                                    <label > You change your image to    </label>
                                    <img style="float:right; width:300px; height:200px;" src="image name" alt="Path not correct">
                                }else{
                                    You don't change the image
                                } -->
                            @error('image')<div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-6 mb-3 ">
                                <img  src="{{asset('storage/'.$imgprod->image)}}" alt="Path not correct">
                            
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <button type="submit" name="submit" class="btn amado-btn "> Confirm update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>        
@endsection