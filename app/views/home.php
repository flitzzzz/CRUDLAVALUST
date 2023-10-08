<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Product Management</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
  <header class="bg-primary text-light">
    <h1 class="text-center">Product Management</h1>
  </header>

  <div class="container my-5">
  <div class="row">
    <div class="col-md-6">
      <form action="/<?php echo (isset($edit['id'])) ? "submitedit/" . $edit['id'] : "submit"; ?>" method="post">
        <div class="mb-3">
          <label for="name">Name:</label>
          <input type="text" class="form-control" name="Name" required value="<?php echo (isset($edit['id'])) ? $edit['Name'] : ""; ?>">
        </div>

        <div class="mb-3">
          <label for="price">Price:</label>
          <input type="text" class="form-control" name="Price" required value="<?php echo (isset($edit['id'])) ? $edit['Price'] : ""; ?>">
        </div>

        <div class="mb-3">
          <label for="quantity">Quantity:</label>
          <input type="text" class="form-control" name="Quantity" required value="<?php echo (isset($edit['id'])) ? $edit['Quantity'] : ""; ?>">
        </div>

        <input type="submit" class="btn btn-primary" value="<?php echo (isset($edit['id'])) ? "Update" : "Submit"; ?>">
      </form>
    </div>

    <div class="col-md-6">
      <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th>Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Action</th>
          </tr>
        </thead>

        <tbody>
          <?php foreach ($product as $pr): ?>
            <tr>
              <td>
                <?= $pr['Name'] ?>
              </td>
              <td>
                <?= $pr['Price'] ?>
              </td>
              <td>
                <?= $pr['Quantity'] ?>
              </td>
              <td class="action-buttons">
                <a href="/delete/<?= $pr['id'] ?>" class="btn btn-danger">Delete</a>
                <a href="/edit/<?= $pr['id'] ?>" class="btn btn-secondary">Edit</a>
              </td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
