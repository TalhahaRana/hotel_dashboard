<x-dashboard>
    <div class="card" style="margin-top: 53px; margin-left: 27px;">
        <h5 class="card-header">Countries</h5>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <caption class="ms-4">
                    Countries
                </caption>
                <thead>
                    <tr>
                        <th>Id No</th>
                        <th>Title</th>
                        <th>URL title</th>
                        <th>Date added</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $counter = 1
                    @endphp
                    @if(count($countries) > 0)
                    @foreach($countries as $country)
                    <tr>
                        <td>{{$counter++}}</td>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $country -> title}}</strong></td>
                        <td>{{ $country -> url_title}}</td>
                        <td><span class="badge bg-label-primary me-1">{{ $country -> created_at}}</span></td>
                        <!-- <td><span class="badge bg-label-primary me-1">{{ $country -> created_at -> diffForHumans()}}</span></td> -->
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item btn-primary" href="{{ route('countries.edit', ['country' => $country->id]) }}">
                                        <i class="bx bx-edit-alt me-1"></i> Edit
                                    </a>
                                    <form action="{{ route('countries.destroy', ['country' => $country->id]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this country?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="dropdown-item btn-warning">
                                            <i class="bx bx-trash me-1"></i> Delete
                                        </button>
                                    </form>

                                </div>

                            </div>
                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</x-dashboard>