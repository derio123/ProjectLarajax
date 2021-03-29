@extends('layouts.app')

@section('content')

    <div class="row">
        <ul class="nav justify-content-center" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" href="#video" id="video-tab" data-toggle="tab" role="tab" aria-controls="video"
                    aria-selected="true">
                    <span class="fas fa-video fa-2x"></span>Videos
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" href="#chat" id="chat-tab" data-toggle="tab" role="tab" aria-controls="chat"
                    aria-selected="false">
                    <span class="fas fa-comment-alt fa-2x"></span>Chat
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" href="#">
                    <span class="fas fa-ellipsis-h fa-2x"></span>Outros
                </a>
            </li>
            {{-- <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </li> --}}
        </ul>
    </div>

    <div class="tab-content" id="myTabContent">
        <div id="video" class="tab-pane fade show active" role="tabpanel" aria-labelledby="video-tab">
            <a class="btn btn-success ml-2" data-toggle="modal" id="mediumButton" data-target="#mediumModal"
                data-attr="{{ route('conferences.create') }}" title="Nova conferencia">
                <i class="fas fa-plus-circle"></i>
            </a>
            @forelse ($conferences as $item)
                <ul class="list-group">
                    <li class="list-group-item" aria-current="true">
                        <aside>
                            <p><span>Sala</span>{{ $item->roomId }}</p>
                        </aside>
                        <a data-toggle="modal" id="conferenceButton" data-target="#conferenceModal"
                            data-attr="{{ route('conferences.show', $item->id) }}" title="Conferencias"
                            class="btn btn-outline-primary">
                            <span class="fas fa-video fa-1x"></span>
                        </a>
                        <a href="#" class="btn btn-outline-primary">
                            <span class="fas fa-comment fa-1x"></span>
                        </a>
                    </li>
                </ul>
            @empty
                <ul class="list-group">
                    <li class="list-group-item" aria-current="true">
                        <span>Não há salas abertas</span>
                    </li>
                </ul>
            @endforelse
        </div>

        <div id="chat" class="tab-pane fade" role="tabpanel" aria-labelledby="chat-tab">
            <ul class="list-group">
                <li class="list-group-item" aria-current="true">
                    Teste
                </li>
            </ul>
        </div>

        @include('layouts.modals.smallModal')

        @include('layouts.modals.mediumModal')

        <div class="modal fade" id="conferenceModal" tabindex="-1" role="dialog" aria-labelledby="conferenceModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="conferenceBody">
                        @include('conferences.showConferences')
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="application/javascript">
        const crud = new RTCMultiConnection();
        crud.socketURL = 'https://rtcmulticonnection.herokuapp.com:443/';

        crud.session = {
            video: true,
            audio: true
        };

        crud.sdpConstraints.mandatory = {
            OfferToReceiveAudio: true,
            OfferToReceiveVideo: true,
        }

        var videoContainer = document.getElementById('video-container');
        crud.onstream = function(event) {
            var video = event.mediaElement;

            videoContainer.appendChild(video);
        }

        $(document).on('click', '#conferenceButton', function(event) {
            event.preventDefault();
            let href = $(this).attr('data-attr');
            console.log(href);
            $.ajax({
                url: href,
                beforeSend: function() {
                    $('#loader').show();
                },

                success: function(result) {
                    $("#conferenceModal").modal("show");
                    $("#conferenceBody").html(crud.openOrJoin('predefinied-roomid')).show(result);
                    
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

                success: function(result) {
                    $("#mediumModal").modal("show");
                    $("#mediumBody").html(result).show();
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

    </script>

@endsection
