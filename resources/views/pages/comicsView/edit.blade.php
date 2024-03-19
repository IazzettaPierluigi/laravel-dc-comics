@extends ('layouts.app')

@section('title', 'Comics | Read Edit')

@section ('main')
<h1>modifica fumetto</h1>

<div class="container">
    <form action="{{route('comics.update', $comic->id)}}" method="POST">
        @csrf
         @method('PUT')
     
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