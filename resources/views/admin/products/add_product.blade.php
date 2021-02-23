@extends('admin_layout')

@section('admin_content')

<div id="content" class="span10">
			
			
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a>
					<i class="icon-angle-right"></i> 
				</li>
				<li>
					<i class="icon-edit"></i>
					<a href="#">Add Products</a>
				</li>
			</ul>
			
			

			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Add Products</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" action="{{url('/save_product')}}" method="post" enctype="multipart/form-data">
							{{csrf_field()}}
							<fieldset>
							  <div class="control-group">
								<label class="control-label" for="focusedInput">Product Name</label>
								<div class="controls">
								  <input class="input-xlarge focused" id="focusedInput" type="text" name="product_name">
								</div>
							  </div>

							  <div class="control-group">
								<label class="control-label" for="selectError3">Category Id</label>
								<div class="controls">
								  <select id="selectError3" name="category_id">
									<option>--select a category--</option>
									<?php
										$category=DB::table('tbl_category')->where('publication_status',1)->get();


										foreach($category as $cat){

										

									?>
									<option value="{{$cat->category_id}}">{{$cat->category_name}}</option>

									<?php } ?>
								  </select>
								</div>
							  </div>

							  <div class="control-group">
								<label class="control-label" for="selectError3">Manufacture Id</label>
								<div class="controls">
								  <select id="selectError3" name="manufacture_id">
									<option>--select a category--</option>
									<?php
										$manu=DB::table('tbl_manufactur')->where('publication_status',1)->get();


										foreach($manu as $menu){

										

									?>
									<option value="{{$menu->manufacture_id}}">{{$menu->manufacture_name}}</option>

									<?php } ?>
								  </select>
								</div>
							  </div>

							  <div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Product short Description</label>
							  <div class="controls">
								<textarea class="cleditor" name="product_short_desc" id="textarea2" rows="3"></textarea>
							  </div>
							</div>

							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Product Long Description</label>
							  <div class="controls">
								<textarea class="cleditor" name="product_long_desc" id="textarea2" rows="3"></textarea>
							  </div>
							</div>
							  
							  <div class="control-group">
								<label class="control-label" for="focusedInput">Product Price</label>
								<div class="controls">
								  <input class="input-xlarge focused" id="focusedInput" type="text" name="product_price">
								</div>
							  </div>

							  <div class="control-group">
								<label class="control-label" for="focusedInput">Product Image</label>
								<div class="controls">
								  <input class="input-xlarge focused" id="focusedInput" type="file" name="product_image">
								</div>
							  </div>

							  <div class="control-group">
								<label class="control-label" for="focusedInput">Product Size</label>
								<div class="controls">
								  <input class="input-xlarge focused" id="focusedInput" type="text" name="product_size">
								</div>
							  </div>

							  <div class="control-group">
								<label class="control-label" for="focusedInput">Product Color</label>
								<div class="controls">
								  <input class="input-xlarge focused" id="focusedInput" type="text" name="product_color">
								</div>
							  </div>
							  
							  <div class="control-group">
								<label class="control-label" for="optionsCheckbox2">Product Publication</label>
								<div class="controls">
								  <label class="checkbox">
									<input type="checkbox" id="optionsCheckbox2" value="1" name="product_publication">
									This is a for product publication
								  </label>
								</div>
							  </div>

							  
							  <div class="form-actions">
								<button type="submit" class="btn btn-primary">Save changes</button>
								<button class="btn">Cancel</button>
							  </div>
							</fieldset>
						  </form>
					
					</div>
				</div><!--/span-->
			
			</div><!--/row-->
    

	</div><!--/.fluid-container-->
@endsection