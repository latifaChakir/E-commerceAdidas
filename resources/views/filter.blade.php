<div class="row">
      @foreach ($products as $product)
		<div class="col-6 col-sm-6 col-md-6 mb-4 col-lg-4">
		<div class="product-item">
			<a href="shop-single.html" class="product-img">
			<div class="label new top-right">
				<div class='content'>New</div>
					
            </div>
			<img src="img/{{ $product->image_path }}" alt="Image" class="img-fluid">
			</a>
			<h3 class="title"><a href="#">{{ $product->name}}</a></h3>
			<div class="price">
			<span>{{ $product->prix}}$</span>
			</div>
            <button btn btn-succes>BUY</button>
			</div>
                   
		</div>
    @endforeach
</div>
		