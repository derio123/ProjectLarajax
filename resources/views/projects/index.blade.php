@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb top">
            <div class="float-left">
                <h2>
                    <marquee behavior="" direction="right">Laravel 8 CRUD </marquee>
                </h2>
                
            </div>

            @include('layouts.search')

            @if ($message = Session::get('sucess'))
                <div class="alert alert-success text-center" style="width:30px top:20px">
                    <p>{{ $message }}</p>
                </div>
            @endif

            @include('layouts.table')

            <!-- small modal -->

            @include('layouts.modals.smallModal')

            @include('layouts.modals.mediumModal')

            @include('layouts.modals.modalDelete')
        </div>
    </div>

    <script>
        //$('.alert').alert()
        $(document).on('click', '#smallButton', function(event) {
            event.preventDefault();
            let href = $(this).attr('data-attr');
            console.log(href);
            $.ajax({
                url: href,
                beforeSend: function() {
                    $('#loader').show();
                },

                success: function(result) {
                    $("#smallModal").modal("show");
                    $("#smallBody").html(result).show();
                    console.log(result);
                },

                complete: function() {
                    $("#loader").hide();
                },

                error: function(jqXHR, testStatus, error) {
                    console.log(error);
                    alert("Modal" + href + "Não pode abri" + error);
                    $("#loader").hide();
                },

                timeout: 5000
            });
        });

        $(document).on('click', '#deleteButton', function(event) {
            event.preventDefault();
            let href = $(this).attr('data-attr');
            console.log(href);
            $.ajax({
                url: href,
                beforeSend: function() {
                    $("#loader").show();
                },
                
                success: function(result) {
                    $("#deleteModal").modal("show");
                    $("#deleteBody").html(result).show();
                    console.log(result);
                },

                complete: function() {
                    $("#loader").hide();
                },

                error: function(jqXHR, testStatus, error) {
                    console.log(error);
                    alert("Modal" + href + "Não pode abri" + error);
                    $("#loader").hide();
                },

                timeout: 5000
            });
        });


        $(document).on('click', '#mediumButton', function(event) {
            event.preventDefault();
            let href = $(this).attr('data-attr');
            console.log(href);
            $.ajax({
                url: href,
                beforeSend: function() {
                    $('#loader').show();
                },
                success: function(response) {
                    $('#mediumModal').modal("show");
                    $('#mediumBody').html(response).show();
                },

                complete: function() {
                    $('#loader').hide();
                },

                error: function(jqXHR, testStatus, error) {
                    console.log(error);
                    alert("Modal" + href + "Não pode abri" + error);
                    $('#loader').hide();
                },

                timeout: 5000
            });
        });

    </script>
@endsection
