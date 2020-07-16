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
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">
	 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<script type="text/javascript" rel="stylesheet" src="order.js"></script>
</head>


<body>
	<header>
		<div class="left_area">
			<h1>Inventory  <span>Stocks</span></h1>
		</div>
			
			<a href="Admin.html">
				<i class="fa fa-home" aria-hidden="true"></i>
				<span>Home</span>
			</a>
		
	</header>
	
	<div class="contains">
		<div class="row">
			<div class="col-md-10 mx-auto">
				<div class="card" style="box-shadow:0 0 25px 0 lightgrey;">
				  <div class="card-header">
					<h4>New Orders</h4>
				  </div>
				  <div class="card-body">
					<form id="get_order_data" onsubmit="return false">
						<div class="form-group row">
							<label class="col-sm-3" align="right">Order Date</label>
								<div class="col-6">
									<input type="text" id="order_date" name="order_date" value="<?php echo date("Y-d-m"); ?>" class="form-control" readonly>				  
								</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-3" align="right">Customer Name</label>
								<div class="col-sm-6">
									<input type="text" id="cust_name" name="cust_name" class="form-control" placeholder="Enter Customer name.." required>				  
								</div>
						</div>
						<div class="card" style="box-shadow:0 0 25px 0 lightgrey;">
							<div class="card-body">
								<h3 style="background:#fff;float:left;text-decoration:bold;">Make a Order list.</h3>
								<br/>
								<table style="width:800px;">
								  <thead>
									<tr>
									  <th>#</th>
									  <th style="text-align:center;">Item Name</th>
									  <th style="text-align:center;">Total Quantity</th>
									  <th style="text-align:center;">Quantity</th>
									  <th style="text-align:center;">Price</th>
									  <th></th>
									  <th style="padding:10px">Total</th>
									</tr>
								  </thead>
								  <tbody id="invoice_item">
							<!--		<tr>
									  <td><b id="number">1</b></td>
									  <td>
										<select name="pid[]" class="form-control" required>
											<option>Washing Machine</option>
										</select>
									  </td>
									  <td><input name="tqty[]" readonly type="text" class="form-control form-control-sm"></td>
									  <td><input name="qty[]" readonly type="text" class="form-control form-control-sm" required></td>									  
									  <td><input name="price[]" type="text" class="form-control form-control-sm" readonly></td>
									  
									  <td>Rs. 1540</td>
									</tr> -->
								  </tbody>
								</table>
								<center style="padding:10px;">
									<button id="add" style="width:150px;" class="btn btn-success">Add</button>
									<button id="remove" style="width:150px;" class="btn btn-danger">Remove</button>
								</center>
							</div>					
						</div>
						
						<div class="form-group row">
							<label for="sub_total" class="col-sm-3 col-form-label" align="right">Sub Total</label>
							<div class="col-sm-6">
							  <input type="text" name="sub_total" class="form-control form-control-sm" id="sub_total" required readonly>
							</div>
						</div>
						
						<div class="form-group row">
							<label for="gst" class="col-sm-3 col-form-label" align="right">GST (18%)</label>
							<div class="col-sm-6">
							  <input type="text" class="form-control form-control-sm" readonly name="gst" id="gst" required>
							</div>
						</div>
						
						<div class="form-group row">
							<label for="discount" class="col-sm-3 col-form-label" align="right">Discount</label>
							<div class="col-sm-6">
							  <input type="text" class="form-control form-control-sm" name="discount" id="discount">
							</div>
						</div>
						
						<div class="form-group row">
							<label for="net_total" class="col-sm-3 col-form-label" align="right">Net Total</label>
							<div class="col-sm-6">
							  <input type="text" readonly class="form-control" id="net_total" name="net_total" required>
							</div>
						</div>						
						
						<div class="form-group row">
							<label for="paid" class="col-sm-3 col-form-label" align="right">Paid</label>
							<div class="col-sm-6">
							  <input type="text" class="form-control" id="paid" name="paid" required>
							</div>
						</div>						
						
						<div class="form-group row">
							<label for="due" class="col-sm-3 col-form-label" align="right">Due</label>
							<div class="col-sm-6">
							  <input type="text" readonly class="form-control" id="due" name="due" required>
							</div>
						</div>						
						
						
						<div class="form-group row">
							<label for="payment_type" class="col-sm-3 col-form-label" align="right">Payment Method</label>
							<div class="col-sm-6">
								<select class="form-control form-control-sm" id="payment_type" name="payment_type" required>
									<option>CASH</option>
									<option>CARD</option>
									<option>DRAFT</option>
									<option>CHEQUE</option>
								</select>
							</div>
						</div>
						
						<center>
							<input type="submit" id="order_form" name="order_form" style="width:150px;" class="btn btn-info" value="Order">
							<input type="submit" id="print_invoice" style="width:150px;" class="btn btn-success d-none" value="Print Invoice">
						</center>
						
						
					</form>
				  </div>
				</div>
			</div>
		</div>
	</div>

	
</body>
</html>

