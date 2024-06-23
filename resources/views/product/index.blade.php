<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Products Route</title>
</head>
<body>
    <h1>Product</h1>

    @if (session()->has('success'))
        <p>
            {{session('success')}}
        </p>
    @endif
    <a href="{{route('product.create')}}">Add a new Product</a>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Qty</th>
            <th>Price</th>
            <th>Description</th>
            <th>Created at</th>
            <th>Updated at</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        @foreach($products as $product )
        <tr>
            <td>{{$product->id}}</td>
            <td>{{$product->name}}</td>
            <td>{{$product->qty}}</td>
            <td>{{$product->price}}</td>
            <td>{{$product->description}}</td>
            <td>{{$product->created_at}}</td>
            <td>{{$product->updated_at}}</td>
            <td>
                <a href="{{route('product.edit', ['product' => $product])}}">Edit this product</a>
            </td>
            <td>
                <form action="{{route('product.destroy', ['product' => $product])}}" method="post">
                    @csrf
                    @method('delete')
                    <input type="submit" value="Delete Product" />
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>