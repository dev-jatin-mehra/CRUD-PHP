<?php
    include('db.php');
    include('includes/functions.php');

    $name = "";
    $age = "";
    $email = "";
    $phone = "";
    $address = "";
    $update = false;
    $emailToUpdate = "";

    if (isset($_POST['save'])) {
        $name = $_POST['name'];
        $age = $_POST['age'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        insertUser($conn, $name, $age, $email, $phone, $address);
        header('Location: index.php');
    }

    if (isset($_POST['update'])) {
        $emailToUpdate = $_POST['email'];
        $name = $_POST['name'];
        $age = $_POST['age'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        updateUser($conn, $emailToUpdate, $name, $age, $phone, $address);
        header('Location: index.php');
    }

    if (isset($_GET['delete'])) {
        $emailToDelete = $_GET['delete'];
        deleteUser($conn, $emailToDelete);
        header('Location: index.php');
    }

    if (isset($_GET['edit'])) {
        $emailToUpdate = $_GET['edit'];
        $update = true;
        $result = getUserByEmail($conn, $emailToUpdate);
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $name = $row['name'];
            $age = $row['age'];
            $email = $row['email'];
            $phone = $row['phone'];
            $address = $row['address'];
        }
    }

    if (isset($_POST['search'])) {
        $searchTerm = $_POST['searchTerm'];
        $query = "SELECT * FROM users WHERE name LIKE '%$searchTerm%' OR email LIKE '%$searchTerm%'";
        $searchResult = $conn->query($query);
    } elseif (isset($_GET['show_all'])) {
        $query = "SELECT * FROM users";
        $searchResult = $conn->query($query);
    } else {
        $query = "SELECT * FROM users";
        $searchResult = $conn->query($query);
    }

    if (!$searchResult) {
        die("Error in Query: " . $conn->error);
    }
?>

<?php include('includes/header.php'); ?>

<div class="form-container">
    <form method="POST" action="index.php">
        <input type="hidden" name="email" value="<?php echo $email; ?>">
        
        <input type="text" name="name" placeholder="Name" value="<?php echo $name; ?>" required>
        <input type="number" name="age" placeholder="Age" value="<?php echo $age; ?>" required>
        <input type="email" name="email" placeholder="Email" value="<?php echo $email; ?>" required>
        <input type="text" name="phone" placeholder="Phone" value="<?php echo $phone; ?>" required>
        <input type="text" name="address" placeholder="Address" value="<?php echo $address; ?>" required>

        <?php if ($update): ?>
            <button type="submit" name="update" class="update">Update</button>
        <?php else: ?>
            <button type="submit" name="save" class="save">Save</button>
        <?php endif; ?>
    </form>
</div>

<div class="search-container">
    <form method="POST" action="index.php">
        <input type="text" name="searchTerm" placeholder="Search..." required>
        <button type="submit" name="search" class="search">Search</button>
    </form>
</div>

<table>
    <thead>
        <tr>
            <th>Email</th>
            <th>Name</th>
            <th>Age</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php while ($row = $searchResult->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['age']; ?></td>
            <td><?php echo $row['phone']; ?></td>
            <td><?php echo $row['address']; ?></td>
            <td>
                <a href="index.php?edit=<?php echo $row['email']; ?>">Edit</a> |
                <a href="index.php?delete=<?php echo $row['email']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
            </td>
        </tr>
    <?php endwhile; ?>
    </tbody>
</table>

<div class="show-all-container" style="width: 150px;;margin-left:auto;margin-right:auto;">
    <a href="index.php?show_all=true" class="show-all">
        <button class="show-all-button">Show All</button>
    </a>
</div> 

<?php include('includes/footer.php'); ?>
