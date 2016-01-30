<!DOCTYPE html>
<html>
	<head>
		<title> Tailoring System </title>
		<meta name = "viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

		{{ HTML::style('css/materialize.min.css') }}
   		
	</head>

	<body>
		<!-- Dropdown Structure -->
			
<div class="ui menu">
  <a class="item">
    Home
  </a>
  <div class="ui pointing dropdown link item">
    <span class="text">Shopping</span>
    <i class="dropdown icon"></i>
    <div class="menu">
      <div class="header">Categories</div>
      <div class="item">
        <i class="dropdown icon"></i>
        <span class="text">Clothing</span>
        <div class="menu">
          <div class="header">Mens</div>
          <div class="item">Shirts</div>
          <div class="item">Pants</div>
          <div class="item">Jeans</div>
          <div class="item">Shoes</div>
          <div class="divider"></div>
          <div class="header">Womens</div>
          <div class="item">Dresses</div>
          <div class="item">Shoes</div>
          <div class="item">Bags</div>
        </div>
      </div>
      <div class="item">Home Goods</div>
      <div class="item">Bedroom</div>
      <div class="divider"></div>
      <div class="header">Order</div>
      <div class="item">Status</div>
      <div class="item">Cancellations</div>
    </div>
  </div>
  <a class="item">
    Forums
  </a>
  <a class="item">
    Contact Us
  </a>
</div>




	</body>

</html>


