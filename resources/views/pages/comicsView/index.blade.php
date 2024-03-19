@extends ('layouts.app')

@section('title', 'Comics | Read Index')

@section('main')
    <main>
        <h2>index di comics</h2>

        <div
            class="table-responsive"
        >
        <a
            name=""
            id=""
            class="btn btn-primary"
            href="{{ route('comics.create') }}"
            role="button"
            >Crea</a
        >
        
            <table
                class="table table-primary"
            >
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">title</th>
                        <th scope="col">description</th>
                        <th scope="col">thumb</th>
                        <th scope="col">price</th>
                        <th scope="col">series</th>
                        <th scope="col">sale date</th>
                        <th scope="col">edit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($comics as $item)
                        
                    <tr class="">
                        <td>{{$item['id']}}</td>
                        <td><a href="{{ route('comics.show', ['comic' => $item['id'] ] ) }}">{{$item['title']}}</a></td>
                        <td>{{$item['description']}}</td>
                        <td>{{$item['thumb']}}</td>
                        <td>{{$item['price']}}</td>
                        <td>{{$item['series']}}</td>
                        <td>{{$item ['sale_date']}}</td>
                        <td>
                            <button class="btn btn-primary ">
                                edit
                            </button>

                            <form action="{{ route('comics.destroy', $item->id) }}"
                                method="POST">
                                
                                @csrf
                                @method('DELETE')

                                <button 
                                type="submit"
                                class="btn btn-danger ">
                                    delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>
        
    </main>
@endsection