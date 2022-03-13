@extends('front.layouts.main')
@section('content')
    <!--start top section-->
    <div class="top__section advice__bk">
        <div class="top__overlay"></div>
        <h3 class="top_title">{{__('Ask for your advice')}}</h3>
    </div>

    <!--start advice wrapper-->
    <div class="advice__wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6">
                    <div class="contact__info">
                        <form action="{{route('front.ask_advice')}}" method="post" id="addForm" class="contact__form"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="form_group">
                                <img src="{{asset('front/img/user.png')}}" alt="" class="form__icon">
                                <input type="text" name="name" id="input_name" class="form-control" placeholder="{{__('Full name')}}">
                                <label id="advice_name" class="error_sms"></label>
                            </div>
                            <div class="form_group">
                                <img src="{{asset('front/img/msg.png')}}" alt="" class="form__icon">
                                <input type="email" name="email" id="input_email" class="form-control" placeholder="{{__('Email')}}">
                                <label id="advice_email" class="error_sms"></label>
                            </div>
                            <div class="form_group">
                                <img src="{{asset('front/img/phone.png')}}" alt="" class="form__icon">
                                <input type="text" name="phone" id="input_phone" class="form-control" placeholder="{{__('Phone')}}">
                                <label id="advice_phone" class="error_sms"></label>
                            </div>
                            <div class="form_group">
                                <input type="text" class="form-control ps__35" placeholder="{{__('Attach files')}}">
                                <input type="file" name="file" id="input_file" class="form-control upload__input">
                                <label id="advice_file" class="error_sms"></label>
                                <span class="upload__icon">
                                    <img src="{{asset('front/img/paper-clip.png')}}" alt="">
                                </span>
                            </div>
                            <textarea  name="message" placeholder="{{__('Message')}}" id="input_message" class="form-control"></textarea>
                            <label id="advice_message" class="error_sms"></label>
                            <button type="submit" id="advice_button" class="submit__btn mt__48">{{__('Send')}}</button>
                        </form>
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="advice__card">
                        <div class="advice__thumb">
                            <img src="{{asset('front/img/ad.png')}}" alt="" class="img-fluid">
                        </div>
                        <div class="advice_body">
                            <h3 class="advice_title">{{__('Ask for a consultation')}}</h3>
                            <p class="advice__des">{{$page->content ?? ''}}</p>
                        </div>
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
                    'message',
                    'file'
                ];
            $('#advice_button').click(function (e) {
                e.preventDefault();
                var url = $('#addForm').attr('action');
                var form_data = $('#addForm').get(0);
                $('.error_sms').hide();
                $('#advice_button').attr('disabled', 'disabled');
                $('#advice_button').text('').append('<span class="spinner-border spinner-border-lg" role="status" aria-hidden="true"></span>');
                for (var i = 0; i < inputs.length; i++) {
                    $('#input_' + inputs[i] + '').css('border', '');
                }
                $.ajax({
                    url: url,
                    type: 'post',
                    data: new FormData(form_data),
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        var url = data.url;
                        if (url) {
                            window.location = url;
                        }
                    },
                    error: function (data) {
                        var error = data.responseJSON.errors;
                        $('#advice_button').removeAttr('disabled');
                        $('#advice_button').text('').append('{{__('Send')}}');
                        for (var i = 0; i < inputs.length; i++) {
                            if (error.hasOwnProperty(inputs[i])) {
                                $('#advice_' + inputs[i] + '').text('').append('<i class="error_fontawai fa fa-exclamation-circle" style="padding-left: 4px;margin-right:8px;color: #ff0000"></i>' + error[inputs[i]] + '');
                                $('#advice_' + inputs[i] + '').show();
                                $('#input_' + inputs[i] + '').css('border', '1px solid red').css('margin-bottom', 0);
                            }
                        }
                    }
                });
            });
        });
    </script>
@endpush
