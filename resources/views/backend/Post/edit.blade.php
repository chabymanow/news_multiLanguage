@extends('admin.admin_master')
@section('admin')

<div class="content-wrapper">
<div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body" style="background: #1f1f1f; color: #FEFEFE;">
                    <h4 class="card-title">Edit post</h4>

 <form class="forms-sample" action="{{ route('update.post', $post->id) }}" method="post" enctype="multipart/form-data">
  @csrf

    <div class="row">

    <div class="form-group col-md-6">
      <label for="exampleInputName1">Title English</label>
      <input type="text" class="form-control" id="exampleInputName1" name="title_en" value="{{ $post->title_en }}">
    </div>
    @error('title_en')
        <span class="text-danger">{{ $message }}</span>
    @enderror

     <div class="form-group col-md-6">
      <label for="exampleInputName1">Title Hungarian</label>
      <input type="text" class="form-control" id="exampleInputName1" name="title_hun" value="{{ $post->title_hun }}">
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
                        <option value="{{ $row->id }}"
                            <?php if ($row->id == $post->category_id){
                                echo "selected";
                            } ?>
                        >{{ $row->category_en  }} | {{ $row->category_hun  }}</option>
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
             <option value="{{ $row->id }}"
                <?php if ($row->id == $post->subcategory_id){
                    echo "selected";
                } ?>
                >{{ $row->subcategory_en  }} | {{ $row->subcategory_hun  }}</option>
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
                <option value="{{ $row->id }}"
                    <?php if ($row->id == $post->district_id){
                        echo "selected";
                    } ?>
                    >{{ $row->district_en  }} | {{ $row-> district_hun  }}</option>
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
                    <option value="{{ $row->id }}"
                        <?php if ($row->id == $post->subdistrict_id){
                            echo "selected";
                        } ?>
                    >{{ $row->subdistrict_en  }} | {{ $row-> subdistrict_hun  }}</option>
                @endforeach
            </option>
        </select>
    </div>
    @error('subdistrict_id')
        <span class="text-danger">{{ $message }}</span>
    @enderror

  </div> <!-- End Row  -->

  <div class="row">

    <div class="form-group col-md-6">
        <label for="exampleFormControlFile1">News Image Upload </label>
        <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
    </div>
    @error('image')
    <span class="text-danger">{{ $message }}</span>
    @enderror

    <div class="form-group col-md-4">
        <label for="exampleFormControlFile1">Current image: </label>
        <img value="{{ asset($post-> image) }}" src="{{ asset($post-> image) }}" alt="Current image" style="margin: 0 auto; width: 40vw; max-width: 400px; box-shadow: 10px 10px 10px rgba(0, 0, 0, 0.5); border: 1px solid rgba(255, 255, 255, .3); border-radius: 10px;">
        <input type="hidden" value="{{ asset($post-> image) }}" name="oldimage">
    </div>
</div>


<div class="row">

    <div class="form-group col-md-6">
      <label for="exampleInputName1">Tags English</label>
      <input type="text" class="form-control" id="exampleInputName1" name="tags_en" value="{{ $post->tags_en }}">
    </div>
    @error('tags_en')
    <span class="text-danger">{{ $message }}</span>
@enderror

     <div class="form-group col-md-6">
      <label for="exampleInputName1">Tags Hungarian</label>
      <input type="text" class="form-control" id="exampleInputName1" name="tags_hun" value="{{ $post->tags_hun }}">
    </div>
    @error('tags_hun')
    <span class="text-danger">{{ $message }}</span>
@enderror

  </div> <!-- End Row  -->


    <div class="form-group">
        <label for="exampleTextarea1">Details English</label>
        <textarea class="form-control editor" name="details_en" id="summernote_en" style="width: 40vw; max-width: 400px;"">
            {{ $post->details_en }}
        </textarea>
    </div>
    @error('details_en')
    <span class="text-danger">{{ $message }}</span>
    @enderror


    <div class="form-group">
        <label for="exampleTextarea1">Details hungarian</label>
        <textarea class="form-control editor" name="details_hun" id="summernote_hun" style="width: 40vw; max-width: 400px;"">
            {{ $post->details_hun }}
        </textarea>
    </div>
    @error('details_hun')
        <span class="text-danger">{{ $message }}</span>
    @enderror


<hr>
<h4 class="text-center">Extra Opions </h4>
<br>

<div class="row d-flex justify-content-around px-5">
   <label class="form-check-label col">
   <input type="checkbox" name="headline" class="form-check-input" value="1"
   <?php if($post->headline == 1){
       echo "checked";
   }
   ?>
   > Headline <i class="input-helper"></i></label>

    <label class="form-check-label col">
   <input type="checkbox" name="first_section" class="form-check-input" value="1"
   <?php if($post->first_section == 1){
        echo "checked";
    }
    ?>
   >First Section <i class="input-helper"></i></label>

    <label class="form-check-label col">
   <input type="checkbox" name="first_section_thumbnail" class="form-check-input" value="1"
   <?php if($post-> 	first_section_thumbnail == 1){
        echo "checked";
    }
    ?>
   >First Section BigThumbnail <i class="input-helper"></i></label>

   <label class="form-check-label col">
    <input type="checkbox" name="bigthumbnail" class="form-check-input" value="1"
    <?php if($post->bigthumbnail == 1){
        echo "checked";
    }
    ?>
    >General Big Thhumbnail <i class="input-helper"></i></label>

</div> <!-- End Row  -->
<br><br>

    <button type="submit" class="btn btn-primary mr-2">Update post</button>

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
