@extends('admin.index')
@section('meta')
    <title>Контакты</title>
@endsection

@section('content')
    <div class="main">

        <form method="post" action="{{ route('update_contacts') }}">

            @csrf

            <div class="form-row">
                <div class="form-group col-md-6 col-sm-12">
                    <label for="address">АДРЕС ОФИСА</label>
                    <input class="form-control" type="text" name="address" id="address" value="{{ $contacts->address }}">
                </div>

                <div class="form-group col-md-6 col-sm-12">
                    <label for="schedule">ГРАФИК РАБОТЫ</label>
                    <input class="form-control" type="text" name="schedule" id="schedule" value="{{ $contacts->schedule }}">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6 col-sm-12">
                    <label for="email">EMAIL</label>
                    <input name="email" id="email" class="form-control" type="email"
                           value="{{ $contacts->email }}">
                </div>

                <div class="form-group col-md-6 col-sm-12">
                    <label for="phone">ТЕЛЕФОН</label>
                    <input name="phone" id="phone" class="form-control" type="text"
                           value="{{ $contacts->phone }}">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6 col-sm-12">
                    <label for="facebook">Facebook</label>
                    <input name="facebook" id="facebook" class="form-control" type="text"
                           value="{{ $contacts->facebook }}">
                </div>

                <div class="form-group col-md-6 col-sm-12">
                    <label for="vk">VK</label>
                    <input name="vk" id="vk" class="form-control" type="text" value="{{ $contacts->vk }}">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6 col-sm-12">
                    <label for="instagram">Instagram</label>
                    <input name="instagram" id="instagram" class="form-control" type="text"
                           value="{{ $contacts->instagram }}">
                </div>

                <div class="form-group col-md-6 col-sm-12">
                    <label for="whatsapp">Whatsapp</label>
                    <input name="whatsapp" id="whatsapp" class="form-control" type="text"
                           value="{{ $contacts->whatsapp }}">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-12">
                    <label for="email_to_send">EMAIL для уведомлений</label>
                    <input name="email_to_send" id="email_to_send" class="form-control" type="email"
                           value="{{ $contacts->email_to_send }}">
                </div>
            </div>

            <button class="btn btn-success">Сохранить</button>
        </form>
    </div>
@endsection
