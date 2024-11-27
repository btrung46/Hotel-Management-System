<!DOCTYPE html>
<html>

<head>
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
        <div class="page-content" style="padding: 60px;padding-top:10px">
            <table class="table table-striped mt-3">
                <thead class="table-dark">
                    <tr>
                        <th width="120px" >Room title</th>
                        <th style="width: 200px;">Description</th>
                        <th>Wifi free</th>
                        <th>Price</th>
                        <th>Room type</th>
                        <th>Image</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rooms as $room)
                        <tr>
                            <td width="120px" >{{ $room->room_title }}</td>
                            <td style="max-width: 250px; width: 200px;">{!! Str::limit($room->description, 100, '...') !!}</td>
                            <td>{{ $room->wifi}}</td>
                            <td>{{ $room->price}}$</td>
                            <td>{{ $room->room_type}}</td>
                            <td><img src="room/{{$room->image}}" width="80px"></td>
                            <td width="200px">
                                <a href="{{route('edit_room',$room->id)}}" class="btn btn-outline-info">Update</a>
                                <a href="{{route('delete_room',$room->id)}}" class="btn btn-outline-danger">Delete</a>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div>
                {{ $rooms->links() }}
            </div>
        </div>
    </div>
    <!-- JavaScript files-->
    @include('admin.script')
</body>

</html>
