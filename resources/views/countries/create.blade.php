
<x-dashboard>
      <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
          <div class="row">
            <div class="col-xxl">
              <div class="card mb-4">
                <div class="card-body">
                  <form method="post" action="{{route('countries.store')}}">
                        @csrf
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-name">Title</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="basic-default-name" name="title" placeholder="Add Country Name"  value="{{ old('title') }}"/>
                          </div>
                        </div>
                       
                        <div class="row justify-content-end">
                          <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Submit</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
        </div>
</x-dashboard>
