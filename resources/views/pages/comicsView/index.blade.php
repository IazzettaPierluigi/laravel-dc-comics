@extends ('layouts.app')

@section('title', 'Comics | Read Index')

@section('main')
    <main>
        <h2>index di comics</h2>

        <div
            class="table-responsive"
        >
            <table
                class="table table-primary"
            >
                <thead>
                    <tr>
                        {{-- <th scope="col">id</th> --}}
                        <th scope="col">title</th>
                        <th scope="col">description</th>
                        <th scope="col">thumb</th>
                        <th scope="col">price</th>
                        <th scope="col">series</th>
                        <th scope="col">sale date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($comics as $item)
                        
                    <tr class="">
                        {{-- <td>{{$item->id}}</td> --}}
                        <td>{{$item['title']}}</td>
                        <td>{{$item['description']}}</td>
                        <td>{{$item['thumb']}}</td>
                        <td>{{$item['price']}}</td>
                        <td>{{$item['series']}}</td>
                        <td>{{$item ['sale_date']}}</td>
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>
        
    </main>
@endsection