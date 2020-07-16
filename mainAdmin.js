$(document).ready(function(){
	var DOMAIN ="http://localhost/projects/inv_man";

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
				
				$("#select_cat").html(data);				
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
	
	$("#category_form").on("submit",function(){
		if($("#category_name").val() == ""){
			$("#category_name").addClass("border-danger");
			$("#cat-error").html("<span class='text-danger'>Please Enter Category Name</span>");
		}else{
			$.ajax({
				url : "process.php",
				method : "POST",
				data : $("#category_form").serialize(),
				success : function(data){
					if(data == "CATEGORY_ADDED"){
						$("#category_name").removeClass("border-success");
						$("#cat-error").html("<span class='text-success'>New Category Added Successfully..</span>");
						$("#category_name").val("");
						fetch_category();
					}else{
						alert(data);
					}
				}
			})
		}
	})
		
	$("#brand_form").on("submit", function(){
		if($("#brand_name").val() == ""){
			$("#brand_name").addClass("border-danger");
			$("#brand-error").html("<span class='text-danger'>Please Enter Brand Name</span>");
		}else{
			$.ajax({
				url : "process.php",
				method : "POST",
				data : $("#brand_form").serialize(),
				success : function(data){
					if(data == "BRAND_ADDED"){
						$("#brand_name").removeClass("border-success");
						$("#brand-error").html("<span class='text-success'>New Brand Added Successfully..</span>");
						$("#brand_name").val("");
						fetch_brand();

					}else{
						alert(data);
					}
				}
			})
		}
	})
	
	$("#product_form").on("submit",function(){
		$.ajax({
			url : "process.php",
			method : "POST",
			data : $("#product_form").serialize(),
			success : function(data){
				if(data == "NEW_PRODUCT_ADDED"){
					alert("New Product Added Successfully..!");
					$("#select_cat").val("");
					$("#select_brand").val("");
					$("#product_name").val("");
					$("#product_price").val("");
					$("#product_qty").val("");
					}else{
						console.log(data);
						alert(data);					
					}
				}
		})
	})
	
})
	
	
