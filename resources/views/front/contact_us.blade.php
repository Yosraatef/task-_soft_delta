@extends('front.layouts.main')
@section('content')

    <!--start top section-->
    <div class="top__section contact__bk">
        <div class="top__overlay"></div>
        <h3 class="top_title">{{__('Contact us')}}</h3>
    </div>

    <!--start contact us wrapper-->
    <div class="p__124">
        <div class="container">
            <p class="main__des mb__109">{{$page->content}}</p>
            <div class="row">
                <div class="col-12 col-lg-6">
                    <div class="map__wrapper">
                        <div class="map__overlay"></div>
                        <iframe
                            src="{{$setting->map_url}}"
                            width="100%" height="973" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="contact__info">
                        <h3 class="contact_title">{{__('Contact us')}}</h3>
                        <div class="call__us">
                            <div class="call__media">
                                <i class="fa fa-phone call__icon"></i>
                                <span class="call__number" href="#">{{$setting->phone}} - {{$setting->phone2 ?? ''}}</span>
                            </div>
                            <div class="call__media">
                                <i class="fa fa-envelope-o call__icon"></i>
                                <span class="call__email" href="#"> {{$setting->email}}</span>
                            </div>
                            <div class="call__media">
                                <i class="fa fa-map-marker call__icon"></i>
                                <span class="call__num font_light">{{$setting->address}}</span>
                            </div>
                        </div>
                        <form action="{{route('front.contact')}}" method='post' id="addForm" class="contact__form">
                            @csrf
                            <h3 class="contact_title">{{__('Write to us')}}</h3>
                            <div class="form_group">
                                <img src="{{asset('front/img/user.png')}}" alt="" class="form__icon">
                                <input type="text" name="name" class="form-control" id="input_name" placeholder="{{__('Full name')}}">
                                <label id="contact_name" class="error_sms"></label>
                            </div>

                            <div class="form_group">
                                <img src="{{asset('front/img/msg.png')}}" alt="" class="form__icon">
                                <input type="email" name="email" class="form-control mb-0" id="input_email" placeholder="{{__('Email')}}">
                                <label id="contact_email" class="error_sms"></label>
                            </div>

                            <div class="form_group">
                                <img src="{{asset('front/img/phone.png')}}" alt="" class="form__icon">
                                <input type="text" name="phone" id="input_phone" class="form-control mb-0"   placeholder="{{__('Phone')}}">
                                <label id="contact_phone" class="error_sms"></label>
                            </div>

                            <textarea placeholder="{{__('Message')}}" name="message"  id="input_message" class="form-control"></textarea>
                            <label id="contact_message" class="error_sms"></label>
                            <button type="submit" id="contact_button" class="submit__btn">{{__('Send')}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('scripts')
    <script type="text/javascript">
        $(document).ready(function () {

            var inputs =
                [
                    'name',
                    'email',
                    'phone',
                    'message'
                ];


            $('#contact_button').click(function (e) {
                e.preventDefault();
                var url = $('#addForm').attr('action');
                var form_data = $('#addForm').serialize();

                $('.error_sms').hide();

                $('#contact_button').attr('disabled', 'disabled');
                $('#contact_button').text('').append(' <span class="spinner-border spinner-border-lg" role="status" aria-hidden="true"></span>');

                for (var i = 0; i < inputs.length; i++) {
                    $('#input_' + inputs[i] + '').css('border', '');
                }

                $.ajax({
                    url: url,
                    type: 'post',
                    data: form_data,
                    success: function (data) {
                        var url = data.url;
                        if (url) {
                            window.location = url;
                        }
                    },
                    error: function (data) {
                        var error = data.responseJSON.errors;
                        $('#contact_button').removeAttr('disabled');
                        $('#contact_button').text('').append('{{__('Send')}}');

                        for (var i = 0; i < inputs.length; i++) {
                            if (error.hasOwnProperty(inputs[i])) {
                                $('#contact_' + inputs[i] + '').text('').append('<i class="error_fontawai fa fa-exclamation-circle" style="padding-left: 4px"></i>' + error[inputs[i]] + '');
                                $('#contact_' + inputs[i] + '').show();
                                $('#input_' + inputs[i] + '').css('border', '1px solid red').css('margin-bottom', 0);
                            }
                        }


                    }
                });
            });
        });
    </script>
@endpush
