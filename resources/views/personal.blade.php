@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
    <div class="parentDiv">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div><br/>
        @endif
        <form action="{{ route('personal') }}" method="POST">
            {{ csrf_field() }}

            <div>
                <input type="text" id="name" name="name"
                       class="JustInput" placeholder="Անուն*" value="{{ !is_null(old('name')) ? old('name') : '' }}">
            </div>
            <br>
            <div>
                <input type="text" id="surname" name="surname"
                       class="JustInput" placeholder="Ազգանուն*"
                       value="{{ !is_null(old('surname')) ? old('surname') : '' }}">
            </div>
            <br>
            <div>
                <label> Նշեք Ձեր Սեռը</label>
                <div class="sex_radio">
                    <label><input type="radio" name="men"> Արրական </label>

                    <label><input type="radio" name="women"> Իգական </label>
                </div>
                <input type="hidden" name="sex">
            </div>
            <br>
            <div>

                <label for="sex"> Ծննդյան Տարեթիվ </label>

                <div class="DOB">
                    <div class="row">
                        <div class="col-md-4">
                            <select id="year" name="year" class="SelectBox">
                                <option value="">Տարի</option>
                                @foreach($year as $key=>$val)
                                    <option value="{{$val}}">{{$val}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <select id="month" name="month" class="SelectBox">
                                <option value=""> Ամիս</option>
                                @foreach($month as $key=>$val)
                                    <option value="{{$key}}">{{$val}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <select id="day" name="day" class="SelectBox">
                                <option> Օր</option>
                            </select>
                        </div>
                    </div>
                </div>

            </div>
            <br>
            <div>
                <input id="address" type="text" name="address" class="JustInput" placeholder="Բնակության հասցե"
                       value="{{ !is_null(old('address')) ? old('address') : '' }}">
            </div>
            <br>
            <div>
                <input id="family_count" type="number" name="family_count" class="JustInput"
                       placeholder="Ընտանիքի Անդամների Քանակ"
                       value="{{ !is_null(old('family_count')) ? old('family_count') : '' }}">
            </div>
            <br>
            <div>
                <label> Անձը Հաստատող փաստաթուղթ </label>
                <div class="identity_type_radio">
                    <label><input type="radio" name="passport"> Անձնագիր </label>

                    <label><input type="radio" name="id_cart">Նույնականացման քարտ</label>
                </div>
                <input id="identity_type" type="hidden" name="identity_type">
            </div>
            <br>
            <div>
                <input id="identity_number" type="text" name="identity_number" class="JustInput"
                       placeholder="Անձը հաստատող փաստաթուղթի սերիա* "
                       value="{{ !is_null(old('identity_number')) ? old('identity_number') : '' }}"
                >
            </div>
            <br>
            <div>
                <label> Տրված է </label>

                <div class="row">
                    <div class="col-md-4">
                        <select id="given_year" name="given_year" class="SelectBox">
                            <option value="">Տարի</option>
                            @foreach($year as $key=>$val)
                                <option value="{{$val}}">{{$val}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <select id="given_month" name="given_month" class="SelectBox">
                            <option value=""> Ամիս</option>
                            @foreach($month as $key=>$val)
                                <option value="{{$key}}">{{$val}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <select id="given_day" name="given_day" class="SelectBox">
                            <option> Օր</option>
                        </select>
                    </div>
                </div>
            </div>
            <br>
            <div>
                <input id="given_person" type="text" name="given_person" class="JustInput"
                       placeholder="Ում կողմից *"
                       value="{{ !is_null(old('given_person')) ? old('given_person') : '' }}"
                >
            </div>
            <br>
            <button type="submit" class="continue"> Շարունակել</button>
        </form>
    </div>
@endsection