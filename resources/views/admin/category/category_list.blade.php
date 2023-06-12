<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  </head>
  <body>
    <h1>Categories List</h1>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th scope="col">Name</th>
          <th scope="col">Slug</th>
          <th scope="col">Description</th>
          <th scope="col">Parent ID</th>
          <th scope="col">Status</th>
          <th scope="col">Feature Status</th>
          <th scope="col">Order</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach($categories as $category)
          <tr>
            <td>{{ $category->name }}</td>
            <td>{{ $category->slug }}</td>
            <td>{{ substr($category->description, 0, 17) }} ...</td>
            <td>
              @if($category->categoryParent)
                {{ $category->categoryParent->name }}
              @else
                -------
              @endif
            </td>
            <td>
              @if($category->status)
                <button type="button" class="btn btn-success">Active</button>
              @else
              <button type="button" class="btn btn-danger">Passive</button>
              @endif
            </td>
            <td>
              @if($category->feature_status)
                <button type="button" class="btn btn-success">Active</button>
              @else
              <button type="button" class="btn btn-danger">Passive</button>
              @endif
            </td>
            <td>{{ $category->order }}</td>
            <td>
              <a href="">Delete</a> &nbsp;
              <a href="">Edit</a>
            </td>
          </tr>
        @endforeach
        
      </tbody>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>