<?php
require "../../php-blog/include/config.php";
require "../../php-blog/include/posts/getPosts.php";

?>

<div class="d-flex w-100 justify-content-end">
    <a href="/admin/newPost"><button class="btn btn-primary mt-3 mb-3">Add Post</button></a>
</div>
<table class="table">
    <thead>
        <th class="col">ID</th>
        <th class="col">Name</th>
        <th class="col">Options</th>
    </thead>
    <tbody>
        <?php
        foreach ($posts as $key => $value) {
        ?>
            <tr class="">
                <th scope="row"><?php echo $value["id"] ?></th>
                <td><?php echo $value["title"] ?></td>
                <td>
                    <a href="#"><button class="btn btn-success me-3">Edit</button></a>
                    <a href="#"><button class="btn btn-primary me-3">View</button></a>
                    <a href="#"><button class="btn btn-danger">Delete</button></a>
                </td>
            </tr>
        <?php }
        ?>


    </tbody>
</table>