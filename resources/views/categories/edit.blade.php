{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <div class="card shadow-sm">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Edit Categories</h5>

                <a href="{{ route('categories.index') }}" class="btn btn-primary btn-sm">
                    Back
                </a>
            </div>

            <div class="card-body">
                <form action="{{ route('categories.update', $catagory->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text"
                               name="name"
                               class="form-control"
                               id="name"
                               value="{{ old('name', $catagory->name) }}">
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description"
                                  class="form-control"
                                  id="description"
                                  rows="4">{{ old('description', $catagory->description) }}</textarea>
                    </div>

                    <div class="mb-3 form-check">
                        <input type="checkbox"
                               name="is_active"
                               value="1"
                               class="form-check-input"
                               id="is_active"
                               @checked(old('is_active', $catagory->is_active))>

                        <label class="form-check-label" for="is_active">
                            Is Active
                        </label>
                    </div>

                    <button type="submit" class="btn btn-primary">
                        Update
                    </button>
                </form>
            </div>
        </div>
    </div>

</body>
</html> --}}
