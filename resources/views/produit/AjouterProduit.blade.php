<!--
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>
<body>
    <div class="container">
        <form action="{{ route('produit.store') }}" class="form-controle" method="POST" >
            
            {{ csrf_field() }}
            <div class="jumbotron">
                <div class="form-groupe">
                    <label >Nom de produit</label>
                    <input type="text" name="name"  class="form-control" placeholder="Entrer Le Nom de produit">
                </div>
                <div class="form-groupe">
                    <label >Prix de produit</label>
                    <input type="Number" name="price" class="form-control" placeholder="Entrer Le Prix de produit">
                </div>

                <div class="form-groupe">
                    <label >Quantity de produit</label>
                    <input type="Number" name="quantity" class="form-control" placeholder="Entrer La quantity de produit">
                </div>
                <div class="form-groupe">
                    <label >Categorie de produit</label>
                    <input type="text" name="categorie" class="form-control" placeholder="Entrer La Categorie de produit">
                </div>
                <div class="form-groupe">
                    <label >Description de produit</label>
                    <input type="text" name="description" class="form-control" placeholder="Entrer La description de produit">
                </div>

                <label > Image</label>
                <div class="input-groupe">
                    <div class="custom-file">
                        <input type="file"  name="photo" class="custom-file-input" placeholder="Entrer La Photo de produit">
                        <label  class="custom-file-label" >Choisir une photo</label>
                    </div>
                </div>
                <br>
                <button type="submit" name="submit" class="btn btn-primary">Envoyer la demande </button>
            </div>

        </form>
    </div>
</body>
</html>
-->