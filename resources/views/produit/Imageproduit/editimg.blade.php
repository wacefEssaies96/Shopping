@extends('layouts.form')

@section('title', 'Edit Image Produit')
@section('content')

<div class="row justify-content-center" >
    <fieldset class="col-lg-6" style="color: white;background-image: url({{ asset('img/bg-img/bgprimary1.jpg') }});background-repeat: no-repeat;size:100% 100%;background-size: 100% 100%;padding: 30px 30px;border-radius:30px;"> 
        <div  class="h4 text-gray-900 mb-4 text-warning ">Edit Image</div>
        <form action="{{ route('ImageProduit.update', $imgprod->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div >
            
                <input type="hidden"  name="prodid" value="{{$prodid}}">
                <div class="row form-groupe">
                    <label > Image   </label>
                    <input type="file"  name="image" class="form-control"  >
                    <input type="hidden" name="animage"  value="{{ old('image')  ?? $imgprod->image}}"  id="animage" class="form-control" >
                        
                    @error('image')<div class="text-danger">{{ $message }}</div> @enderror
                </div>
                <br>
                <div class="row justify-content-center">
                    <button type="submit" name="submit" class="btn btn-primary "> Confirm update</button>
                </div>
            </div>
        </form>
    </fieldset>
</div>
@endsection