@extends ('layouts.app')

@section('title', 'Comics | Read Creat')

@section ('main')
<h1>aggiungi fumetto</h1>

<div class="container">
    {{-- validation --}}
    
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form action="{{route('comics.store')}}" method="POST">
        @csrf

     
        <div class="mb-3">
            <label for="title" class="form-label">titolo</label>
            <input
                type="text"
                class="form-control"
                name="title" {{-- deve essere identico al nome della colonna che salverà il dato --}}
                id="title"
            />
  
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">descrizione</label>
            <input
                type="text"
                class="form-control"
                name="description" {{-- deve essere identico al nome della colonna che salverà il dato --}}
                id="description"
            />
  
        </div>

        <div class="mb-3">
            <label for="title" class="form-label">thumb</label>
            <input
                type="text"
                class="form-control"
                name="thumb" {{-- deve essere identico al nome della colonna che salverà il dato --}}
                id="thumb"
            />
  
        </div>

        <div class="mb-3">
            <label for="title" class="form-label">price</label>
            <input
                type="text"
                class="form-control"
                name="price" {{-- deve essere identico al nome della colonna che salverà il dato --}}
                id="price"
            />
  
        </div>

        <div class="mb-3">
            <label for="title" class="form-label">series</label>
            <input
                type="text"
                class="form-control"
                name="series" {{-- deve essere identico al nome della colonna che salverà il dato --}}
                id="series"
            />
  
        </div>

        <div class="mb-3">
            <label for="title" class="form-label">sale date</label>
            <input
                type="text"
                class="form-control"
                name="sale_date" {{-- deve essere identico al nome della colonna che salverà il dato --}}
                id="sale_date"
            />
  
        </div>

        <button
            type="submit"
            class="btn btn-primary"
        >
            Crea
        </button>
        
    </form>
</div>
@endsection