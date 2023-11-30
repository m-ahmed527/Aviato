@extends('layouts.admin')
@section('content')
@section('page-name')
    Products Variants
@endsection

<section class="content">
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-12">

                <table>
                    
                </table>
            </div>

        </div>

    </div>
</section>

@endsection

@push('script')
<script>
    $(document).ready(function() {
        console.log(123);
        $(".add-variant").on("click", function(e) {
            e.preventDefault();
            let parentElem = $(".variant").closest(".variant-grp");
            let cloned = $(".variant:first").clone().appendTo(parentElem);
            cloned.val('')
        })
    })
</script>
@endpush
