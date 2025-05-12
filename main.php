<div class="form-container">
    <form method="POST" action="index.php">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        
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
        <button type="submit" name="show_all" class="show">Show All</button>
    </form>
</div>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Age</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php while ($row = $searchResult->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['age']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['phone']; ?></td>
            <td><?php echo $row['address']; ?></td>
            <td>
                <a href="index.php?edit=<?php echo $row['id']; ?>">Edit</a> |
                <a href="index.php?delete=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
            </td>
        </tr>
    <?php endwhile; ?>
    </tbody>
</table>