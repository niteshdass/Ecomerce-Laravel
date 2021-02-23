@extends('admin_layout')

@section('admin_content')


			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Manufacture</a></li>
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
						<h2><i class="halflings-icon user"></i><span class="break"></span>Members</h2>
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
								  <th>Manufacture Id</th>
								  <th>Manufacture Name</th>
								  <th>Description</th>
								  <th>Status</th>
								  <th>Actions</th>
							  </tr>
						  </thead>
						  @foreach($all_category_info as $cat)   
						  <tbody>
							<tr>
								<td>{{$cat->manufacture_id}}</td>
								<td class="center">{{$cat->manufacture_name}}</td>
								<td class="center">{{$cat->manufacture_description}}</td>
								<td class="center">
									@if($cat->publication_status==1)
										<span class="label label-success">Active</span>
									@else
										<span class="label label-dengar">UnActive</span>
									@endif
								</td>
								<td class="center">
									@if($cat->publication_status==1)
									<a class="btn btn-dengar" href="{{URL::to('/unactive_menufacture/'.$cat->manufacture_id)}}">
										<i class="halflings-icon white thumbs-down"></i>  
									</a>
									@else
										<a class="btn btn-success" href="{{URL::to('/active_menufacture/'.$cat->manufacture_id)}}">
											<i class="halflings-icon white thumbs-up"></i>  
										</a>

									@endif
									<a class="btn btn-info" href="{{URL::to('/edit_manufacture/'.$cat->manufacture_id)}}">
										<i class="halflings-icon white edit"></i>  
									</a>
									<a class="btn btn-danger" href="{{URL::to('/delete_manufacture/'.$cat->manufacture_id)}}">
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