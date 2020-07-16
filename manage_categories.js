$(document).ready(function(){
	var DOMAIN ="http://localhost/projects/inv_man";

//manage category
	manageCategory(1);
	function manageCategory(pn){
		$.ajax({
			url : "process.php",
			method : "POST",
			data : {manageCategory:1,pageno:pn},
			success : function(data){
				$("#get_category").html(data);
			}
		})	
	}
	
	$("body").delegate(".page-link","click",function(){
		var pn = $(this).attr("pn");
		manageCategory(pn);
	})
	
	$("body").delegate(".del_cat","click",function(){
		var did = $(this).attr("did");
		if(confirm("Are you sure? You want to delete..!")){
			$.ajax({
				url : "process.php",
				method : "POST",
				data : {deleteCategory:1,id:did},
				success : function(data){
					if(data == "CATEGORY_DELETED"){
						alert("Category Deleted Successfully..!");
						manageCategory(1);	
					}else if(data == "DEPENDENT_CATEGORY"){
						alert("Sorry! This category is dependent on other sub categories..");
					}else if(data == "DELETED"){
						alert("Deleted Successfully..");
					}else{
						alert(data);
					}
				}
			})
		}else{
		
		}  
	})
	
	//fetch_category
	fetch_category();
	function fetch_category(){
		$.ajax({
			url : "process.php",
			method : "POST",
			data : {getCategory:1},
			success : function(data){
				var root= "<option>Root</option>";
				$("#parent_cat").html( root + data);
				var choose = "<option>Choose</option>"; 
				$("#select_cat").html(choose + data);
	
			}
		})
	}
	
	
	//fetch_brand
	fetch_brand();
	function fetch_brand(){
		$.ajax({
			url : "process.php",
			method : "POST",
			data : {getBrand:1},
			success : function(data){
			$("#select_brand").html(data);					
			}
		})
	}
	
	
	$("body").delegate(".edit_cat","click",function(){
		var eid = $(this).attr("eid");
		var modal = document.getElementById("myModal");
		var span = document.getElementsByClassName("close")[0];
		modal.style.display = "block";
		span.onclick = function() {
		  modal.style.display = "none";
		}
		$.ajax({
			url : "process.php",
			method : "POST",
			dataType : "json",
			data : {updateCategory:1,id:eid},
			success : function(data){
				console.log(data);
				$("#cid").val(data["cid"]);
				$("#update_category").val(data["category_name"]);
				$("#parent_cat").val(data["parent_cat"]);
			}
		})
	})
	
	//Update Category
	$("#update_category_form").on("submit",function(){
		if($("#update_category").val() == ""){
			$("#update_category").addClass("border-danger");
			$("#cat-error").html("<span class='text-danger'>Please Enter Category Name</span>");
		}else{
			$.ajax({
				url : "process.php",
				method : "POST",
				data : $("#update_category_form").serialize(),
				success : function(data){
					window.location.href = "";
				}
			})
		}
	})
	
	
	//------------------------------for Brands------------------------------
	
	//manage brand
	manageBrand(1);
	function manageBrand(pn){
		$.ajax({
			url : "process.php",
			method : "POST",
			data : {manageBrand:1,pageno:pn},
			success : function(data){
				$("#get_brand").html(data);
			}
		})	
	}
	
	
	$("body").delegate(".page-link","click",function(){
		var pn = $(this).attr("pn");
		manageBrand(pn);
	})
	
	$("body").delegate(".del_brand","click",function(){
		var did = $(this).attr("did");
		if(confirm("Are you sure? You want to delete..!")){
			$.ajax({
				url : "process.php",
				method : "POST",
				data : {deleteBrand:1,id:did},
				success : function(data){
					if(data == "DELETED"){
						alert("Brand Deleted Successfully..!");
						manageBrand(1);
					}else{
						alert(data);
					}
				}
			})
		}
	})
	
	$("body").delegate(".edit_brand","click",function(){
		var eid = $(this).attr("eid");
		var modal = document.getElementById("myModal");
		var span = document.getElementsByClassName("close")[0];
		modal.style.display = "block";
		span.onclick = function() {
		  modal.style.display = "none";
		}
		$.ajax({
			url : "process.php",
			method : "POST",
			dataType : "json",
			data : {updateCategory:1,id:eid},
			success : function(data){
				console.log(data);
				$("#bid").val(data["cid"]);
				$("#update_brand").val(data["category_name"]);
			}
		})
	})
	
	//Update Category
	$("#update_brand_form").on("submit",function(){
		if($("#update_brand").val() == ""){
			$("#update_brand").addClass("border-danger");
			$("#brand-error").html("<span class='text-danger'>Please Enter Brand Name</span>");
		}else{
			$.ajax({
				url : "process.php",
				method : "POST",
				data : $("#update_brand_form").serialize(),
				success : function(data){
					alert(data);
					window.location.href = "";
				}
			})
		}
	})
	
	//------------------------------Products------------------------------
	
	//manage products
	manageProduct(1);
	function manageProduct(pn){
		$.ajax({
			url : "process.php",
			method : "POST",
			data : {manageProduct:1,pageno:pn},
			success : function(data){
				$("#get_product").html(data);
			}
		})	
	}
	
	
	$("body").delegate(".page-link","click",function(){
		var pn = $(this).attr("pn");
		manageProduct(pn);
	})
	
	$("body").delegate(".del_product","click",function(){
		var did = $(this).attr("did");
		if(confirm("Are you sure? You want to delete..!")){
			$.ajax({
				url : "process.php",
				method : "POST",
				data : {deleteProduct:1,id:did},
				success : function(data){
					if(data == "DELETED"){
						alert("Product Deleted Successfully..!");
						manageProduct(1);
					}else{
						alert(data);
					}
				}
			})
		}
	})
	
	
	$("body").delegate(".edit_product","click",function(){
		var eid = $(this).attr("eid");
		var modal = document.getElementById("myModal");
		var span = document.getElementsByClassName("close")[0];
		modal.style.display = "block";
		span.onclick = function() {
		  modal.style.display = "none";
		}
		$.ajax({
			url : "process.php",
			method : "POST",
			dataType : "json",
			data : {updateProduct:1,id:eid},
			success : function(data){
				console.log(data);
				$("#pid").val(data["pid"]);
				$("#update_product").val(data["product_name"]);
				$("#select_cat").val(data["cid"]);
				$("#select_brand").val(data["bid"]);
				$("#product_price").val(data["product_price"]);
				$("#product_qty").val(data["product_stock"]);				
			}
		})
	})
	
	//Update Category
	$("#update_product_form").on("submit",function(){
		if($("#update_product").val() == ""){
			$("#update_product").addClass("border-danger");
			$("#product-error").html("<span class='text-danger'>Please Enter Brand Name</span>");
		}else{
			$.ajax({
				url : "process.php",
				method : "POST",
				data : $("#update_product_form").serialize(),
				success : function(data){
					if(data == "UPDATED"){
						alert("Product Updated Successfully..!");
						window.location.href = "";
					}else{
						alert(data);
					}	
				}
			})
		}
	})
	

	
})


