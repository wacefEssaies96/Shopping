@extends('layouts.app')

@section('title', 'Add Image')
@section('content')

<!-- ##### Main Content Wrapper Start ##### -->
<div class="main-content-wrapper d-flex clearfix">
    @include('layouts.navgauche')
    <div class="cart-table-area section-padding-100">
        <div class="container-fluid">
            <div class="col-12 col-lg-10">
                <div class="checkout_details_area mt-50 clearfix">
                    <div  class="h4 text-gray-900 mb-4 text-warning ">
                        Add Image
                    </div>

                    <form action="{{ route('ImageProduit.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        
                        <input type="hidden"  name="prod_id" value="{{$prod_id}}">
                        <div class="row ">
                            <div class="col-6 mb-3">
                                <label > Image   </label>
                                
                                <input type="file" id="image"  name="image" class="form-control"  placeholder="Place your image here">
                    
                                    
                                <!-- if( image not null){
                                    <label > You change your image to    </label>
                                    <img style="float:right; width:300px; height:200px;" src="image name" alt="Path not correct">
                                }else{
                                    You don't change the image
                                } -->
                            @error('image')<div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div> 

                        
                        <div class="row justify-content-center">
                            <button type="submit" name="submit" class="btn amado-btn "> Add </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>        
@endsection

                    

                    