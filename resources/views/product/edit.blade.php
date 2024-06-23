<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @if ($errors->any())
    <p>DEBUG:</p>
        {{$errors}}
    @endif
    <h1>Create a Product</h1>
    <form action="{{route('product.update', ['product' => $product])}}" method="post">
        @csrf
        @method('put')
        <div>
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="{{$product->name}}"/>
        </div>
        <div>
            <label for="qty">Qty</label>
            <input type="text" name="qty" id="qty" value="{{$product->qty}}"/>
        </div>
        <div>
            <label for="price">Price</label>
            <input type="text" name="price" id="price" value="{{$product->price}}"/>
        </div>
        <div>
            <label for="Description">Description</label>
            <input type="text" name="description" id="description" value="{{$product->description}}"/>
        </div>
        <div>
            <input type="submit" value="Update Product" />
        </div>
    </form>
</body>
</html>