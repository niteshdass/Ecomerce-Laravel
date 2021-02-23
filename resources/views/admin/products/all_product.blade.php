@extends('admin_layout')

@section('admin_content')


			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Tables</a></li>
			</ul>
			<?php
							$messege=Session::get('messege');

							if($messege){
								echo $messege;
								Session::put('messege',NULL);
							}


						?>

			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>Products</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
							  	  <th>P Id</th>
								  <th>Name</th>
								  <th>C Id</th>
								  <th>M Id</th>
								  <th>S Desc</th>
								  <th>Price</th>
								  <th>Image</th>
								  <th>Sige</th>
								  <th>Color</th>
								  <th>Status</th>
								  <th>Active</th>
								  
								 
							  </tr>
						  </thead>
						  @foreach($all_product_info as $cat)   
						  <tbody>
							<tr>
								<td>{{$cat->product_id}}</td>
								<td class="center">{{$cat->product_name}}</td>
								<td class="center">{{$cat->category_name}}</td>
								<td class="center">{{$cat->manufacture_name}}</td>
								<td class="center"><textarea cols="3" rows="4">{{$cat->product_short_description}}</textarea></td>
								<td class="center">{{$cat->product_price}}</td>

								<td class="center"><img width="60" height="80" src="{{URL::to($cat->product_image)}}"></td>

								<td class="center">{{$cat->product_size}}</td>
								<td class="center">{{$cat->product_color}}</td>
								
								<td class="center">
									@if($cat->publication_status==0)
										<span class="label label-success">{{$cat->publication_status}}</span>
									@else
										<span class="label label-dengar">UnActive</span>
									@endif
								</td>
								<td class="center">
									@if($cat->publication_status==1)
									<a class="btn btn-dengar" href="{{URL::to('/unactive_cat/'.$cat->product_id)}}">
										<i class="halflings-icon white thumbs-down"></i>  
									</a>
									@else
										<a class="btn btn-success" href="{{URL::to('/active_cat/'.$cat->product_id)}}">
											<i class="halflings-icon white thumbs-up"></i>  
										</a>

									@endif
									<a class="btn btn-info" href="{{URL::to('/edit_category/'.$cat->product_id)}}">
										<i class="halflings-icon white edit"></i>  
									</a>
									<a class="btn btn-danger" href="{{URL::to('/delete_product/'.$cat->product_id)}}">
										<i class="halflings-icon white trash"></i> 
									</a>
								</td>
							</tr>
							
							
						  </tbody>
						  @endforeach
					  </table>            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->



@endsection