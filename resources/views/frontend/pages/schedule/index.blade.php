@extends('layouts.master_frontend')

@section('title')
    <title>Schedule</title>
@endsection

@section('js')
    @parent
@endsection

@section('css')
    @parent
@endsection

@section('content')

    <div class="hv">
        <section id="schedule">
            <div class="container">
                <form method="post" action="">
                    @csrf
                    <h1>Book a Spa Schedule</h1>
                    <div class="form-group">
                        <label>First and last name</label>
                        <input type="text" name="s_name" class="form-control" placeholder="Hoang The Viet"
                               value="{{get_data_user('web','name')}}" required>
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="phone" name="s_phone" class="form-control" placeholder="Phone"
                               value="{{get_data_user('web','phone')}}" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="s_email" class="form-control" placeholder="please input email"
                               value="{{get_data_user('web','email')}}" required>
                    </div>
                    <div class="form-group">
                        <label>Spa</label>
                        <select class="form-control" name="s_spa_id" required onchange="showCustomer(this.value)"> required>
                            <option value="">---Choose a spa branch---</option>
                            @foreach ($spa as $spa_id)
                                <option value="{{ $spa_id->id}}">{{$spa_id->spa_name}}</option>
                            @endforeach
                        </select>
                        <div id="txtHint">Customer info will be listed here...</div>

                    </div>
                    <div class="form-group">
                        <label for="example-datetime-local-input" class="col-2 col-form-label">Date and time</label>
                        <div class="col-10">
                            <input class="form-control" type="datetime-local" name="s_dateTime" required
                                   value="2011-08-19 13:45:00" id="example-datetime-local-input">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Notes</label>
                        <textarea class="form-control" name="s_note" rows="3" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-danger">Schedule</button>
                </form>
            </div>
        </section>
    </div>
@endsection
