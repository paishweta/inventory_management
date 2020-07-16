<!DOCTYPE html>
<html>
<link href='style.css' rel='stylesheet'>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
	<title>Inventory Management</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">
	 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<script type="text/javascript" rel="stylesheet" src="manage_categories.js"></script>
	
</head>


<body>
	<header>
		<div class="left_area">
			<h1>Inventory  <span>Stocks</span></h1>
		</div>
		<div class="home">
			<a href="Admin.html"><i class="fa fa-home" aria-hidden="true"></i><span>Home</span></a>
		</div>	
	</header>
	
	<div class="container">
		<table class="table table-hover table-bordered">
			<thead>
			  <tr>
				<th>#</th>
				<th>Product</th>
				<th>Category</th>
				<th>Brand</th>
				<th>Price</th>
				<th>Stock</th>
				<th>Added Date</th>		
				<th>Status</th>
				<th>Action</th>
			  </tr>
			</thead>
			<tbody id="get_product">
			</tbody>
		</table>
	</div>
	
	 <div id="myModal" class="modal">
		<div class="modal-ca3">
			<span class="close">&times;</span>
			<p>Product List</p>
			<hr>
			<form id="update_product_form" name="update_product_form" onsubmit="return false">
			  <div class="form-row">
				<div class="form-group col-md-6">
				<input type="hidden" name="pid" id="pid" value=""/> 
				 <label>Date</label>
					<input type="text" value="<?php echo date("Y-m-d"); ?>" class="form-control" id="date" name="added_date" readonly>				  
					
				</div>
				<div class="form-group col-md-6">
				  <label>Product Name</label>
				  <input type="text" class="form-control" placeholder="Enter Product name"  id="update_product" name="update_product" required>
				</div>
				<div class="form-group col-md-6">
				  <label>Category</label>
					<select  name="select_cat" id="select_cat"  class="form-control" required>
					
					</select>
				</div>
				<div class="form-group col-md-6">
				  <label>Brand</label>
					<select  name="select_brand" id="select_brand"  class="form-control" required>
				
					</select>
				</div>
			  </div>
			  <div class="form-group">
				<label>Product Price</label>
				<input type="text" class="form-control" placeholder="Enter product price.. RS " id="product_price" name="product_price" placeholder="Products value" required>
			  </div>
			  <div class="form-group">
				<label>Quantity</label>
				<input type="text" class="form-control"  id="product_qty" name="product_qty" placeholder="Enter Quantity" required>
			  </div>
			  <button type="submit" class="btn btn-success">Update product</button>
			</form>				
		</div>
    </div>
			
	
	
	
</body>
</html>

