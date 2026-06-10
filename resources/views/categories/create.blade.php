
<!DOCTYPE html>
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
            <h4 class="mb-0">Add Categories</h4>

            <a href="{{ route('categories.index') }}"
               class="btn btn-primary btn-sm">
                Back
            </a>
        </div>

        <div class="card-body">

            <form action="{{ route('categories.store') }}" method="POST">
                @csrf

                <!-- Name -->
                <div class="mb-3">
                    <label class="form-label">Name</label>

                    <input type="text"
                           name="name"
                           value="{{ old('name') }}">

                </div>

                <!-- Description -->
                <div class="mb-3">
                    <label class="form-label">Description</label>

                    <textarea name="description"
                              rows="4"
                    >{{ old('description') }}</textarea>


                </div>

                <!-- Active -->
                <div class="mb-3 form-check">
                    <input type="checkbox"
                           name="is_active"
                           value="1"
                           class="form-check-input"
                           id="is_active">

                    <label class="form-check-label" for="is_active">
                        Is Active
                    </label>
                </div>

                <!-- Save Button -->
                <button type="submit" class="btn btn-primary">
                    Save
                </button>

            </form>

        </div>
    </div>

</div>
</body>
</html>
{{-- @endsection --}}
