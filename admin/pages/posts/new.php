<form class="w-75 m-auto mt-5" action="#" method="POST">
    <div class="mb-3">
        <label for="postName" class="form-label">Post name</label>
        <input type="text" class="form-control" id="blogName" placeholder="Blog Name" name="blogName">
    </div>
    <div class="mb-3">
        <select class="form-select" aria-label="Default select example" name="publishIt">
            <option selected>Publish it?</option>
            <option value="1">Yes</option>
            <option value="0">No</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="postBody" class="form-label">Post body</label>
        <textarea class="form-control" id="postBody" rows="3" name="postBody"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Save</button>
</form>