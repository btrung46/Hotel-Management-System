<!DOCTYPE html>
<html>

<head>
    <base href="/public">
    @include('admin.css')
</head>

<body>
    <header class="header">
        @include('admin.header')
    </header>
    <div class="d-flex align-items-stretch">
        <!-- Sidebar Navigation-->
        @include('admin.sidebar')
        <!-- Sidebar Navigation end-->
        <div class="page-content" style="padding: 150px;padding-top:100px">
            <form method="post" action="{{ route('update_room',$room->id) }}" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="col-8">
                    <label for="room_title" class="form-label">Room title</label>
                    <textarea type="text" class="form-control" id="room_title" name="room_title">{{$room->room_title}}</textarea>

                    @error('room_title')
                        <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                    @enderror

                </div>
                <div class="col-8">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" class="form-control" id="image" name="image">
                    @error('image')
                        <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                    @enderror
                </div>
                <div class="col-8">
                    <label for="description" class="form-label">Description</label>
                    <textarea type="text" class="form-control" id="description" name="description"> {{$room->description}}</textarea>
                    @error('description')
                        <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                    @enderror
                </div>
                <div class="col-8">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" class="form-control" id="price" name="price" value="{{$room->price}}"></input>
                    @error('price')
                        <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                    @enderror
                </div>
                <div class="col-8">
                    <label for="wifi" class="form-label">Wifi free</label><br>
                    <select class="form-select form-select-lg mb-6" name="wifi">
                        <option value="Yes">Yes</option>
                        <option value="NO">No</option>
                    </select>
                    @error('wifi')
                        <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                    @enderror
                </div>
                <div class="col-8">
                    <label for="room_type" class="form-label">Room type</label><br>
                    <select class="form-select form-select-lg mb-6" name="room_type">
                        <option value="Regular">Regular</option>
                        <option value="Premium">Premium</option>
                        <option value="Deluxe">Deluxe</option>
                    </select>
                    @error('room_type')
                        <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                    @enderror
                </div>
                <div class="col-8"><button type="submit" class="btn btn-info"">Update</button></div>

            </form>
        </div>
    </div>
    <!-- JavaScript files-->
    @include('admin.script')
</body>

</html>
