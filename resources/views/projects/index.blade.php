@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb top">
            <div class="float-left">
                <h2>Laravel 8 CRUD </h2>
            </div>

            @include('layouts.search')

            @if ($message = Session::get('sucess'))
                <div class="alert alert-success text-center" style="width:30px top:20px">
                    <p>{{ $message }}</p>
                </div>
            @endif

            @include('layouts.table')

            <!-- small modal -->
            <div class="modal fade" id="smallModal" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" id="smallBody">
                            <div>
                                <!-- the result to be displayed apply here -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" id="mediumBody">
                            <div>
                                <!-- the result to be displayed apply here -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).on('click', '#smallModal', function(event) {
            event.preventDefault();
            let href = $(this).attr('data-attr');
            console.log(href);
            $.ajax({
                url: href,
                beforeSend: function() {
                    $("#loader").show();
                },
                success: function(result) {
                    $("#smallModal").modal("show");
                    $("#smallBody").html(result).show();
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
