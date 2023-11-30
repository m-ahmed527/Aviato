@extends('layouts.admin')
@section('content')
@section('page-name')
    Products Variants
@endsection

<section class="content">
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-12">

                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Quick Example</h3>
                    </div>


                    <form action="{{ route('admin.products.variants.store') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group variant-grp">
                                        <label for="exampleInputEmail1">Name</label>
                                        <input type="text" class="form-control variant" name="name[]"
                                            id="exampleInputEmail1" placeholder="Enter Product Name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <button class="btn btn-primary add-variant"> + </button>
                                </div>
                                <div class="col-md-6">
                                    <button class="btn btn-primary delete-button"> - </button>
                                </div>

                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>

    </div>
</section>

@endsection

@push('script')
<script>
    $(document).ready(function() {
        // console.log(123);
        $(".add-variant").on("click", function(e) {
            e.preventDefault();
            let parentElem = $(".variant").closest(".variant-grp");
            let cloned = $(".variant:first").clone().appendTo(parentElem);
            cloned.val('')
        })
        $(".delete-button").on("click" , function(e) {
            e.preventDefault();
            let parentElem = $(".variant-grp").children(".variant").last();
            console.log(parentElem)
            // let a = parentElem.closest("input[name='name[]']").remove();
            let a = parentElem.closest(".variant").remove();
        });

    })
</script>
@endpush
