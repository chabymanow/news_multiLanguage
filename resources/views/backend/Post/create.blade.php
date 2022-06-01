@extends('admin.admin_master')
@section('admin')

<div class="content-wrapper">
<div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body" style="background: #1f1f1f; color: #FEFEFE;">
                    <h4 class="card-title">Add new post</h4>

 <form class="forms-sample" action="{{ route('add.post') }}" method="post" enctype="multipart/form-data">
  @csrf

    <div class="row">

    <div class="form-group col-md-6">
      <label for="exampleInputName1">Title English</label>
      <input type="text" class="form-control" id="exampleInputName1" name="title_en">
    </div>
    @error('title_en')
        <span class="text-danger">{{ $message }}</span>
    @enderror

     <div class="form-group col-md-6">
      <label for="exampleInputName1">Title Hungarian</label>
      <input type="text" class="form-control" id="exampleInputName1" name="title_hun">
    </div>
    @error('title_hun')
        <span class="text-danger">{{ $message }}</span>
    @enderror

  </div> <!-- End Row  -->
<div class="row">

    <div class="form-group col-md-6">
      <label for="exampleInputName1">Category</label>
       <select class="form-control" id="exampleSelectGender" name="category_id">
            <option disabled="" selected="">--Select Category--</option>
                    @foreach($categories as $row)
                        <option value="{{ $row->id }}">{{ $row->category_en  }} | {{ $row->category_hun  }}</option>
                    @endforeach
        </select>
    </div>
    @error('category_id')
    <span class="text-danger">{{ $message }}</span>
@enderror

     <div class="form-group col-md-6">
      <label for="exampleInputName1">SubCategory</label>
    <select class="form-control" name="subcategory_id" id="subcategory_id">
        <option disabled="" selected="">--Select SubCategory--</option>
        @foreach($subcategories as $row)
             <option value="{{ $row->id }}">{{ $row->subcategory_en  }} | {{ $row->subcategory_hun  }}</option>
        @endforeach
    </select>
    </div>
    @error('subcategory_id')
    <span class="text-danger">{{ $message }}</span>
@enderror

  </div> <!-- End Row  -->

 <div class="row">

    <div class="form-group col-md-6">
      <label for="exampleInputName1">District</label>
       <select class="form-control" id="exampleSelectGender" name="district_id">
            <option disabled="" selected="">--Select District--</option>
            @foreach($districts as $row)
                <option value="{{ $row->id }}">{{ $row->district_en  }} | {{ $row-> district_hun  }}</option>
            @endforeach
        </select>
    </div>
    @error('district_id')
        <span class="text-danger">{{ $message }}</span>
    @enderror

     <div class="form-group col-md-6">
      <label for="exampleInputName1">SubDistrict</label>
      <select class="form-control" id="subdistrict_id" name="subdistrict_id">
            <option disabled="" selected="">--Select Subdistrict--</option>
                @foreach($subdistricts as $row)
                    <option value="{{ $row->id }}">{{ $row->subdistrict_en  }} | {{ $row-> subdistrict_hun  }}</option>
                @endforeach
            </option>
        </select>
    </div>
    @error('subdistrict_id')
        <span class="text-danger">{{ $message }}</span>
    @enderror

  </div> <!-- End Row  -->


<div class="form-group">
    <label for="exampleFormControlFile1">News Image Upload </label>
    <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
  </div>
  @error('image')
  <span class="text-danger">{{ $message }}</span>
@enderror


<div class="row">

    <div class="form-group col-md-6">
      <label for="exampleInputName1">Tags English</label>
      <input type="text" class="form-control" id="exampleInputName1" name="tags_en">
    </div>
    @error('tags_en')
    <span class="text-danger">{{ $message }}</span>
@enderror

     <div class="form-group col-md-6">
      <label for="exampleInputName1">Tags Hungarian</label>
      <input type="text" class="form-control" id="exampleInputName1" name="tags_hun">
    </div>
    @error('tags_hun')
    <span class="text-danger">{{ $message }}</span>
@enderror

  </div> <!-- End Row  -->


    <div class="form-group">
        <label for="exampleTextarea1">Details English</label>
        <textarea class="form-control editor" name="details_en" id="summernote_en"></textarea>
    </div>
    @error('details_en')
    <span class="text-danger">{{ $message }}</span>
    @enderror


    <div class="form-group">
        <label for="exampleTextarea1">Details hungarian</label>
        <textarea class="form-control editor" name="details_hun" id="summernote_hun"></textarea>
    </div>
    @error('details_hun')
        <span class="text-danger">{{ $message }}</span>
    @enderror


<hr>
<h4 class="text-center">Extra Opions </h4>
<br>

<div class="row d-flex justify-content-around px-5">
   <label class="form-check-label col">
   <input type="checkbox" name="headline" class="form-check-input" value="1"> Headline <i class="input-helper"></i></label>

    <label class="form-check-label col">
   <input type="checkbox" name="first_section" class="form-check-input" value="1">First Section <i class="input-helper"></i></label>

    <label class="form-check-label col">
   <input type="checkbox" name="first_section_thumbnail" class="form-check-input" value="1">First Section BigThumbnail <i class="input-helper"></i></label>

   <label class="form-check-label col">
    <input type="checkbox" name="bigthumbnail" class="form-check-input" value="1">General Big Thhumbnail <i class="input-helper"></i></label>

</div> <!-- End Row  -->
<br><br>

    <button type="submit" class="btn btn-primary mr-2">Submit</button>

                    </form>
                  </div>
                </div>
              </div>

<!-- This is for Category  -->
 <script type="text/javascript">
    $(document).ready(function() {

          $('select[name="category_id"]').on('change', function(){
              var category_id = $(this).val();
              if(category_id) {
                  $.ajax({
                      url: "{{  url('/get/subcategory/') }}/"+category_id,
                      type:"GET",
                      dataType:"json",

                      success:function(data) {
                         $("#subcategory_id").empty();
                               $.each(data,function(key,value){
                                   $("#subcategory_id").append('<option value="'+value.id+'">'+value.subcategory_en+'</option>');
                               });
                      },

                  });
              } else {
                  alert('danger');
              }
          });
      });
 </script>

{{-- This is for Category --}}
<script type="text/javascript">
   $(document).ready(function() {

         $('select[name="district_id"]').on('change', function(){
             var district_id = $(this).val();
             if(district_id) {
                 $.ajax({
                     url: "{{  url('/get/subdistrict/') }}/"+district_id,
                     type:"GET",
                     dataType:"json",

                     success:function(data) {
                        $("#subdistrict_id").empty();
                              $.each(data,function(key,value){
                                  $("#subdistrict_id").append('<option value="'+value.id+'">'+value.subdistrict_en+'</option>');
                              });
                     },

                 });
             } else {
                 alert('danger');
             }
         });
     });
</script>
@endsection
